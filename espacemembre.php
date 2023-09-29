<?php
session_start();

if (isset($_SESSION["user"])) {
    echo "Bienvenue, " . $_SESSION["user"]["pseudo"] . "!";
} else {
    header("Location: connexion.html");
}
?>
