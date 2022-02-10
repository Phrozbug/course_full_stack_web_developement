<?php
$bedrag = $argv[1];
define("MONEY_UNITS", array(50 , 20, 10, 5, 2, 1));
$restbedrag = $bedrag;
if (empty($bedrag) || $bedrag == 0) {
    echo "Geen wisselgeld" . PHP_EOL;  
} else {
    foreach (MONEY_UNITS as $geldeenheid) {
        if ($restbedrag >= $geldeenheid) {
            $aantalKeer = floor($restbedrag / $geldeenheid);
            $restbedrag = fmod($restbedrag, $geldeenheid);
            echo $aantalKeer . " x " . $geldeenheid . " euro" . PHP_EOL;
        }
    }
    $centen = ($restbedrag * 100);
    $restcenten = round($centen / 5) * 5;
    foreach (MONEY_UNITS as $centeneenheid) {
        if ($restcenten >= $centeneenheid) {
            $aantalKeer = floor($restcenten / $centeneenheid);
            $restcenten = $restcenten % $centeneenheid;
            echo $aantalKeer . " x " . $centeneenheid . " cent" . PHP_EOL;
        }
    }
}
?>