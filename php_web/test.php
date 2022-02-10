<?php

$bedrag = $argv[1];
$restbedrag = (float)$bedrag;

define("MONEY_UNITS", ['50', '20', '10', '5', '2', '1']);

if (!$bedrag) {
    exit("Geen wisselgeld") . PHP_EOL;
} 

foreach (MONEY_UNITS as $geldeenheid) {
    if ($restbedrag >= $geldeenheid) {
        $aantal = floor($restbedrag / $geldeenheid);
        $restbedrag = fmod($restbedrag, $geldeenheid);
        echo "$aantal x $geldeenheid euro" . PHP_EOL;
    }
}

define("MONEY_CENT", ['50', '20', '10', '5']);

echo $restbedrag . PHP_EOL;

$restbedrag = ($restbedrag * 100);
$restbedrag = round($restbedrag / 5) * 5;
echo $restbedrag . PHP_EOL;

foreach (MONEY_CENT as $cent) {
    if ($restbedrag >= $cent) {
        $aantal = floor($restbedrag / $cent);
        $restbedrag = $restbedrag % $cent;
        echo "$aantal x $cent cent" . PHP_EOL;
    }
}

?>
