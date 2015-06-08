<?php 
include_once "dbConnection.php";
include_once "../inc/sessionsetting.class.php";

$sessionobj	=	sessionsetting::getInstance();
$con=DBConnection::getDbConn();
$request=json_decode(file_get_contents("php://input"),true);
$month=$request['month'];
$year=$request['year'];
$sql='select * from sale';

$result=$con->query($sql);
$list1=array();
$list2=array();
$list3=array();
for($i=1;$i<=31;$i++){
 $list1[$i]=0; 
 $list2[$i]=0; 
 $list3[$i]=0; 
}
while($row=$result->fetch_assoc()){
    $date=$row['solddate'];
    $dateArr=explode('-',$date);
    if((int)$dateArr[0]==(int)$year&&(int)$dateArr[1]==(int)$month){
        $list1[(int)$dateArr[2]]=$list1[(int)$dateArr[2]]+(int)$row['sitemsold'];
        $list2[(int)$dateArr[2]]=$list2[(int)$dateArr[2]]+((int)$row['sitemsold']-(int)$row['sitemprice']);
         
    }
}
$sql='select * from expense';
$result=$con->query($sql);
while($row=$result->fetch_assoc()){
    $date=$row['expdate'];
    $dateArr=explode('-',$date);
    if((int)$dateArr[0]==(int)$year&&(int)$dateArr[1]==(int)$month){
        $list3[(int)$dateArr[2]]=$list1[(int)$dateArr[2]]+(int)$row['expprice'];
         
    }
}
$obj=array("sale"=>array_values($list1),"profit"=>array_values($list2),"expense"=>array_values($list3));
echo json_encode($obj);
?>