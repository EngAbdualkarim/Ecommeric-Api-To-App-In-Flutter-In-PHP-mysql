<?php
include "connect.php";


$allData=array();
$categories=getAllData("categories",null,null,false);
$allData['status']="success";
$allData['categories']=$categories;
echo json_encode($allData);


?>