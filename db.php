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

?>
