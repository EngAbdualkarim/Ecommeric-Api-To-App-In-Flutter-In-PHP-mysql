
<?php
include "../connect.php";

$email=htmlspecialchars(strip_tags($_POST['email']));
$verifycode=rand(10000,99999);
$stm=$con->prepare("SELECT * FROM `users` WHERE `users_email`=? ");
$stm->execute(array($email));
$count=$stm->rowCount();
//if user exit
if($count>0){
    $data=array("users_verifycode"=>$verifycode);
    updateData("users",$data,"users_email ='$email'");
   // sendEmail($email,"Verify Code Ecommerec App","Verify Code $verifycode");
}




?>