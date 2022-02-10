<?php

function countDown($getal)
{
    if ($getal <= 0 || $getal >= 10) {
        throw new Exception("<h1>Er is iets fout gegaan.......</h1>");
    } else {
        echo "<h1>Correct getal!</h1>";
    }
}
try {
    countDown(12);
} catch (Exception $e) {
    echo $e->getMessage();
}
?>