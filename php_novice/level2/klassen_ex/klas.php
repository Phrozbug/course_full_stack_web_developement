<?php
echo "Wie zit er in de klas?" . PHP_EOL;
$klas = readline();
$namen = explode(" ", $klas);
print_r($namen);
echo "De studenten van de klas zijn:" . PHP_EOL;
foreach ($namen as $value) {
    echo $value . PHP_EOL;
}
?>