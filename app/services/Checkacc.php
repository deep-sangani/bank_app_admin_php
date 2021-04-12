<?php require_once("../database/connection.php");
class Checkacc
{

    function verifiedAcc($cus_first_name, $cus_last_name, $acc_no)
    {
        try {
            $sql = 'select acc_no from customer where first_name=? and acc_no=? and last_name=?';
            $dbconn = new Dbconn();
            $getconn = $dbconn->getconnection();
            $stmt = $getconn->prepare($sql);
            $stmt->execute([$cus_first_name, $acc_no, $cus_last_name]);
            $result = $stmt->fetch(PDO::FETCH_OBJ);
            return ($result->acc_no);
        } catch (PDOException $e) {
            echo $e;
        }
    }
}
