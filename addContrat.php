<?php
include('db.php');
if( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    $id_client = trim(htmlspecialchars($_POST['id_client']));
    $id_voiture = trim(htmlspecialchars($_POST['id_voiture']));
    $date_debut = trim(htmlspecialchars($_POST['date_debut']));
    $date_fin = trim(htmlspecialchars($_POST['date_fin']));
    $total = trim(htmlspecialchars($_POST['total']));
    $statut = trim(htmlspecialchars($_POST['statut']));


$query = $conn->query("INSERT INTO `contrats` (`id_client`, `id_voiture`, `date_debut`, `date_fin`, `total`,`statut`) 
                                VALUES ('$id_client', '$id_voiture', '$date_debut', '$date_fin', '$total','$statut')");
    header("Location: ./contrat.php");

}
?>