<?php

$ad = $_POST['address'];


$servername = "localhost";
$username = "root";
$password = "";
$db = "mysql:host=$servername;dbname=myanka";
 try {
    $conn = new PDO($db, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "insert into Users(address)
    values('$ad')";

    $conn->exec($sql);

   
 } catch (PDOException $e){
    echo $sql."<br>".$e->getMessage();
 }

 $conn= null;

?>