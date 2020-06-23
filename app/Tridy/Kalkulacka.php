<?php declare(strict_types=1);


namespace Tridy;

class Kalkulacka
{
    private $prvni_cislo = 0;

    private $druhe_cislo = 0;

    private $vysledek = array();

    private $nazev_metody = array();

    private $database;

    private $kalkulacka;

    public function __construct(Vypocet $kalkulacka)
    {
        $this->kalkulacka = $kalkulacka;
    }

    public function setHodnoty(int $prvni_cislo, int $druhe_cislo): void
    {
        if (!isset($prvni_cislo) || !isset($druhe_cislo) || !is_int($prvni_cislo) || !is_int($druhe_cislo)) {
                throw new \InvalidArgumentException("Vstupni data pro vypocet nejsou spravna.");
        }
        else {
                $this->prvni_cislo = $prvni_cislo;
                $this->druhe_cislo = $druhe_cislo;

                echo 'Hodnoty nastaveny'.PHP_EOL;
        }
    }

    public function vypocti(): void
    {
        $this->kalkulacka->vypocti($this->prvni_cislo, $this->druhe_cislo);
        $this->vysledek = $this->kalkulacka->vysledek;
        $this->nazev_metody = $this->kalkulacka->nazev_metody;
    }

    public function ulozitDoDb(Connection $database): void
    {
        $this->database = $database;

        $radek = array_combine($this->vysledek, $this->nazev_metody);
        foreach ($radek as $v => $n)
        {
            $this->database->conn()->exec("INSERT INTO Vysledky (vysledek, nazev) VALUES ('$v', '$n')");
        }
        echo "Ulozeno do databaze".PHP_EOL;
    }

    public function ulozitDoFs(): void
    {
        if (!file_exists('vysledky'))
        {
            mkdir('vysledky', 0777, false);
        }

        $radek = array_combine($this->nazev_metody, $this->vysledek);
        foreach ($radek as $n => $v)
        {
            file_put_contents('vysledky/vysledky.txt', $n.': '.$v.PHP_EOL, FILE_APPEND);
        }
        echo 'Ulozeno do FileSystemu'.PHP_EOL;
    }
}
