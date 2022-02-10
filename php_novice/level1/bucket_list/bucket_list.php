<?php
echo "Hoeveel activiteiten wil je toevoegen?" . PHP_EOL;
$aantal = readline();
$i = 0;
while ($i < $aantal) {
    echo "Wat wil je toevoegen aan jouw bucket list?" . PHP_EOL;
    $array[$i] = readline();
    $i++;
}
echo "Op jouw bucket list staat:" . PHP_EOL;
$i = 0;
while ($i < $aantal) {
    echo $array[$i] . PHP_EOL;
    $i++;
}
?>