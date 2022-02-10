<?php
echo "Hoeveel vrienden zal ik vragen om hun droom?" . PHP_EOL;
$aantal = readline();
$i = 0;
$j = 0;
$combi = array();
while ($i < $aantal) {
    echo "Wat is jouw naam?" . PHP_EOL;
    $naam = readline();
    echo "Hoeveel dromen ga je opgeven?" . PHP_EOL;
    $aantaldromen = readline();
    while ($j < $aantaldromen) {
        echo "Wat is jouw droom?" . PHP_EOL;
        $droom = readline();
        $combi[$naam][$j] = $droom;
        $j++;
    }
    $j = 0;
    $i++;
}
$k = 0;
$keys = array_keys($combi);

for ($i = 0; $i < count($combi); $i++) {
    foreach ($combi[$keys[$i]] as $key => $value) {
        echo $keys[$i] . " heeft dit als droom: " . $value . PHP_EOL;
    }
}
?>