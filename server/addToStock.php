<?php

include_once "dbConnection.php";
include_once "../inc/sessionsetting.class.php";

$sessionobj	=	sessionsetting::getInstance();
$con=DBConnection::getDbConn();
$request=json_decode(file_get_contents("php://input"), true);
$itemcode=$request['itemcode'];
$itemname=$request['itemname'];
$itemprice=$request['itemprice'];
if($itemcode==0)
	$sql="insert into stock (itemname,itemprice)  values ('$itemname','$itemprice')";
else
	$sql="update stock set  itemname='$itemname',itemprice='$itemprice' where itemcode='$itemcode' ";
$result=$con->query($sql);
if($result){
			echo "success";
}
else
		echo "failure";
?>