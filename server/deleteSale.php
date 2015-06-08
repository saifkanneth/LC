<?php 
include_once "dbConnection.php";
include_once "../inc/sessionsetting.class.php";

$sessionobj	=	sessionsetting::getInstance();
$con=DBConnection::getDbConn();
$request=json_decode(file_get_contents("php://input"),true);
$sno=$request['Sno'];
$sql="delete from sale where sno='$sno'";
$result=$con->query($sql);
if($result){
	$sql="update sale set sno=sno-1 where sno>'$sno'";
	$result=$con->query($sql);
	$sql="SELECT MAX(sno) as count FROM sale";
	$result=$con->query($sql);
	$row=$result->fetch_array();
	$count=$row["count"];
	$sql="ALTER TABLE sale AUTO_INCREMENT =0;";
	$con->query($sql);
	echo "success";
}else{
	echo "failure";
}

?>