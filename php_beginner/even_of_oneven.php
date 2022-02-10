<?php
echo "Voor een getal in" . PHP_EOL;
$getal = readline();
$check = $getal % 2;
if ($check == 0) {
    echo "Dit is een even getal" . PHP_EOL;
} else {
    echo "Dit is een oneven getal" . PHP_EOL;
}
?>