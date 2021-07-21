<?php
error_reporting(0);
ob_start();
session_start();
ini_set('memory_limit', '15000000000000M');
ini_set('max_execution_time',30000000000000);
date_default_timezone_set("UTC");

include_once("lib_panel/config.php");

$start_dt=date("Y-m-d");



$today_date=date("Y-m-d");

$sq="SELECT * FROM `member` WHERE `doj`<='$today_date' AND `member_status`='1' ORDER BY `memid` ASC";
$rq=mysqli_query($con,$sq);
while($mp3=mysqli_fetch_array($rq))
{
$ro[]=$mp3[spid];
}



foreach($ro as $k=>$v){

unset($left_pt);unset($right_pt);unset($left_no);unset($right_no);unset($pair);unset($cal_package_id);

$sel_bin_id = "select `binary` from `binary_level` where `spid`='$v'" ;
$res_bin_id = mysqli_query($con,$sel_bin_id) ;
$row_bin_id = mysqli_fetch_array($res_bin_id) ;

$left_pt = $row_bin_id[0]."L" ;
$right_pt = $row_bin_id[0]."R" ;



$vsq="SELECT * FROM `member` WHERE `spid`='$v'";
$vrq=mysqli_query($con,$vsq);
$vmp=mysqli_fetch_array($vrq);
$join_dt=$vmp[doj];




$sql_search="SELECT * FROM `reward_generation` WHERE `spid`='$v' AND `id`!='0' ORDER BY `rd_id` DESC LIMIT 1";
$sql_res=mysqli_query($con,$sql_search);
$sql_row=mysqli_fetch_array($sql_res);
$cal_package_id=$sql_row[id]+1;


$sql_search1="SELECT * FROM `rewards` WHERE `reward_id`='$cal_package_id'";
$sql_res1=mysqli_query($con,$sql_search1);
$sql_row1=mysqli_fetch_array($sql_res1);

$sql_search2="SELECT SUM(`pair`) FROM `rewards` WHERE `reward_id`<='$cal_package_id'";
$sql_res2=mysqli_query($con,$sql_search2);
$sql_row2=mysqli_fetch_array($sql_res2);
$actual_pair=$sql_row2[0];


$sel_left_calc="Select SUM(pack.points) from `binary_level` as bin,`member` as mat,`package` as pack,`member_topup` as mtop WHERE bin.spid=mat.spid AND bin.binary LIKE '$left_pt%'  AND mat.member_status='1' AND pack.package_id=mtop.package_id AND mtop.spid=mat.spid";
$res_left_calc = mysqli_query($con,$sel_left_calc) ;
$num_left_calc = mysqli_fetch_array($res_left_calc) ;
$left_no=$num_left_calc[0];


$sel_right_calc="Select SUM(pack.points) from `binary_level` as bin,`member` as mat,`package` as pack,`member_topup` as mtop WHERE bin.spid=mat.spid AND bin.binary LIKE '$right_pt%'  AND mat.member_status='1' AND pack.package_id=mtop.package_id AND mtop.spid=mat.spid";
$res_right_calc = mysqli_query($con,$sel_right_calc) ;
$num_right_calc = mysqli_fetch_array($res_right_calc) ;
$right_no=$num_right_calc[0];

if($left_no==""){$left_no=0;}
if($right_no==""){$right_no=0;}


if($left_no>$right_no){
$pair=$right_no;
}
elseif($left_no<$right_no){
$pair=$left_no;
}
elseif($left_no==$right_no){
$pair=$left_no;
}

if($pair==""){$pair=0;}



if($pair>=$actual_pair){
$reward_id=$cal_package_id;
}else{
$reward_id=0;	
}
if($reward_id==""){$reward_id=0;}

/*
print $left_no;
print "&nbsp;";
print $right_no;
print "&nbsp;";
print $pair;
print "&nbsp;";
print $reward_id;
*/

if($reward_id>0){

if($reward_id<=4){
$days=30;
}else{
$days=90;
}

$date_diff_1=strtotime($today_date)-strtotime($join_dt);
$date_diff=$date_diff_1/(24*60*60)+1 ;

if($date_diff<=$days){
$reward_amount=$sql_row1[reward_amount];
}else{
$reward_amount=($sql_row1[reward_amount]/2);
}

/*
print "&nbsp;";
print $reward_amount;
*/

$sql_f_pair="SELECT * FROM `reward_generation` WHERE `id`='$reward_id' AND `spid`='$v'";
$res_f_pair=mysqli_query($con,$sql_f_pair);
$num_f_pair=mysqli_num_rows($res_f_pair);
if($num_f_pair==0){
$sql="INSERT INTO `reward_generation` (`stdt`,`endt`,`reward_date`,`spid`,`id`,`amount`) VALUES ('$today_date','$today_date','$today_date','$v','$reward_id','$reward_amount')";
$res=mysqli_query($con,$sql);
}

}



unset($left_no);unset($right_no);unset($pair);unset($cal_package_id);unset($reward_id);
unset($date_diff);unset($join_dt);unset($actual_pair);unset($reward_amount);

}






//header("location:home.php");
?>