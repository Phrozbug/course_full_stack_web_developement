<?php

$inputFile = fopen("input.txt", "r");
$input = stream_get_contents($inputFile);
fclose($inputFile);

$open = 0;
$sluiten = 0;

for ($i=0; $i < strlen($input); $i++) {
    if ($input[$i] == "(") {
        $open++;
    } else if ($input[$i] == ")") {
        $sluiten++;
    }

    // Deel 2
    // if ($open - $sluiten < 0) {
    //     echo $i + 1;
    //     break;
    // }
}

echo $open - $sluiten;

// $inputFile = fopen("input.txt", "r");
// $input = stream_get_contents($inputFile);
// fclose($inputFile);

// $verdieping = 0;

// for ($i=0; $i < strlen($input); $i++) {
//     if ($input[$i] == "(") {
//         $verdieping++;
//     } else if ($input[$i] == ")") {
//         $verdieping--;
//     }

//     // Deel 2
//     if ($verdieping < 0) {
//         echo $i + 1;
//         break;
//     }
// }

// echo $verdieping;
