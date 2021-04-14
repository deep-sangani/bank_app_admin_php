<?php require_once("../database/connection.php");
require_once("../services/MakeImgUrl.php");

$acc_no = $_POST["acc_no"];
$deposit_amt = $_POST["deposit_amt"];
$particulars = $_POST["particulars"];

// fetch old record from database

try {

    $dbconn = new Dbconn();
    $getconn = $dbconn->getconnection();

    $sql = 'select balance from customer where acc_no=?';
    $stmt = $getconn->prepare($sql);
    $stmt->execute([$acc_no]);
    $result = $stmt->fetch(PDO::FETCH_OBJ)->balance;
    $balance = doubleval($result) + doubleval($deposit_amt);
    $sql = 'update customer set balance = ? where acc_no = ?';
    $stmt = $getconn->prepare($sql);
    $stmt->execute([$balance, $acc_no]);
    $result = $stmt->rowCount();
    if ($result == 1) {
        // set data in transaction table
        $sql = 'insert into transaction(date,acc_no,deposit,particulers,balance) values(?,?,?,?,?)';
        $stmt = $getconn->prepare($sql);
        $stmt->execute([date("j M y"), $acc_no, $deposit_amt, $particulars, $balance]);
        $result = $stmt->rowCount();
        if ($result == 1) {
            $MakeImgUrl = new MakeImgUrl();
            $url = $MakeImgUrl->getimgurl($acc_no);
            header("Location:/resources/views/depositBal.php?msg=balance is deposited successfully&acc_no={$acc_no}&acc_img_url={$url}");
        }
    }
} catch (PDOException $e) {
    echo $e;
}
