<?php
include('db.php');
if( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    $id_client = $_POST['id_client'];
    $id_voiture = $_POST['id_voiture'];
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    $total = $_POST['total'];
    $statut = $_POST['statut'];


$query = $conn->query("INSERT INTO `contrats` (`id_client`, `id_voiture`, `date_debut`, `date_fin`, `total`,`statut`) 
                                VALUES ('$id_client', '$id_voiture', '$date_debut', '$date_fin', '$total','$statut')");
   

    header("Location: ./contrat.php");

}
?>