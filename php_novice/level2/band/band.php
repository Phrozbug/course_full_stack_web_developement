<?php
$albums = array("Citizen of Glass" => 4.5, "Night" => 9, "New Eyes" => 5, "Strange Trails" => 10);
echo "Het albumoverzicht:" . PHP_EOL;
foreach ($albums as $key => $value) {
    echo $key . "kost €" . $value . PHP_EOL;
    $totaal += $value;
}
$gemiddeld = $totaal / (count($albums));
echo "Het totaalbedrag van alle albums is €" . $totaal . PHP_EOL;
echo "De gemiddelde prijs van alle albums is €" . $gemiddeld . PHP_EOL;
?>