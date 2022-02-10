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
	$rating = $_POST['rating'];
	$awards = $_POST['awards'] === "ja" ? 1 : 0;
	$seasons = $_POST['seasons'];
	$country = $_POST['country'];
	$language = $_POST['language'];
	$description = $_POST['description'];
     
     echo $awards;
     
	$sql = "UPDATE series 
     SET 
          title=:title,
		rating=:rating,
          seasons=:seasons,
          description=:description,
          country=:country,
          language=:language,
          has_won_awards=:has_won_awards
          WHERE id=:id";

     $data = [
          'title' => $title,
          'rating' => $rating,
          'seasons' => $seasons,
          'description' => $description, 
          'country' => $country,
          'language' => $language,
          'has_won_awards' => $awards, 
          'id' => $id
     ];

     
     $stmt = $pdo->prepare($sql);   
     $stmt->execute($data);
	

     header('location: index.php');
     exit;
} 

$serieId = $_GET['id'];

$sql = $pdo->prepare("SELECT * FROM series WHERE id = ?");
$sql->execute([$serieId]);
$serie = $sql->fetch();

$awards_current = $serie['has_won_awards'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="style.css">
     <title>edit serie</title>
</head>
<body>
     <div class="content">
          <a href="index.php"><img src="home_icon.png" alt="home icon"></a>
          <h1><?php echo $serie['title'] ?></h1>
          <form action="" method="POST">

		<input type="hidden" id="title" name="id" value="<?= $serie['id'] ?>">

          <label for="title">Title:</label>
          <input type="text" id="title" name="title" value="<?= $serie['title'] ?>"><br><br>

          <label for="rating">Rating:</label>
          <input type="number" id="rating" name="rating" value="<?= $serie['rating'] ?>"><br><br>

          <label for="awards">Awards:</label>
          <select name="awards" id="awards">
			<option value="ja"<?= $awards_current === 1 ? 'selected' : '' ?>>Ja</option>
			<option value="nee" <?= $awards_current === 0 ? 'selected' : '' ?>>Nee</option>
          </select><br><br>
          
          <label for="seasons">Seasons:</label>
		<input type="number" name="seasons" id="seasons" value="<?= $serie['seasons'] ?>" required>
		<br><br>

          <label or="country">Country:</label>
          <input type="text" name="country" id="country" value="<?= $serie['country'] ?>"><br><br>
          
          <label for="language">Language:</label>
		<input type="text" name="language" id="language" value="<?= $serie['language'] ?>"><br><br>
          <label for="description">Description:</label>
          <textarea name="description" id="description" rows="5" cols="40"><?php echo $serie['description'] ?></textarea><br><br>

          <input type="submit" name="submitButton">

        </form>
     </div>
</body>
</html>
