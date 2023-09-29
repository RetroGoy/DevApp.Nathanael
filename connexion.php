<?php
include "config.php";
session_start();

if (isset($_POST["pseudo"], $_POST["pass"])) {
    $pseudo = $_POST["pseudo"];
    $pass = $_POST["pass"];
    
    $stmt = $pdo->prepare("SELECT * FROM contact WHERE pseudo = ?");
    $stmt->execute([$pseudo]);

    $user = $stmt->fetch();
    if ($user && password_verify($pass, $user["pass"])) {
        $_SESSION["user"] = $user;
        header("Location: espacemembre.php");
    } else {
        echo "Mauvais identifiants!";
    }
} else {
    echo "Veuillez remplir tous les champs!";
}
?>
