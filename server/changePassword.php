<?php 

include_once "dbConnection.php";
include_once "../inc/sessionsetting.class.php";

$sessionobj	=	sessionsetting::getInstance();
$con=DBConnection::getDbConn();
$request=json_decode(file_get_contents("php://input"),true);
$oldpassword=$request['oldpassword'];
$newpassword=$request['newpassword'];
$confirmpassword=$request['confirmpassword'];
$sql="update login set password='$newpassword'";
$result=$con->query($sql);
if($result){
    $sessionobj->setCookie($newpassword);
    echo "success";
}
else
    echo "failure";
?>