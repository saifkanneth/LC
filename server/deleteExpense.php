<?php 
include_once "dbConnection.php";
include_once "../inc/sessionsetting.class.php";

$sessionobj	=	sessionsetting::getInstance();
$con=DBConnection::getDbConn();
$request=json_decode(file_get_contents("php://input"),true);
$code=$request['code'];
$sql="delete from expense where expid='$code'";
$result=$con->query($sql);
if($result){
	$sql="update expense set expid=expid-1 where expid>'$code'";
	$result=$con->query($sql);
	$sql="SELECT MAX(expid) as count FROM expense";
	$result=$con->query($sql);
	$row=$result->fetch_array();
	$count=$row["count"];
	$sql="ALTER TABLE expense AUTO_INCREMENT =0;";
	$con->query($sql);
	echo "success";
}else{
	echo "failure";
}

?>