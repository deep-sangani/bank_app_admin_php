<?php require_once("../database/connection.php");


$acc_no = $_POST["acc_no"];


// fetch old record from database

try {

    $dbconn = new Dbconn();
    $getconn = $dbconn->getconnection();

    $sql = 'delete from customer where acc_no=?';
    $stmt = $getconn->prepare($sql);
    $stmt->execute([$acc_no]);
    $result = $stmt->rowCount();


    if ($result == 1) {

        unlink("../../uploads/" . $acc_no);
        header("Location:/resources/views/deleteAcc.php?msg=account is deleted successfully&acc_no={$acc_no}");
    }
} catch (PDOException $e) {
    echo $e;
}
