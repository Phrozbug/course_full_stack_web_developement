<?php
session_start();
?>
<html>

<body>
    <?php
    if (!isset($_SESSION["count"])) {
        $session = 1;
        $_SESSION["count"] = $session;
        echo "Je hebt deze pagina " . $_SESSION["count"] . " keer bezocht";
    } else {
        $session = ++$_SESSION["count"];
        $_SESSION["count"] = $session;
        echo "Je hebt deze pagina " . $_SESSION["count"] . " keer bezocht";
    }
    ?>
</body>

</html>