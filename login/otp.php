<?php 
function createOTP($length = 6)
{    
    $otp = "";
    $characters = "0123456789";
    $max = strlen($characters) - 1;
    for ($i = 0; $i < $length; $i++) {
        $otp .= $characters[random_int(0, $max)];
    }
    return $otp;
}?>