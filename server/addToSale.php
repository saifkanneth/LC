<?php 
include_once "dbConnection.php";
include_once "../inc/sessionsetting.class.php";

$sessionobj	=	sessionsetting::getInstance();
$con=DBConnection::getDbConn();
$request=json_decode(file_get_contents("php://input"),true);
$sno=$request["sno"];
$sitemcode=$request["itemcode"];
$sitemname=$request["itemname"];
$sitemprice=$request["itemprice"];
$sitemsold=$request["itemsold"];
$solddate=$request["solddate"];
if($sno==0)
$sql="insert into sale(sitemcode,sitemname,sitemprice,sitemsold,solddate) values('$sitemcode','$sitemname','$sitemprice','$sitemsold','$solddate')";
else
	$sql="update sale set  solddate='$solddate',sitemsold='$sitemsold' where sno='$sno' ";


$result=$con->query($sql);

if($result)
	echo "success";
else
	echo "failure";
?>