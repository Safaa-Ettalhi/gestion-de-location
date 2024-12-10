<?php
include('db.php');
if( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    $marque = $_POST['marque'];
    $modele = $_POST['modele'];
    $annee = $_POST['annee'];
    $prix_jour = $_POST['prix_jour'];
    $statut = $_POST['statut'];
   
 
$query = $conn->query("INSERT INTO `voitures` (`marque`, `modele`, `annee`, `prix_jour`, `statut`)  
                                VALUES ('$marque', '$modele', '$annee', '$prix_jour', '$statut')");
    header("Location: ./vehicule.php");
}
?>