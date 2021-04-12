
<?php require("../database/connection.php");
session_start();
if (isset($_POST)) {

    $eid = $_POST["empid"];
    $pass = $_POST["pass"];
    $dbconn = new Dbconn();
    $getconn = $dbconn->getconnection();


    $sql = 'select * from emp where empid=? and password=?';
    $stmt = $getconn->prepare($sql);
    $stmt->execute([$eid, $pass]);
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    $_SESSION["user"] = $result;


    if ($result) {
        header('Location:/resources/views/deshBoard.php');
    } else {
        header('Location:/resources/views/login.php?err=username or password is wrong  !!');
    }
}
?>