<?php
include "config.php";

if (isset($_POST["pseudo"], $_POST["email"], $_POST["pass"])) {
    $pseudo = $_POST["pseudo"];
    $email = $_POST["email"];
    $pass = password_hash($_POST["pass"], PASSWORD_DEFAULT);
    $dateinscription = date("Y-m-d H:i:s");

    $stmt = $pdo->prepare("INSERT INTO contact (pseudo, email, pass, date_inscription) VALUES (?, ?, ?, ?)");
    $stmt->execute([$pseudo, $email, $pass, $dateinscription]);
    echo "Inscription réussie!";
} 
else {
    echo "Veuillez remplir tous les champs!";
}
?>