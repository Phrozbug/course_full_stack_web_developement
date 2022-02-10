<?php
echo "Van welk getal wil je de faculteit weten?" . PHP_EOL;
$getal = readline();
$faculteit = 1;
for ($i = 1; $i <= $getal; $i++) {
    $faculteit *= $i;
}
echo "De faculteit van " . $getal . " is " . $faculteit . PHP_EOL;
?>