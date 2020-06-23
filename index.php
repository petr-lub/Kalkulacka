<?php


use Tridy\DbConnection;
use Tridy\Kalkulacka as Kalkulacka;
use Tridy\Vypocet;

require_once __DIR__ . '/vendor/autoload.php';

/**
 * Zadejte parametry pro pripojeni do databaze.
 */
$connection = new DbConnection([
    'dsn'=>'localhost',
    'user'=>'root',
    'pwd'=>'password',
    'dbname'=>'results'
]);
$db = $connection->connectToDatabase();

/**
 * Metoda setHodnoty() vyzaduje 2 cisla (int)
 * Metoda vypocti() vypocita vsechny dostupne matematicke operace a vypise vysledek
 * Metoda ulozitDoDb() ulozi vysledek do databaze
 * Metoda ulozitDoFs() ulozi vysledek do FileSystemu
 */
$calc = new Kalkulacka(new Vypocet());
$calc->setHodnoty(-2,10);
$calc->vypocti();
$calc->ulozitDoDb($db);
$calc->ulozitDoFs();

