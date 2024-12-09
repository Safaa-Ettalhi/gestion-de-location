<?php
if( isset($_GET["id"])){
    include('db.php');
    $id=$_GET["id"]; 
    $stmt= $conn  -> query(" DELETE FROM clients WHERE id =$id ; ");
   header("location: ./client.php");
} 
?>