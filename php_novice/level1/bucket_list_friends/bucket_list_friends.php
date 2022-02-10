<?php
echo "Hoeveel vrienden zal ik vragen om hun droom?" . PHP_EOL;
$aantal = readline();
$i = 0;
$combi = array();
if (is_numeric($aantal) == false) {
    exit($aantal . " is geen geldig getal. Probeer het opnieuw" . PHP_EOL);
} else if ($aantal == 0) {
    exit($aantal . " is geen geldig getal. Probeer het opnieuw" . PHP_EOL);
} else if ($aantal < 0) {
    exit($aantal . " is geen geldig getal. Probeer het opnieuw" . PHP_EOL);
} else {
    while ($i < $aantal) {
        echo "Wat is jouw naam?" . PHP_EOL;
        $naam = readline();
        echo "Wat is jouw droom?" . PHP_EOL;
        $droom = readline();
        $combi[$naam] = $droom;
        $i++;
    }
}
echo "Op jouw bucket list staat:" . PHP_EOL;

foreach ($combi as $key => $value) {
    echo $key . " heeft dit als droom: " . $value . PHP_EOL;
}
?>