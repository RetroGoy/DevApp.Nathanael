<?php
include "config.php";
session_start();

if (isset($_POST["pseudo"], $_POST["pass"])) {
    $pseudo = $_POST["pseudo"];
    $pass = $_POST["pass"];
    
    $userplace = $pdo->prepare("SELECT * FROM contact WHERE pseudo = ?");
    $userplace->execute([$pseudo]);

    $user = $userplace->fetch();
    if ($user && password_verify($pass, $user["pass"])) {
        $_SESSION["user"] = $user;
        header("Location: espacemembre.php");
    } else {
        echo "Mauvais identifiants";
    }
} else {
    echo "Remplissez tous les champs";
}
?>
