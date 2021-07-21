<?php
include_once("include/conn.php");
error_reporting(0);

$book_num=1;
$current_num=1;
//$ptdt=date("Y-m-d");
$ptdt="2018-10-01";


$brow=$my->total_row($con,plot_booking,plot_bkId,$_REQUEST[plot_bkId]);

$sel_sp11 = "select * from `emi_payment` WHERE `plot_bkId`='$brow[plot_bkId]' AND `status`='1' ORDER BY `emi_payId` DESC LIMIT 1";
$res_sp11 = mysqli_query($con,$sel_sp11) ;
$row_sp11 = mysqli_fetch_array($res_sp11);


$date_diff_1=strtotime($ptdt)-strtotime($row_sp11[payment_dt]);
$date_diff=$date_diff_1/(24*60*60)+1 ;

$sql="SELECT * FROM `plot` WHERE `plot_id`='$brow[plot_id]'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);

$emi_num=$my->second_num($con,emi_payment,plot_bkId,$_REQUEST[plot_bkId],status,1);
$total_emi=($emi_num+$book_num+$current_num);
$emi_no=($total_emi%6);

if($emi_no==0){
print $row[halfyearly_emi];
}else{
print $row[monthly_emi];
}
?>