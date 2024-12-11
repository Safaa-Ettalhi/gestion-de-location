<?php
include('db.php');
if( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    $nom= trim(htmlspecialchars($_POST['nom']));
    $prenom = trim(htmlspecialchars($_POST['prenom']));
    $email = trim(htmlspecialchars($_POST['email']));
    $phone = trim(htmlspecialchars($_POST['telephone']));
    $address = trim(htmlspecialchars($_POST['adresse']));
    

$query = $conn->query("INSERT INTO `clients` (`nom`, `prenom`, `email`, `telephone`, `adresse`) 
                                VALUES ('$nom', '$prenom', '$email', '$phone', '$address')");
    header("Location: ./client.php");

}
?>
