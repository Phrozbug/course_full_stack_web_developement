<?php
$tijd = $argv[1];
$uitgepakt = explode(" ", $tijd);
$totaalseconden = 0;
foreach ($uitgepakt as $value) {
    $letter = substr($value, -1);
    switch ($letter) {
        case "d":
            $totaalseconden += (int) $value * 60 * 60 * 24;
            break;
        case "u":
            $totaalseconden += (int) $value * 60 * 60;
            break;
        case "m":
            $totaalseconden += (int) $value * 60;
            break;
        case "s":
            $totaalseconden += (int) $value;
            break;
    }  
}
echo $totaalseconden . " seconden" . PHP_EOL;
?>