<?php
session_start();


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

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->query("SELECT password, id FROM gebruiker WHERE username='$username'");

    $data = $stmt->fetch();
    $gebruiker_password = $data['password'];
    $gebruik_id = $data['id'];

    if ($password === $gebruiker_password) {
        $_SESSION['LoggedInUser'] = $gebruik_id;
        header('location: index.php');
        exit;
    } else {
        echo "<h3 style='color:red;'>Authentication failed. Please try again.</h3>";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>netland beheerders login</title>
</head>

<body>
    <div class="content">
        <h1>netland beheerders login</h1>

        <form action="" method="POST">

            <label for="username">Username:</label>
            <input type="text" name="username" value="" id="username" required>

            <label for="username">Password:</label>
            <input type="password" name="password" value="" id="password" required>

            <input type="submit" value="Submit" name="submit">

        </form>
    </div>
</body>

</html>