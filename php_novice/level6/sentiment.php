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


function woordenTeller($lyrics, $woorden) 
{
    $aantal = 0;
    $teller = count($lyrics);
    $tellerWoorden = count($woorden);
    for ($x = 0; $x < $teller; $x++) {
        for ($y = 0; $y < $tellerWoorden; $y++) {
            if ($lyrics[$x] == $woorden[$y]) {
                $aantal++;                      
            }
        }
    }
    return $aantal;
}

$aantalPositief = woordenTeller($lyrics, $positieveWoorden);
$aantalNegatief = woordenTeller($lyrics, $negatieveWoorden);
$aantalNeutraal = woordenTeller($lyrics, $neutraleWoorden);

$sentiment = round((($aantalNeutraal + $aantalPositief - $aantalNegatief) / $aantalNeutraal), 2);
echo "Positieve woorden: " . $aantalPositief . PHP_EOL;
echo "Neutrale woorden: " . $aantalNeutraal . PHP_EOL;
echo "Negatieve woorden: " . $aantalNegatief . PHP_EOL;
echo "Het sentiment van de tekst krijgt een score van: " . $sentiment . PHP_EOL;
?>