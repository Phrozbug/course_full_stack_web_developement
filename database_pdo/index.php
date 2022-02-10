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

$orderBy = "title";
$orderByFilm = "titel";
$order = "asc";
$orderFilm = "asc";

if (!empty($_GET["orderby"])) {
     $orderBy = $_GET["orderby"];
}
if (!empty($_GET["order"])) {
     $order = $_GET["order"];
}

if (!empty($_GET["orderByFilm"])) {
     $orderByFilm = $_GET["orderByFilm"];
}
if (!empty($_GET["orderFilm"])) {
     $orderFilm = $_GET["orderFilm"];
}
$series = $pdo->query("SELECT * FROM series ORDER BY " .  $orderBy . " " . $order);
$films = $pdo->query("SELECT * FROM films ORDER BY " . $orderByFilm . " " . $orderFilm);

$postTitleNextOrder = "asc";
$ratingNextOrder = "asc";
$titelNextOrder = "asc";
$duurNextOrder = "asc";


if ($orderBy == "title" and $order == "asc") {
     $postTitleNextOrder = "desc";
}
if ($orderBy == "rating" and $order == "asc") {
     $ratingNextOrder = "desc";
}
if ($orderByFilm == "titel" and $orderFilm == "asc") {
     $titelNextOrder = "desc";
}
if ($orderByFilm == "duur" and $orderFilm == "asc") {
     $duurNextOrder = "desc";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="style.css">
     <title>netland beheerders paneel</title>
</head>

<body>
     <div class="content">
          <h1>Welkom op het netland beheerders paneel</h1>
          <h2>Series</h2>
          <table>
               <tr>
                    <th><a href="?orderby=title&order=<?php echo $postTitleNextOrder; ?>">Title</a></th>
                    <th><a href="?orderby=rating&order=<?php echo $ratingNextOrder; ?>">Rating</a></th>
                    <th>Details</th>
               </tr>
                <?php while ($row = $series->fetch()) { ?>
                    <tr>
                         <td><?php echo $row['title']; ?></td>
                         <td><?php echo $row['rating']; ?></td>
                         <td><a href="series.php?id=<?php echo $row['id'] ?>">Bekijk details</a></td>
                    </tr>
                <?php } ?>
          </table>
          <h2>Films</h2>
          <table>
               <tr>
                    <th><a href="?orderByFilm=titel&orderFilm=<?php echo $titelNextOrder; ?>">Title</a></th>
                    <th><a href="?orderByFilm=duur&orderFilm=<?php echo $duurNextOrder; ?>">Duur</a></th>
                    <th>Details</th>
               </tr>
                <?php while ($row = $films->fetch()) { ?>
                    <tr>
                         <td><?php echo $row['titel']; ?></td>
                         <td><?php echo $row['duur']; ?></td>
                         <td><a href="films.php?id=<?php echo $row['id'] ?>">Bekijk details</a></td>
                    </tr>
                <?php } ?>
          </table>
     </div>
</body>

</html>