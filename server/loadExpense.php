<?php 

include_once "dbConnection.php";
include_once "../inc/sessionsetting.class.php";

$sessionobj	=	sessionsetting::getInstance();
$con=DBConnection::getDbConn();
$request=json_decode(file_get_contents("php://input"),true);
$month=$request["month"];
$year=$request["year"];
$sql="select * from expense";
$result=$con->query($sql);
$list=array();
while($row=$result->fetch_assoc()){		
$date= $row["expdate"];
$dateArr=explode('-',$date); 
 $list[]=array('expid'=>$row["expid"],'expname'=>$row["expname"],'expprice'=>$row["expprice"],'expdate'=>(int)$dateArr[2],'expmonth'=>(int)$dateArr[1],'expyear'=>(int)$dateArr[0]);
}

echo json_encode($list);
?>