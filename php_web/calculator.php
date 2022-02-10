<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Calculator</h1>
    <form>
        <input type="text" name="num1" placeholder="Number 1"><strong> First number </strong><br><br>
        <input type="text" name="num2" placeholder="Number 2"><strong> Second number </strong><br><br>
        <button type="submit" name="operator" value="Add">Add</button>
        <button type="submit" name="operator" value="Substract">Substract</button>
        <button type="submit" name="operator" value="Multiply">Multiply</button>
        <button type="submit" name="operator" value="Divide">Divide</button>
        <button type="submit" name="operator" value="Modulo">Modulo</button>
    </form>
    <br>
    <?php
    $result1 = $_GET['num1'];
    $result2 = $_GET['num2'];
    $operator = $_GET['operator'];
    switch ($operator) {
        case "Add":
            echo $result1 + $result2;
            break;
        case "Substract":
            echo $result1 - $result2;
            break;
        case "Multiply":
            echo $result1 * $result2;
            break;
        case "Divide":
            echo $result1 / $result2;
            break;
        case "Modulo":
            echo $result1 % $result2;
            break;
    }
    ?>
</body>

</html>