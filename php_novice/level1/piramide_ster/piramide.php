<?php
echo "Hoeveel stapels wil je hebben?" . PHP_EOL;
$stapels = readline();
$ster = "*";
for ($i = 0; $i < $stapels; $i++) {
    echo $ster . PHP_EOL;
    $ster .=  "*";
}
?>