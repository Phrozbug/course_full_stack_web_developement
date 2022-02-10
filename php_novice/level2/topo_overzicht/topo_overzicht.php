<?php
echo "Hoeveel landen ga je toevoegen?" . PHP_EOL;
$aantal = readline();
$i = 0;
$combi = array();
while ($i < $aantal) {
    echo "Welk land wil je toevoegen?" . PHP_EOL;
    $land = readline();
    echo "Wat is de hoofdstad van " . $land . PHP_EOL;
    $hoofdstad = readline();
    $combi[$land] = $hoofdstad;
    $i++;
}
echo "De volgende landen en steden zitten in de database:" . PHP_EOL;
foreach ($combi as $key => $value) {
    echo $key . ", " . $value . PHP_EOL;
}
?>