<?php
include "../connect.php";

$email=htmlspecialchars(strip_tags($_POST['email']));
$verifycod=htmlspecialchars(strip_tags($_POST['verifycode']));

$stm=$con->prepare("SELECT * FROM users WHERE users_email ='$email' AND users_verifycode='$verifycod'");

$stm->execute();
$count=$stm->rowCount();

if($count>0){
    $data=array("users_approve"=>"1");
    updateData("users",$data,"users_email ='$email'");
}else{
    printFailure("verify Code Not Correct");

}


?>      