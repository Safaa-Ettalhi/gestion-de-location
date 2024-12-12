<?php
include('db.php');
if( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $adresse = $_POST['adresse'];
    

$query = $conn->query("INSERT INTO `clients` (`nom`, `prenom`, `email`, `telephone`, `adresse`) 
                                VALUES ('$nom', '$prenom', '$email', '$telephone', '$adresse')");
    header("Location: ./client.php");

}
?>
