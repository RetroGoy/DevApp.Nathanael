<?php
$host = "localhost";
$dbname = "bdcontacts";
$user = "root";
$pass = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion: " . $e->getMessage();
}

$sql = "CREATE TABLE IF NOT EXISTS contact (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    pseudo VARCHAR(50) NOT NULL,
    pass VARCHAR(255) NOT NULL,  // Nous utiliserons un hash pour le mot de passe
    dateinscription DATETIME NOT NULL
)";
$pdo->exec($sql);
?>
