<?php
$bedrag = $argv[1];
define("MONEY_UNITS", array(50 , 20, 10, 5, 2, 1));
try {
    inputValid($bedrag);
} catch (Exception $ex) {
    echo "Error opgevangen: " . $ex->getMessage() . PHP_EOL;
    exit();
}

aantalEuros($bedrag);
aantalCenten($bedrag);

// Functie voor validatie van de input

function inputValid($bedrag)
{
    if ($bedrag == "") {
        throw new Exception("Verkeerd aantal argumenten. Roep de applicatie aan op de volgende manier: `wisselgeld.php <bedrag>` ");
    }
    if (is_numeric($bedrag) == false) {
        throw new Exception("Input moet valide getal zijn");
    }
    if ($bedrag == 0) {
        throw new Exception("Je krijgt geen wisselgeld");
    }
    if ($bedrag < 0) {
        throw new Exception("Input moet een positief getal zijn");
    }
}
// Functie voor de verdeling van euro's

function aantalEuros($bedrag)
{
    foreach (MONEY_UNITS as $geldeenheid) {
        if ($bedrag >= $geldeenheid) {
            $aantalKeer = floor($bedrag / $geldeenheid);
            $bedrag = fmod($bedrag, $geldeenheid);
            echo $aantalKeer . " x " . $geldeenheid . " euro" . PHP_EOL;
        }
    }
}

//Functie voor de verdeling van de centen

function aantalCenten($bedrag) 
{
    $centen = floor($bedrag);
    $restcenten = $bedrag - $centen;
    $restcenten = $restcenten * 100;
    $restcenten = round($restcenten / 5) * 5;
    foreach (MONEY_UNITS as $centeneenheid) {
        if ($restcenten >= $centeneenheid) {
            $aantalKeer = floor($restcenten / $centeneenheid);
            $restcenten = $restcenten % $centeneenheid;
            echo $aantalKeer . " x " . $centeneenheid . " cent" . PHP_EOL;
        }
    }
}
?>