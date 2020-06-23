<?php


namespace Tridy;

interface ICalculateMethod
{
    public function vypocet($prvni_cislo, $druhe_cislo): float;
    public function nazevMetody(): string;
}