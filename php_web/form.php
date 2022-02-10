<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Formulier</title>
</head>
<body>
    <h1>Schrijf je in voor de nieuwsbrief</h1>
    <form method="post" action="form.php">
        <input type="text" id="email" name="email" value="email">
        <input type="submit" value="Verzenden">
    </form>
<?php 

if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    header("Location: success.php");
} else {
    echo "E-mailadres is niet geldig";
}
?>
    
</body>
</html>
