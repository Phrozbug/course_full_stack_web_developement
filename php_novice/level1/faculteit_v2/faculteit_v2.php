<?php
echo "Van welk getal wil je de faculteit weten?" . PHP_EOL;
$getal = readline();
$faculteit = 1;
$i = 1;
while ($i <= $getal) {
    $faculteit *= $i;
    $i++;
}
echo "De faculteit van " . $getal . " is " . $faculteit . PHP_EOL;
?>