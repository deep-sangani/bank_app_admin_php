<?php require_once("../database/connection.php");
require_once("../services/MakeImgUrl.php");

$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$email_add = $_POST["email_add"];
$street_add = $_POST["street_add"];
$city = $_POST["city"];
$pincode = $_POST["pincode"];
$state = $_POST["state"];
$account_type = $_POST["account_type"];
$pan_card = $_POST["pan_card"];
$mobile_no = $_POST["mobile_no"];
$aadhar_no = $_POST["aadhar_no"];
$acc_no = $_POST["acc_no"];




try {
    $dbconn = new Dbconn();
    $getconn = $dbconn->getconnection();


    $sql = "update customer set first_name=?,last_name=?,email_address=?,street_address=?,city=?,state=?,account_type=?,pan_card=?,mobile_no=?,aadhar_card=?,postal_code=? where acc_no=?";

    $stmt = $getconn->prepare($sql);

    $result =  $stmt->execute([$first_name, $last_name, $email_add, $street_add, $city, $state, $account_type, $pan_card, $mobile_no, $aadhar_no, $pincode, $acc_no]);
    if ($result == 1) {
        $MakeImgUrl = new MakeImgUrl();
        $url = $MakeImgUrl->getimgurl($acc_no);
        header("Location:/resources/views/userInfo.php?msg=User info updated successfully&acc_no={$acc_no}&acc_img_url={$url}");
    }
} catch (PDOException $e) {
    echo $e;
}
