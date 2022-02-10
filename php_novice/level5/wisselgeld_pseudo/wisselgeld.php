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
            $restbedrag = $restbedrag % $geldeenheid;
            echo $aantalKeer . " x " . $geldeenheid . " euro" . PHP_EOL;
        }
    } 
}
?>