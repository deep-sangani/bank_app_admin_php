<?php require_once("../database/connection.php");
try {
    $sql = 'select * from transaction';
    $dbconn = new Dbconn();
    $getconn = $dbconn->getconnection();
    $stmt = $getconn->query($sql);
    $trans_array = [];
    while ($result = $stmt->fetch(PDO::FETCH_OBJ)) {
        array_push($trans_array, json_encode($result));
    }
    echo json_encode($trans_array);
} catch (PDOException $e) {
    echo $e;
}
