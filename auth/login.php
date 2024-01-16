
<?php
include "../connect.php";

$email=htmlspecialchars(strip_tags($_POST['email']));
$password=sha1($_POST['password']);

getData("users","users_email=? AND password=? AND users_approve=1",array($email,$password));


//$stm=$con->prepare("SELECT * FROM `users` WHERE `users_email`=? AND	`password`=? AND `users_approve`=1 ");
//$stm->execute(array($email,$password));
//$count=$stm->rowCount();
//if user exit
//result($count);

?>