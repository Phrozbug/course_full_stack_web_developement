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
$series = $pdo->query("SELECT * FROM series");
$films = $pdo->query("SELECT * FROM films");

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
                    <th>Title</th>
                    <th>Rating</th>
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
                    <th>Title</th>
                    <th>Duur</th>
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