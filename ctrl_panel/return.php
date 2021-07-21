<?php
ob_start() ;
include_once("ctrl_panel/lib_panel/config.php");
include_once("ctrl_panel/include/trinary_function_team.php");

$sel_sp1 = "select * from `company_address`" ;
$res_sp1 = mysqli_query($con,$sel_sp1) ;
$row_sp1 = mysqli_fetch_array($res_sp1);
ini_set('max_execution_time',300000);

$date=date("Y-m-d");
$date1=date("g:i:s a");
$time=time();
  function password($a)
  {
  $characters = array(
	"A","B","C","D","E","F","G","H","J","K","L","M",
	"N","P","Q","R","S","T","U","V","W","X","Y","Z",
	"1","2","3","4","5","6","7","8","9");
	$keys = array();
	while(count($keys) < $a) {
    $x = mt_rand(0, count($characters)-1);
    if(!in_array($x, $keys)) {
       $keys[] = $x;
    }
	}
	foreach($keys as $key){
	  $random_chars .= $characters[$key];
	}
	return $random_chars;
	 }


 function randno($a)
{
$characters = array("0","1","2","3","4","5","6","7","8","9");
$keys = array();
while(count($keys) < $a) {
$x = mt_rand(0, count($characters)-1);
if(!in_array($x, $keys)) {
$keys[] = $x;
}
}
foreach($keys as $key){
$random_chars .= $characters[$key];
}
return $random_chars;
}

?>
<?php

$sql13="SELECT * FROM `member` WHERE `spid`='$_POST[sponsorid]'";
$res13=mysqli_query($con,$sql13);
$num13=mysqli_num_rows($res13);
$zrow3=mysqli_fetch_array($res13);

$psql1="SELECT * FROM `member` WHERE `pan`='$_POST[pan]'";
$pres1=mysqli_query($con,$psql1);
$pnum1=mysqli_num_rows($pres1);

$psql2="SELECT * FROM `member` WHERE `mob`='$_POST[mob_no]'";
$pres2=mysqli_query($con,$psql2);
$pnum2=mysqli_num_rows($pres2);

if($num13>0){

$sel_mem = "select * from `member`" ;
$num_rows = mysqli_num_rows(mysqli_query($con,$sel_mem));
$count=$num_rows+1;
$count_1=$num_rows;
$str1="ACT" ;
$ct=strlen($count);
$rest=6-$ct;
for($i=1;$i<=$rest;$i++)
{
$zero=$zero."0";
}
//$spid=$str1.$zero.$count;
$randid=randno(6)+$count;
$fn_num=strlen($randid);
if($fn_num<6){
$randid=$randid.$count;
}

$spid=$str1.$randid;

$sponsorid=strtoupper($_POST[sponsorid]);

// ///////////////////INVOICE ////
$sel_mem = "select * from `member`" ;
$num_rows = mysqli_num_rows(mysqli_query($con,$sel_mem));
$count=$num_rows+1;
$count_1=$num_rows;
$str1="INV/" ;
$ct=strlen($count);
$rest=7-$ct;
for($i=2;$i<=$rest;$i++)
{
$zero=$zero."0";
}
//$spid=$str1.$zero.$count;
$randid=randno(6)+$count;
$fn_num=strlen($randid);
if($fn_num<6){
$randid=$randid.$count;
}

$invoice_vch_no=$str1.$count;

$time = time() ;
$pass=$_POST[pass];
$password1=password(6);
$password2=password(6);


$doj=$date;
$jtime = date('Y-m-d H:i:s');

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$dsql13="SELECT * FROM `member` WHERE `parentspid`='$sponsorid' AND `leg`='L'";
$dres13=mysqli_query($con,$dsql13);
$dnum13=mysqli_num_rows($dres13);
if($dnum13==0){
$parentspid=strtoupper($_POST[sponsorid]);
$leg="L";
$vnum=0;
}else{
$dsql14="SELECT * FROM `member` WHERE `parentspid`='$sponsorid' AND `leg`='M'";
$dres14=mysqli_query($con,$dsql14);
$dnum14=mysqli_num_rows($dres14);
if($dnum14==0){
$parentspid=strtoupper($_POST[sponsorid]);
$leg="M";
$vnum=0;
}else{
$dsql15="SELECT * FROM `member` WHERE `parentspid`='$sponsorid' AND `leg`='R'";
$dres15=mysqli_query($con,$dsql15);
$dnum15=mysqli_num_rows($dres15);
if($dnum15==0){
$parentspid=strtoupper($_POST[sponsorid]);
$leg="R";
$vnum=0;
}else{
$vnum=1;
}
}
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////

// $ins_wallet = "INSERT INTO `ewallet` (`id`, `spid`, `total_amt`, `rest_amt`, `time`) VALUES (NULL, '$spid', '0', '0', '$time')" ;
// $res_wallet = mysqli_query($con,$ins_wallet) ;
// if(!$res_wallet){
// header("location:joining.php?msg=operation not successful") ;
// exit();
// }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////

$sel_parent_bin_lev = "select * from `binary_level` where `spid`='$parentspid'";
$res_parent_bin_lev = mysqli_query($con,$sel_parent_bin_lev) ;
if(!$res_parent_bin_lev){die('binary level interrupted');}
$row_parent_bin_lev = mysqli_fetch_array($res_parent_bin_lev) ;
$child_level = $row_parent_bin_lev['level']+1  ;
$binary=$row_parent_bin_lev['binary'].$leg;



//////////////////////////////////////////////////////////////////////////////////////////////////////////////


if($vnum==0){

$ins_mem = "INSERT INTO `member` (`spid`,`sname`, `pass`,`sponsorid`,`parentspid`, `leg`, `doj`,`time`,`mob`, `email`, `sex`, `addr`, `country`, `state`,`dist`, `pincode`,`pan`,`active_pass_id`,`nominee_rel`,`bank_id`, `branch`, `acc_no`, `ifsc_code`,`trans_password`,`epin_password`,`fname`,`dob`,`city`,`invoice_vch_no`,`acc_type`,`aadhar`,`admin_join`,`member_status`,`package_id`,`update_dt`,`userid`,`account_name`,`district_id`,`join_time`,`level`,`binary`,`payment_type`,`payment_number`,`amount`) VALUES ('$spid','$_POST[assoc_name]', '$pass','$sponsorid','$parentspid', '$leg', '$doj', '$time','$_POST[mob_no]', '$_POST[email]', '$_POST[sex]', '$_POST[address]', '$_POST[country]', '$_POST[state]','$_POST[dist]','$_POST[zip]','$_POST[pan]','$_POST[active_pass_id]','$_POST[nominee_rel]','$_POST[bank_id]', '$_POST[branch]', '$_POST[accno]', '$_POST[ifsc]','$password1','$password2','$_POST[fname]','$_POST[dob]','$_POST[city]','$invoice_vch_no','$_POST[acc_type]','$_POST[aadhar]','','1','1','1','1','$_POST[assoc_name]','$_POST[district_id]','$jtime','$child_level','$binary','razorpay','$_POST[payment_number]','$_POST[amount]')" ; //die() ;
$res_mem = mysqli_query($con,$ins_mem) ;

$ins_bin_lev = "INSERT INTO `binary_level` (`id`, `spid`,`level`,`binary`) VALUES (NULL, '$spid','$child_level','$binary')";
$res_bin_lev = mysqli_query($con,$ins_bin_lev)  ;
if(!$res_bin_lev){die('binary level select interrupted');}


}


if($vnum==1){

tree_create($con,$spid,member,memid,$doj,$jtime,$sponsorid);

$ins_mem="UPDATE `member` SET `sname`='$_POST[assoc_name]',`pass`='$pass',`sponsorid`='$sponsorid',`time`='$time',`mob`='$_POST[mob_no]',`email`='$_POST[email]',`sex`='$_POST[sex]',`addr`='$_POST[address]',`country`='$_POST[country]',`state`='$_POST[state]',`pincode`='$_POST[zip]',`pan`='$_POST[pan]',`active_pass_id`='$_POST[active_pass_id]',`nominee_rel`='$_POST[nominee_rel]',`bank_id`='$_POST[bank_id]',`branch`='$_POST[branch]',`acc_no`='$_POST[accno]', `ifsc_code`='$_POST[ifsc]',`trans_password`='$password1',`epin_password`='$password2',`fname`='$_POST[fname]',`dob`='$_POST[dob]',`city`='$_POST[city]',`invoice_vch_no`='$invoice_vch_no',`acc_type`='$_POST[acc_type]',`aadhar`='$_POST[aadhar]',`admin_join`='0',`package_id`='0',`district_id`='$_POST[district_id]' ,`account_name`='$_POST[assoc_name]',`payment_type`='$_POST[payment_type]',`payment_number`='$_POST[payment_number]',`amount`='$_POST[amount]' WHERE `spid`='$spid'";
$res_mem = mysqli_query($con,$ins_mem) ;


$sel_parent_bin_lev = "select * from `member` where `spid`='$spid'";
$res_parent_bin_lev = mysqli_query($con,$sel_parent_bin_lev) ;
if(!$res_parent_bin_lev){die('binary level interrupted');}
$row_parent_bin_lev = mysqli_fetch_array($res_parent_bin_lev) ;

$child_level = $row_parent_bin_lev['level']  ;
$binary = $row_parent_bin_lev['binary'];

$ins_bin_lev = "INSERT INTO `binary_level` (`id`, `spid`,`level`,`binary`) VALUES (NULL, '$spid','$child_level','$binary')";
$res_bin_lev = mysqli_query($con,$ins_bin_lev)  ;
if(!$res_bin_lev){die('binary level select interrupted');}

}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


$chk_mem1 = "select `memid` from `member` where `sponsorid`='$sponsorid'" ;// die() ;
$num_chk1 = mysqli_num_rows(mysqli_query($con,$chk_mem1)) ;
$leg = "LEG".$num_chk1;

$sel_parent_bin_lev1 = "select * from `binary_level` where `spid`='$sponsorid'";
$res_parent_bin_lev1 = mysqli_query($con,$sel_parent_bin_lev1) ;
$row_parent_bin_lev1 = mysqli_fetch_array($res_parent_bin_lev1);
$lev_pos = $row_parent_bin_lev1['level_level']+1;

$level_binary=$row_parent_bin_lev1['level_binary'].$leg;
$ins_bin_lev1="UPDATE `binary_level` SET `level_binary`='$level_binary',`level_level`='$lev_pos' WHERE `spid`='$spid'";
$res_bin_lev1=mysqli_query($con,$ins_bin_lev1);

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


// $insert_pair1="INSERT INTO `memberpair`(`spid`,`pair`)VALUES('$spid','0')";
// $res_pair1=mysqli_query($con,$insert_pair1);


//////////////////////////////////////////////////////////////////////////////////


$newmg="<table bgcolor='#72c0fc' width='800'>
<tr>
<td bgcolor='#72c0fc'>
<center><span style='color:#ffffff;font-weight:bold;font-size:16px'>$row_sp1[com_name]</span></center>
</td>
</tr>
<tr>
<td bgcolor='#ffffff'>
<span style='color:#72c0fc'>
<center><h1>THANK YOU FOR REGISTERING WITH US</h1></center>
</span>
</td>
</tr>
<tr>
<td bgcolor='#72c0fc'><br/><br/></td>
</tr>
<tr>
<td bgcolor='#72c0fc'>
<span style='color:#ffffff;font-size:14px;font-weight:bold'>
Dear $_POST[assoc_name]
</span>
</td>
</tr>
<tr>
<td bgcolor='#72c0fc'>
<span style='color:#ffffff;font-size:14px;'>
Your activation process has been successful.
</span>
</td>
</tr>
<tr>
<td bgcolor='#72c0fc'>
<span style='color:#ffffff;font-size:14px;'>
The ID $spid is now set with password </span><span style='color:red'>$pass</span> <span style='color:#ffffff;font-size:14px;'>and is ready for use.
</span>
</td>
</tr>
<tr>
<td bgcolor='#72c0fc'>
<span style='color:#ffffff;font-size:14px;'>
Transaction Password $password1
</span>
</td>
</tr>

<tr>
<td bgcolor='#72c0fc'><br/><br/></td>
</tr>
</table>
";

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'To: '.$_POST[assoc_name].' <'.$to.'>' . "\r\n";
$headers .= 'From: '.$row_sp1[com_name].' <'.$row_sp1[email].'>' . "\r\n";

$to="$_POST[email]";
$subject="$_POST[assoc_name] Password Details";
mail($to,$subject,$newmg,$headers);



//////////////////////////////////////////////////////////////////////////////////


$message="Welcome to ".$row_sp1[com_name].". Login ID: ".$spid." Pwd: ".$pass.", TNS Pwd: ".$password1." respectively.";
SMS_Sender($_POST[mob_no],$message);

unset($_SESSION['digit']);
header("location:welcome_letter.php?spid=$spid") ;



}else{
header("location:register.php?msg=Sponsor Id is not valid.") ;
}



?>
