<html>
<body>
<?php
if (!isset($_COOKIE["count"])) {
    echo "Geen cookie";
    $cookie = 1;
    setcookie("count", $cookie, time() + (86400 * 30), "/");
} else {
    $cookie = ++$_COOKIE['count'];
    setcookie("count", $cookie, time() + (86400 * 30), "/");
    echo "Je hebt deze pagina " . $_COOKIE["count"] . " keer bezocht";
}
?>    
</body>   
</html>