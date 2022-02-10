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
	$title = $_POST['title'];
	$duration = $_POST['duration'];
	$date = $_POST['date'];
	$country = $_POST['country'];
	$description = $_POST['description'];
     $idtrailer = $_POST['idtrailer'];
     
    
	$sql = "UPDATE films 
     SET 
          titel=:titel,
		duur=:duur,
          datum_van_uitkomst=:datum_van_uitkomst,
          land_van_uitkomst=:land_van_uitkomst,
          omschrijving=:omschrijving,
          idtrailer=:idtrailer
          WHERE id=:id";

     $data = [
          'titel' => $title,
		'duur' => $duration,
          'datum_van_uitkomst' => $date,
          'land_van_uitkomst' => $country,
          'omschrijving' => $description,
          'idtrailer' => $idtrailer,
          'id' => $id
     ];
     
     
     $stmt = $pdo->prepare($sql);   
     $stmt->execute($data);
	

     header('location: index.php');
     exit;
} 

$filmId = $_GET['id'];

$sql = $pdo->prepare("SELECT * FROM films WHERE id = ?");
$sql->execute([$filmId]);
$film = $sql->fetch();

?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="style.css">
     <title>edit film</title>
</head>
<body>
     <div class="content">
          <a href="index.php"><img src="home_icon.png" alt="home icon"></a>
          <h1><?php echo $film['titel'] ?></h1>
          <form action="" method="POST">

		<input type="hidden" id="title" name="id" value="<?= $film['id'] ?>">

          <label for="title">Title:</label>
          <input type="text" id="title" name="title" value="<?= $film['titel'] ?>"><br><br>

          <label for="duration">Duur:</label>
          <input type="time" id="duration" name="duration" value="<?= $film['duur'] ?>"><br><br>
              
          <label for="date">Datum van uitkomst:</label>
		<input type="date" name="date" id="date" value="<?= $film['datum_van_uitkomst'] ?>" required>
		<br><br>

          <label or="country">Land van uitkomst:</label>
          <input type="text" name="country" id="country" value="<?= $film['land_van_uitkomst'] ?>"><br><br>
          
          
          <label for="description">Description:</label>
          <textarea name="description" id="description" rows="5" cols="40"><?php echo $film['omschrijving'] ?></textarea><br><br>
          
          <label for="idtrailer">ID Trailer:</label>
		<input type="text" name="idtrailer" id="idtrailer" value="<?= $film['idtrailer'] ?>"><br><br>
          
          <input type="submit" name="submitButton">

        </form>
     </div>
</body>
</html>
