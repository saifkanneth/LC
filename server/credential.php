<?php

include_once "dbConnection.php";
include_once "../inc/sessionsetting.class.php";

$sessionobj	=	sessionsetting::getInstance();
$con=DBConnection::getDbConn();
$request=json_decode(file_get_contents("php://input"), true);
$username=$request['username'];
$password=$request['password'];
$remember=$request['remember'];
$sql="select * from login where username='$username' and password='$password'";
$result=$con->query($sql);
if($result->num_rows>0){
			 $sessionobj->setsession($username,$password,$remember);
			echo "success";
}
else
		echo "failure";
?>