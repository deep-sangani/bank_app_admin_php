<?php include_once("../database/connection.php");

$acc_no = $_POST["acc_no"];


try {
    $sql = 'select * from customer where acc_no=?';
    $dbconn = new Dbconn();
    $getconn = $dbconn->getconnection();
    $stmt = $getconn->prepare($sql);
    $stmt->execute([$acc_no]);
    $result = $stmt->fetch(PDO::FETCH_OBJ);



    if ($result) {

        $first_name = $result->first_name;
        $last_name = $result->last_name;
        $email_address = $result->email_address;
        $street_address = $result->street_address;
        $city = $result->city;
        $state = $result->state;
        $account_type = $result->account_type;
        $pan_card = $result->pan_card;
        $mobile_no = $result->mobile_no;
        $aadhar_card = $result->aadhar_card;
        $postal_code = $result->postal_code;
        $acc_no = $result->acc_no;
        $balance = $result->balance;
        $photo_url = "http://localhost:3000/app/services/getAccImg.php?acc_no={$acc_no}";

        header("Location:/resources/views/userInfo.php?first_name={$first_name}&last_name={$last_name}&email_address={$email_address}&street_address={$street_address}&city={$city}&state={$state}&account_type={$account_type}&pan_card={$pan_card}&mobile_no={$mobile_no}&aadhar_card={$aadhar_card}&postal_code={$postal_code}&acc_no={$acc_no}&balance={$balance}&photo_url={$photo_url}");
    } else {
        header('Location:/resources/views/userinfo.php?userexist=false');
    }
} catch (PDOException $e) {
    echo $e;
}
