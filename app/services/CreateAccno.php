<?php include_once("../database/connection.php");
class CreateAccount
{

    function createacc()
    {
        $acc_no = "";
        for ($i = 1; $i <= 12; $i++) {
            $acc_no .= mt_rand(0, 9);
        }
        $acc_no = "DSFS" . $acc_no;
        $dbconn = new Dbconn();
        $getconn = $dbconn->getconnection();
        $sql = 'select * from customer where acc_no=?';
        $stmt = $getconn->prepare($sql);
        $stmt->execute([$acc_no]);
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        if ($result) {
            $this->createacc();
        }


        return $acc_no;
    }
}
