<?php 

include_once "dbConnection.php";
include_once "../inc/sessionsetting.class.php";

$sessionobj	=	sessionsetting::getInstance();
$con=DBConnection::getDbConn();
$sql="select * from stock";
$list =array();
$result=$con->query($sql);
while($row=$result->fetch_assoc()){
    $list[] = array('itemcode' => $row["itemcode"], 'itemname' => $row["itemname"],'itemprice'=>$row["itemprice"],'edit'=>false);
}
echo json_encode($list);

?>