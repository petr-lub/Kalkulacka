<?php


namespace Tridy;

class Nasobek implements ICalculateMethod
{
    public function vypocet($prvni_cislo, $druhe_cislo): float
    {
        return $prvni_cislo * $druhe_cislo;
    }

    public function nazevMetody(): string
    {
        return "Nasobek";
    }
}
