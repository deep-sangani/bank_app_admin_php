<?php 
$acc_no = $_GET["acc_no"];

 echo file_get_contents("../../uploads/{$acc_no}");

?>