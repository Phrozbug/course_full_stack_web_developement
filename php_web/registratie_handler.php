<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Forum registratie</h1><br>
    <?php 
    echo "Jouw username is " . $_POST["Username"] . "<br>";
    echo "Jouw email is " . $_POST["Email"] . "<br>";
    echo "Jouw age is " . $_POST["Age"] . "<br>";
    ?>
</body>

</html>