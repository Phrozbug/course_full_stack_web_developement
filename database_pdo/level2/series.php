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
$seriesDetail = $pdo->query("SELECT * FROM series WHERE id = $id");
$seriesDetail = $seriesDetail->fetch();

if ($seriesDetail['has_won_awards'] == 1) {
    $award = "yes";
} else {
    $award = "no";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Details series</title>
</head>

<body>
    <div class="content">
        <a href="index.php"><img src="home_icon.png" alt="home icon"></a>
        <h1><?php echo $seriesDetail['title']; ?></h1>
        <table>
            <tr>
                <th>Information</th>
                <th>Information</th>
            </tr>
            <tr>
                <th>Awards</th>
                <th><?php echo $award; ?></th>
            </tr>
            <tr>
                <th>Seasson</th>
                <th><?php echo $seriesDetail['seasons']; ?></th>
            </tr>
            <tr>
                <th>Country</th>
                <th><?php echo $seriesDetail['country']; ?></th>
            </tr>
            <tr>
                <th>Language</th>
                <th><?php echo $seriesDetail['language']; ?></th>
            </tr>
            <tr>
                <th>Rating</th>
                <th><?php echo $seriesDetail['rating']; ?></th>
            </tr>
        </table>
        <h2>Beschrijving:</h2>
        <div class="beschrijving">
            <p><?php echo $seriesDetail['description']; ?></p>
        </div>
    </div>
</body>

</html>