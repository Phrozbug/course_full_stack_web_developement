<?php
$landen = array("Japan" => "Tokyo", "Mexico" => "Mexico City", "USA" => "Washington D.C.", "India" => "New Dehli", "Zuid-Korea" => "Seoul", "China" => "Peking");
$landen["Nigeria"] = "Abuja";
$landen["Argentina"] = "Buenos Aires";
$landen["Egypt"] = "Cairo";
$landen["UK"] = "London";
$goed = 0;
$totaal = count($landen);
foreach ($landen as $key => $value) {
    echo "Welke hoofdstad heeft " . $key . "?";
    $hoofdstad = readline();
    if ($hoofdstad == $value) {
        echo "Correct!" . PHP_EOL;
        $goed++;
    } else {
        echo "Helaas " . $hoofdstad . " is niet de hoofstad van " . $key . PHP_EOL;
        echo "Het correcte antwoord is: " . $value . PHP_EOL;
    }
}
echo "Je hebt " . $goed . " van de " . $totaal . " goed geraden!" . PHP_EOL;
?>