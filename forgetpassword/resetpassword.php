<?php
include "../connect.php";


$email=htmlspecialchars(strip_tags($_POST['email']));
$password=sha1($_POST['password']);
$data=array("password"=>$password);
updateData("users",$data,"users_email ='$email'");

?>