<?php
echo "Welke operatie wil je uitvoeren (+, -, %)?" . PHP_EOL;
$operator = readline();
if ($operator == "+" || $operator == "-" || $operator == "%") {
    echo "Eerste getal?" . PHP_EOL;
    $Getal1 = readline();
    if (is_numeric($Getal1)) {
        echo "Tweede getal?" . PHP_EOL;
        $Getal2 = readline();
        if (is_numeric($Getal2)) {
            if ($operator == '+') {
                echo "Uw resultaat is:" . ($Getal1 + $Getal2) . PHP_EOL;
            } elseif ($operator == '-') {
                echo "Uw resultaat is:" . ($Getal1 - $Getal2) . PHP_EOL;
            } else {
                echo "Uw resultaat is:" . ($Getal1 % $Getal2) . PHP_EOL;            
            }
        } else {
            exit("'" . $Getal2  . "' is geen getal" . PHP_EOL);
        }
    } else {
        exit("'" . $Getal1 . "' is geen getal" . PHP_EOL);
    }
} else {
    echo "'" . $operator . "' is geen geldige operatie" . PHP_EOL;
}
?>l