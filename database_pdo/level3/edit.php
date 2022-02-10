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
    $id = $_POST['id'];
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

    $sql = "UPDATE media 
    SET
        mediatype=:mediatype,
        title=:title,
		rating=:rating,
        description=:description,
        awards=:awards,
        duration=:duration,
        releasedate=:releasedate,
        seasons=:seasons,
        country=:country,
        lang=:lang,
        trailerid=:trailerid
    WHERE id=:id";

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
        'id' => $id
    ];


    $stmt = $pdo->prepare($sql);
    $stmt->execute($data);


    header('location: index.php');
    exit;
}

$mediaId = $_GET['id'];

$sql = $pdo->prepare("SELECT * FROM media WHERE id = ?");
$sql->execute([$mediaId]);
$media = $sql->fetch();


$mediatype_current = $media['mediatype'];
$lang_current = $media['lang'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>edit media</title>
</head>

<body>
    <div class="content">
        <a href="index.php"><img src="home_icon.png" alt="home icon"></a>
        <h1><?php echo $media['title'] ?></h1>
        <form action="" method="POST">
            <input type="hidden" id="id" name="id" value="<?= $media['id'] ?>">
            <label for="mediatype">Mediatype (serie/film):</label><br>
            <select name="mediatype" id="mediatype">
                <option value="serie" <?= $mediatype_current == "serie" ? 'selected' : '' ?>>Serie</option>
                <option value="film" <?= $mediatype_current == "film" ? 'selected' : '' ?>>Film</option>
            </select><br><br>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?= $media['title'] ?>"><br><br>

            <label for="rating">Rating:</label>
            <input type="number" id="rating" name="rating" value="<?= $media['rating'] ?>"><br><br>

            <label for="awards">Awards:</label>
            <input type="number" id="awards" name="awards" value="<?= $media['awards'] ?>"><br><br>

            <label for="duration">Duration:</label>
            <input type="number" id="duration" name="duration" value="<?= $media['duration'] ?>"><br><br>

            <label for="releasedate">Date of release:</label>
            <input type="date" id="releasedate" name="releasedate" value="<?= $media['releasedate'] ?>"><br><br>

            <label for="seasons">Seasons:</label>
            <input type="number" name="seasons" id="seasons" value="<?= $media['seasons'] ?>"><br><br>

            <label or="country">Country:</label>
            <input type="text" name="country" id="country" value="<?= $media['country'] ?>"><br><br>

            <label for="lang">Language:</label><br>
            <select name="lang" id="lang">
                <option value="NL" <?= $lang_current == "NL" ? 'selected' : '' ?>>NL</option>
                <option value="EN" <?= $lang_current == "EN" ? 'selected' : '' ?>>EN</option>
            </select><br><br>

            <label for="trailerid">YouTube Trailer ID:</label>
            <input type="text" name="trailerid" id="trailerid" value="<?= $media['trailerid'] ?>"><br><br>

            <label for="description">Description:</label>
            <textarea name="description" id="description" rows="5" cols="40"><?php echo $media['description'] ?></textarea><br><br>

            <input type="submit" name="submitButton">

        </form>
    </div>
</body>

</html>