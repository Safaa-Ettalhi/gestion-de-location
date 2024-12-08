<?php
$host = 'localhost';     // L'hôte de la base de données
$dbname = 'location_voitures';  // Nom de la base de données
$username = 'root';      // Votre nom d'utilisateur
$password = 'safaa';          // Votre mot de passe (s'il y en a un)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
