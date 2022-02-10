<?php

session_start();

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
if (!isset($_SESSION['LoggedInUser'])) {
	header('location: login.php');
	exit;
}

$orderBy = "title";
$orderByFilm = "title";
$order = "asc";
$orderFilm = "asc";

if (!empty($_GET["orderBy"])) {
     $orderBy = $_GET["orderBy"];
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

$series = $pdo->query("SELECT * FROM media WHERE mediatype = 'serie'  ORDER BY " .  $orderBy . " " . $order);
$films = $pdo->query("SELECT * FROM media WHERE mediatype = 'film' ORDER BY " . $orderByFilm . " " . $orderFilm);

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
if ($orderByFilm == "title" and $orderFilm == "asc") {
     $titelNextOrder = "desc";
}
if ($orderByFilm == "duration" and $orderFilm == "asc") {
     $duurNextOrder = "desc";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="style.css" type="text/css">
     <title>netland beheerders paneel</title>
</head>

<body>
     <div class="content">
          <form action="logout.php">
          <input style="color:red" type="submit" name="logout" value="Log Out">
          </form>
          <h1>Welkom op het netland beheerders paneel</h1>
          <h2>Series</h2>
          <table>
               <tr>
                    <th><a href="?orderBy=title&order=<?php echo $postTitleNextOrder; ?>&orderByFilm=<?php echo $orderByFilm ?>&orderFilm=<?php echo $orderFilm ?>">Title</a></th>
                    <th><a href="?orderBy=rating&order=<?php echo $ratingNextOrder; ?>&orderByFilm=<?php echo $orderByFilm ?>&orderFilm=<?php echo $orderFilm ?>">Rating</a></th>
                    <th>Details</th>
                    <th>Edit</th>
               </tr>
                <?php while ($row = $series->fetch()) { ?>
                    <tr>
                         <td><?php echo $row['title']; ?></td>
                         <td><?php echo $row['rating']; ?></td>
                         <td><a href="series.php?id=<?php echo $row['id'] ?>">Bekijk details</a></td>
                         <td><a href="edit.php?id=<?php echo $row['id'] ?>">Edit data</a></td>

                    </tr>
                <?php } ?>
                <tr>
                     <td colspan="4"><a href="insert.php">Serie Toevoegen</a></td>
                </tr>
          </table>
          <h2>Films</h2>
          <table>
               <tr>
                    <th><a href="?orderByFilm=title&orderFilm=<?php echo $titelNextOrder; ?>&orderBy=<?php echo $orderBy ?>&order=<?php echo $order ?>">Title</a></th>
                    <th><a href="?orderByFilm=duration&orderFilm=<?php echo $duurNextOrder; ?>&orderBy=<?php echo $orderBy ?>&order=<?php echo $order ?>">Duur</a></th>
                    <th>Details</th>
                    <th>Edit</th>
               </tr>
                <?php while ($row = $films->fetch()) { ?>
                    <tr>
                         <td><?php echo $row['title']; ?></td>
                         <td><?php echo $row['duration']; ?></td>
                         <td><a href="films.php?id=<?php echo $row['id'] ?>">Bekijk details</a></td>
                         <td><a href="edit.php?id=<?php echo $row['id'] ?>">Edit data</a></td>
                    </tr>
                <?php } ?>
                <tr>
                     <td colspan="4"><a href="insert.php">Film Toevoegen</a></td>
                </tr>
          </table>
          <br>
          <br>
     </div>
</body>

</html>