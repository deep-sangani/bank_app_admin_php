<?php
class Dbconn
{
  function getconnection()
  {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bank";
    $dsn = 'mysql:host=' . $servername . ';dbname=' . $dbname;
    // Create connection
    $conn = "";
    try {

      $conn = new PDO($dsn, $username, $password);
      // Check connection
      $conn->setAttribute(PDO::FETCH_OBJ, PDO::ERRMODE_EXCEPTION,);
      // echo "database connected";

    } catch (PDOException $e) {
      echo $e;
    }
    return $conn;
  }
}
