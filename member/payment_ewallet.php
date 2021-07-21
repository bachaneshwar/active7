<?
session_start();
ob_start();
error_reporting(0);
include("../ctrl_panel/include/conn.php");

$pay_date=date("Y-m-d");
$create_date=date("Y-m-d H:i:s");
ob_start();

$vsql = "select * from `amout_rate`" ;
$vres = mysqli_query($con,$vsql) ;
$vrow = mysqli_fetch_array($vres);

$sql="SELECT * FROM `member` WHERE `spid`='$_SESSION[spid]'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);
$pass=$row[trans_password];


?>
<!-- CONTENT START -->



<?

if($_POST[pass]==$pass){
if($_POST[PAYMENT_AMOUNT]>0 && $_POST[PAYMENT_AMOUNT]!=""){	  

$sqln1="SELECT * FROM `member` WHERE `spid`='$_POST[spid]'";
$resn1=mysqli_query($con,$sqln1);
$rown1=mysqli_fetch_array($resn1);
$sponsor_mem=$rown1[sponsorid];

$sql6="SELECT * FROM `ewallet` WHERE `spid`='$_SESSION[spid]'";
$res6=mysqli_query($con,$sql6);
$row6=mysqli_fetch_array($res6);

$PAYMENT_BATCH_NUM=time().$row6[id];


$sql2="INSERT INTO `transaction_details`(`package_id`,`PAYMENT_BATCH_NUM`,`spid`,`p_date`,`pay_date`,`pay_mode`,`partner`,`plan`,`panel_st`,`payamt`)VALUES('$_POST[package_id]','$PAYMENT_BATCH_NUM','$_POST[spid]','$pay_date','$create_date','E-WALLET','$_SESSION[spid]','$_POST[PAYMENT_ID]','$rown1[panel_st]','$_POST[PAYMENT_AMOUNT]')";
$res2=mysqli_query($con,$sql2);

$sql3="SELECT * FROM `member` WHERE `spid`='$_POST[spid]' AND `member_status`='1'";
$res3=mysqli_query($con,$sql3);
$num3=mysqli_num_rows($res3);
if($num3==0){
$sql4="UPDATE `member` SET `member_status`='1',`update_dt`='$pay_date' WHERE `spid`='$_POST[spid]'";
$res4=mysqli_query($con,$sql4);
}


$update_ewallet2=$row6[rest_amt]-$_POST[PAYMENT_AMOUNT];
$update_ewallet=$row6[invest_amt]+$_POST[PAYMENT_AMOUNT];

$sql7="UPDATE `ewallet` SET `invest_amt`='$update_ewallet',`rest_amt`='$update_ewallet2' WHERE `spid`='$_SESSION[spid]'";
$res7=mysqli_query($con,$sql7);



$sqlm_1="SELECT * FROM `amout_rate`";
$reslm_1=mysqli_query($con,$sqlm_1);
$rowlm_1=mysqli_fetch_array($reslm_1);
$direct=$rowlm_1[direct];

$direct_commisssion=($_POST[PAYMENT_AMOUNT]*$direct)/100;


$sqlb1="SELECT * FROM `member` WHERE `spid`='$rown1[sponsorid]'";
$rqlb1=mysqli_query($con,$sqlb1);
$rowbl=mysqli_fetch_array($rqlb1);

if($rowbl[member_status]==1){

$zsql="SELECT * FROM `ewallet` WHERE `spid`='$rowbl[spid]'";
$zres=mysqli_query($con,$zsql);
$zrow=mysqli_fetch_array($zres);
$direct_amt=$zrow[direct_amt]+$direct_commisssion;
$total_amt=$zrow[total_amt]+$direct_commisssion;
$rest_amt=$zrow[rest_amt]+$direct_commisssion;

$sql_ins="INSERT INTO `direct_income`(`spid`,`amount`,`help_id`,`paydt`)VALUES('$rowbl[spid]','$direct_commisssion','$_POST[spid]','$pay_date')";
$res_ins=mysqli_query($con,$sql_ins);	


$sql7="UPDATE `ewallet` SET `rest_amt`='$rest_amt',`total_amt`='$total_amt',`direct_amt`='$direct_amt' WHERE `spid`='$rowbl[spid]'";
$res7=mysqli_query($con,$sql7);

}






header("location:invest_now.php?m=4&msg=Sucessfully Done");


}else{



header("location:invest_now.php?m=4");



}

}
else{
$msg1="Please Type Correct Transaction Password";

if($_POST[e_inv]==0){
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=invest_now.php?m=4&msg1='.$msg1.'">';



}

}
?>


