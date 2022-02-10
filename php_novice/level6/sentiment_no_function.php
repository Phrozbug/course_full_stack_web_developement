<?php

$positieveWoorden = convertFileToArray("positive-words.txt");
$neutraleWoorden = convertFileToArray("neutral-words.txt");
$negatieveWoorden = convertFileToArray("negative-words.txt");
$lyrics = file_get_contents("lyrics.txt");
$lyrics = str_replace("\n", " ", $lyrics);
$lyrics = explode(" ", $lyrics);

function convertFileToArray($file)
{
    $array = file_get_contents($file);
    $array = explode("\n", $array);
    return $array;
}
$teller = count($lyrics);
$aantalPositief = 0;
$tellerPositief = count($positieveWoorden);
for ($x = 0; $x < $teller; $x++) {
    for ($y = 0; $y < $tellerPositief; $y++) {
        if ($lyrics[$x] == $positieveWoorden[$y]) {
            $aantalPositief++;            
        }
    }
}
$aantalNeutraal = 0;
$tellerNeutraal = count($neutraleWoorden);
for ($x = 0; $x < $teller; $x++) {
    for ($y = 0; $y < $tellerNeutraal; $y++) {
        if ($lyrics[$x] == $neutraleWoorden[$y]) {
            $aantalNeutraal++;          
        }
    }
}
$aantalNegatief = 0;
$tellerNegatief = count($negatieveWoorden);
for ($x = 0; $x < $teller; $x++) {
    for ($y = 0; $y < $tellerNegatief; $y++) {
        if ($lyrics[$x] == $negatieveWoorden[$y]) {
            $aantalNegatief++;            
        }
    }
}
$sentiment = round((($aantalNeutraal + $aantalPositief - $aantalNegatief) / $aantalNeutraal), 2);
echo "Positieve woorden: " . $aantalPositief . PHP_EOL;
echo "Neutrale woorden: " . $aantalNeutraal . PHP_EOL;
echo "Negatieve woorden: " . $aantalNegatief . PHP_EOL;
echo "Het sentiment van de tekst krijgt een score van: " . $sentiment . PHP_EOL;
?>