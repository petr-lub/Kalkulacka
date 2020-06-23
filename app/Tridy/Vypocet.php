<?php


namespace Tridy;

class Vypocet
{
    public $vysledek = array();
    public $nazev_metody = array();

    public function vypocti(int $prvni_cislo, int $druhe_cislo)
    {
        $methods = array();
        $methods[] = new Soucet;
        $methods[] = new Rozdil;
        $methods[] = new Nasobek;
        $methods[] = new Podil;

        foreach ($methods as $method)
        {
            $this->vysledek[] = $vysledek = $method->vypocet($prvni_cislo, $druhe_cislo);
            $this->nazev_metody[] = $nazev_metody = $method->nazevMetody();

            echo sprintf("Vysledek metody %s je: %f \n", $nazev_metody, $vysledek);
        }
    }
}