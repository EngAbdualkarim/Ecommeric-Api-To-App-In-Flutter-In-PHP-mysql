<?php
include "../connect.php";


$username=htmlspecialchars(strip_tags($_POST['username']));
$password=sha1($_POST['password']);
$email=htmlspecialchars(strip_tags($_POST['email']));
$phone=htmlspecialchars(strip_tags($_POST['phone']));
$verifycode=rand(10000,99999);


$stm=$con->prepare("SELECT * FROM users WHERE users_email=? OR 	users_phone=?");
$stm->execute(array($email,$phone));
$count=$stm->rowCount();
//if user exit
if($count>0){
    printFailure("PHONE OR EMAIL IS EXIST");
}else{
    $data=array(
        "users_name"=>$username,
        "users_email"=>$email,
        "password"=>$password,
        "users_phone"=>$phone,
        "users_verifycode"=>$verifycode
    );
    //هنا مهم دالة ارسال  الكود للتحقق
    //هنا يحدث خطاء عدم توجة التطبيق الى صفحة التحقق بسبب خطاء دالة ارسال الايميل اوقفها حتى ارفع الكود على استضافة واحصل على ايميل
    //sendEmail($email,"Verify Code Ecommerec App","Verify Code $verifycode");
    insertData("users",$data);

}



?>