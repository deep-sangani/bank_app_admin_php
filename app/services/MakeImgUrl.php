<?php
class MakeImgUrl
{
    function getimgurl($acc_no)
    {
        $acc_holder_img_url = "http://localhost:3000/app/services/getAccImg.php?acc_no={$acc_no}";
        return $acc_holder_img_url;
    }
}
