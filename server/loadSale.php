<?php 

include_once "dbConnection.php";
include_once "../inc/sessionsetting.class.php";

$sessionobj	=	sessionsetting::getInstance();
$con=DBConnection::getDbConn();
$request=json_decode(file_get_contents("php://input"),true);
$month=$request["month"];
$year=$request["year"];
$sql="select * from sale";
$result=$con->query($sql);
$count=0;
$list=array();
while($row=$result->fetch_assoc()){
	$date=$row["solddate"];
	$dateArr=explode('-',$date);
	if($dateArr[1]==$month&&$dateArr[0]==$year){
		$list[]=array('sno' => $row["sno"],'sitemcode' => $row["sitemcode"], 'sitemname' => 	$row["sitemname"],'sitemprice'=>$row["sitemprice"],'sitemsold'=>$row["sitemsold"],'solddate'=>$row["solddate"],'edit'=>false);
	}
	

}
	echo json_encode($list);
?>

