<?php include_once("../services/Checkacc.php");
$cus_first_name = $_POST["cus_first_name"];
$cus_last_name = $_POST["cus_last_name"];
$acc_no = $_POST["acc_no"];
$featurename = $_POST["featurename"];



$checkacc = new Checkacc();
$result = $checkacc->verifiedAcc($cus_first_name, $cus_last_name, $acc_no);
if (isset($result)) {
    if ($featurename == "deposit") {
        header("Location:/resources/views/depositBal.php?userexist=true&acc_no={$result}");
    }
    if ($featurename == "withdraw") {
        header("Location:/resources/views/withdrawBal.php?userexist=true&acc_no={$result}");
    }
    if ($featurename == "deposit") {
        header("Location:/resources/views/depositBal.php?userexist=true&acc_no={$result}");
    }
} else {

    if ($featurename == "deposit") {
        header('Location:/resources/views/depositBal.php?userexist=false');
    }
    if ($featurename == "withdraw") {
        header('Location:/resources/views/withdrawBal.php?userexist=false');
    }
    if ($featurename == "deposit") {
        header('Location:/resources/views/depositBal.php?userexist=false');
    }
}
