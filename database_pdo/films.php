<?php

use function PHPSTORM_META\sql_injection_subst;

$host = '127.0.0.1';
$db   = 'netland';
$user = 'bit_academy';
$pass = 'bit_academy';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}
$id = $_GET['id'];
$filmsDetail = $pdo->query("SELECT * FROM films WHERE id = $id");
$filmsDetail = $filmsDetail->fetch();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Details films</title>
</head>

<body>
    <div class="content">
        <a href="index.php"><img src="home_icon.png" alt="home icon"></a>
        <h1><?php echo $filmsDetail['titel']; ?></h1>
        <table>
            <tr>
                <th>Information</th>
                <th>Information</th>
            </tr>
            <tr>
                <th>Datum van uitkomst</th>
                <th><?php echo $filmsDetail['datum_van_uitkomst']; ?></th>
            </tr>
            <tr>
                <th>Land van uitkomst</th>
                <th><?php echo $filmsDetail['land_van_uitkomst']; ?></th>
            </tr>
            <tr>
                <th>Duur</th>
                <th><?php echo $filmsDetail['duur']; ?></th>
            </tr>
        </table>
        <h2>Beschrijving:</h2>
        <div class="beschrijving">
            <p><?php echo $filmsDetail['omschrijving']; ?></p>
        </div>
        <div class="trailer">
            <iframe width="420" height="345" frameborder="0" src="https://www.youtube.com/embed/<?php echo $filmsDetail['idtrailer']; ?>?autoplay=1&mute=1">
            </iframe>
        </div>
    </div>
</body>

</html>