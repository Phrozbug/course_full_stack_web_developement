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
if (isset($_POST['submitButton'])) {
    $mediatype = $_POST['mediatype'];
    $title = $_POST['title'];
    $rating = $_POST['rating'];
    $description = $_POST['description'];
    $awards = $_POST['awards'];
    $duration = $_POST['duration'];
    $releasedate = $_POST['releasedate'];
    $seasons = $_POST['seasons'];
    $country = $_POST['country'];
    $lang = $_POST['lang'];
    $trailerid = $_POST['trailerid'];

    $sql = "INSERT INTO media (mediatype, title, rating, description, awards, duration, releasedate, seasons, country, lang, trailerid) 
    VALUES (:mediatype, :title, :rating, :description, :awards, :duration, :releasedate, :seasons, :country, :lang, :trailerid)";

    $data = [
        'mediatype' => $mediatype,
        'title' => $title,
        'rating' => $rating,
        'description' => $description,
        'awards' => $awards,
        'duration' => $duration,
        'releasedate' => $releasedate,
        'seasons' => $seasons,
        'country' => $country,
        'lang' => $lang,
        'trailerid' => $trailerid,
    ];


    $stmt = $pdo->prepare($sql);
    $stmt->execute($data);


    header('location: index.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>add media</title>
</head>

<body>
    <div class="content">
        <a href="index.php"><img src="home_icon.png" alt="home icon"></a>
        <h1>Toevoegen Mediatype</h1>
        <form action="" method="POST">
            <label for="mediatype">Mediatype (serie/film):</label><br>
            <select name="mediatype" id="mediatype" required>
                <option value="serie">Serie</option>
                <option value="film">Film</option>
            </select><br><br>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="" required><br><br>

            <label for="rating">Rating:</label>
            <input type="number" id="rating" name="rating" value="0"><br><br>

            <label for="awards">Awards:</label>
            <input type="number" id="awards" name="awards" value="0"><br><br>

            <label for="duration">Duration:</label>
            <input type="number" id="duration" name="duration" value="0"><br><br>

            <label for="releasedate">Date of release:</label>
            <input type="date" id="releasedate" name="releasedate" value="NULL"><br><br>

            <label for="seasons">Seasons:</label>
            <input type="number" name="seasons" id="seasons" value="0"><br><br>

            <label or="country">Country:</label>
            <input type="text" name="country" id="country" value=""><br><br>

            <label for="lang">Language:</label><br>
            <select name="lang" id="lang">
                <option value="NL">NL</option>
                <option value="EN">EN</option>
            </select><br><br>

            <label for="trailerid">YouTube Trailer ID:</label>
            <input type="text" name="trailerid" id="trailerid" value=""><br><br>

            <label for="description">Description:</label>
            <textarea name="description" id="description" rows="5" cols="40"></textarea><br><br>

            <input type="submit" name="submitButton">

        </form>
    </div>
</body>

</html>