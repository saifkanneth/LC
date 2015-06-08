<?php 
include_once "dbConnection.php";
include_once "../inc/sessionsetting.class.php";

$sessionobj	=	sessionsetting::getInstance();
$con=DBConnection::getDbConn();
$request=json_decode(file_get_contents("php://input"),true);
$itemcode=$request['itemcode'];
$sql="delete from stock where itemcode='$itemcode'";
$result=$con->query($sql);
if($result){
	$sql="update stock set itemcode=itemcode-1 where itemcode>'$itemcode'";
	$result=$con->query($sql);
	$sql="SELECT MAX(itemcode) as count FROM stock";
	$result=$con->query($sql);
	$row=$result->fetch_array();
	$count=$row["count"];
	$sql="ALTER TABLE stock AUTO_INCREMENT =0;";
	$con->query($sql);
	echo "success";
}else{
	echo "failure";
}

?>