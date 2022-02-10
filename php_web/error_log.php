<?php

function countDown($getal)
{
    if ($getal <= 0 || $getal >= 10) {
        throw new Exception("Er is iets fout gegaan.......");
    } else {
        echo "<h1>Correct getal!</h1>";
    }
}
try {
    countDown(12);
} catch (Exception $e) {
    error_log($e->getMessage(), 0);
}
?>