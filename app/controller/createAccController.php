
<?php require("../database/connection.php");
require_once("../services/CreateAccno.php");
session_start();
if (isset($_POST)) {
    // fetch all the req body
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email_address = $_POST["email_address"];
    $country = $_POST["country"];
    $street_address = $_POST["street_address"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $postal_code = $_POST["postal_code"];
    $account_type = $_POST["account_type"];
    $aadhar_card = $_POST["aadhar_card"];
    $pan_card = $_POST["pan_card"];
    $mobile_no = $_POST["mobile_no"];
    $target_dir = __DIR__ . "/uploads/";


    $filename = $_FILES['customer_photo']['name'];
    $file_ext = explode(".", $filename)[1];

    // genrate account no
    $ca = new CreateAccount();
    $acc_no = $ca->createacc();
    $location = "../../uploads/" . "$acc_no";

    // make sql query and save data to database

    try {
        $dbconn = new Dbconn();
        $getconn = $dbconn->getconnection();
        $sql = 'insert into customer(first_name,last_name,email_address,street_address,city,state,account_type,pan_card,mobile_no,aadhar_card,postal_code,acc_no) values (?,?,?,?,?,?,?,?,?,?,?,?)';
        $stmt = $getconn->prepare($sql);
        $stmt->execute([$first_name, $last_name, $email_address, $street_address, $city, $state, $account_type, $pan_card, $mobile_no, $aadhar_card, $postal_code, $acc_no]);
        $stmt->execute(PDO::FETCH_OBJ);
        // Permanently save the file upload to the upload folder 
        if (!move_uploaded_file($_FILES['customer_photo']['tmp_name'], $location)) {
            header("Location:/resources/views/createAccount.php?err=img is not uploaded successfully");
        }

        header("Location:/resources/views/createAccount.php?msg=create account successfully&acc_no={$acc_no}&acc_img_url=http://localhost:3000/app/services/getAccImg.php?acc_no={$acc_no}");
    } catch (PDOException $e) {
        echo "exception : " . $e->getMessage();
    }
}
?>