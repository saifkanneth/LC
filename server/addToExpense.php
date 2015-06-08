<?php 
include_once "dbConnection.php";
include_once "../inc/sessionsetting.class.php";

$sessionobj	=	sessionsetting::getInstance();
$con=DBConnection::getDbConn();
$request=json_decode(file_get_contents("php://input"),true);
$code=$request["ecode"];
$date=$request["edate"];
$name=$request["ename"];
$amount=$request["eamount"];
$setalready=$request["setAlready"];
  
if($setalready){
 $sql="update expense set expname='$name',expprice='$amount' where expid='$code'";   
}else{
  
 $sql="insert into expense(expname,expprice,expdate) values('$name','$amount','$date')" ;  
}
$result=$con->query($sql);

echo "success";
?>