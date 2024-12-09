<?php
$host = 'localhost';    
$dbname = 'location_voitures';  
$username = 'root';      
$password = 'safaa';     


$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

$conn->set_charset("utf8");

//récupérer les données des clients
$sql = "SELECT * FROM clients";
$result = $conn->query($sql);

//récupérer les données des voitures
$sql = "SELECT * FROM voitures";
$resultVoit = $conn->query($sql);

//récupérer les données des Contrats
$sql = "SELECT c.id, cl.nom, cl.prenom, v.marque, c.date_debut, c.date_fin, c.total, c.statut
        FROM contrats c
        JOIN clients cl ON c.id_client = cl.id
        JOIN voitures v ON c.id_voiture = v.id";
$resultCont = $conn->query($sql);

//recuperer nbr total de voiture:

$nbrVoit = $conn->query("SELECT COUNT(*) FROM voitures");

$nbrClient = $conn->query("SELECT COUNT(*) FROM clients");

$nbrVoiLouer = $conn->query("SELECT COUNT(*) FROM voitures WHERE statut = 'Louée'");
$nbrVoiDisp = $conn->query("SELECT COUNT(*) FROM voitures WHERE statut != 'Louée'");

?>
