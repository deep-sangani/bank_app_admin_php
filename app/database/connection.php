<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bank";
$dsn = 'mysql:host='.$servername.';dbname='.$dbname;
// Create connection
try{

  $conn = new PDO($dsn,$username,$password);
// Check connection
$conn->setAttribute(PDO::FETCH_OBJ,PDO::ERRMODE_EXCEPTION,PDO::FETCH_ASSOC);
// echo "database connected";
}catch(PDOException $e){
  echo $e;
}




?>