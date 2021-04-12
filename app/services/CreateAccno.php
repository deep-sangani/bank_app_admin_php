<?php
class CreateAccount{

    function createacc(){
        $acc_no = "";
        for( $i=1;$i<=10;$i++){
            $acc_no.=mt_rand(0,9);
        }
        $acc_no = "DSFS".$acc_no;
        return $acc_no;
    }
}

?>