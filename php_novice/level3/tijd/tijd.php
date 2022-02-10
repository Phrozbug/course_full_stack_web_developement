<?php
$tijd = $argv[1];
$findme = "s";
$pos = strpos($tijd, $findme);
if ($pos === false) {
    echo "Geen tijd gevonden" . PHP_EOL;
} else {
    echo (int)($tijd) . " seconden" . PHP_EOL;
}
?>