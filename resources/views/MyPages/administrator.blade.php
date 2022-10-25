<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
$f = $_GET['fname'];
$l = $_GET['lname'];
$ad = $_GET['address'];
$tel = $_GET['tel'];
 $g  = $_GET['gender'];
 $pass = $_GET['password'];
 $email = $_GET['email'];

 
$servername = "localhost";
$username = "root";
$password = "";
$db = "mysql:host=$servername;dbname=myanka";
 try {
    $conn = new PDO($db, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "insert into administrators(first_name, last_name, Email, address, telephone_number, gender, password)
    values('$f', '$l', '$email', '$ad', '$tel', '$g', '$pass')";

    $conn->exec($sql);

    
 } catch (PDOException $e){
    echo $sql."<br>".$e->getMessage();
 }

 $conn= null;


   ?>
</body>
</html>