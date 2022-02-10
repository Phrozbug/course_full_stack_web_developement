<?php
$wisselgeld = $argv[1];

if (empty($wisselgeld) || $wisselgeld == 0) {
    echo "Geen wisselgeld" . PHP_EOL;  
} else {
    $tientje = floor($wisselgeld / 10);
    if ($tientje > 0) {
        echo $tientje . " x 10 euro" . PHP_EOL;
    }
    $rest = $wisselgeld - ($tientje * 10);
    $vijfje = floor($rest / 5);
    if ($vijfje > 0) {
        echo $vijfje . " x 5 euro" . PHP_EOL;
    }
    $rest -= $vijfje * 5;
    $tweetje = floor($rest / 2);
    if ($tweetje > 0) {
        echo $tweetje . " x 2 euro" . PHP_EOL;
    } 
    $rest -= $tweetje * 2;
    $eentje = floor($rest / 1);
    if ($eentje > 0) {
        echo $eentje . " x 1 euro" . PHP_EOL;
    } 
}
?>