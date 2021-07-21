<?php
ob_start() ;
include("include/conn.php");
include("include/find_parent.php");
include("include/function.php");
$sel_sp1 = "select * from `company_address`" ;
$res_sp1 = mysqli_query($con,$sel_sp1) ;
$row_sp1 = mysqli_fetch_array($res_sp1);
ini_set('max_execution_time',300000);
date_default_timezone_set ('Asia/Calcutta');

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


if($_POST[rank_dtls]!=1){
$sql13="SELECT * FROM `sales_agent` WHERE `agent_code`='$_POST[sponsorid]'";
$res13=mysqli_query($con,$sql13);
$num13=mysqli_num_rows($res13);
$zrow3=mysqli_fetch_array($res13);
$sales_rank_id=($zrow3[sales_rank_id]+1);
}else{
$num13=$_POST[rank_dtls];
$sales_rank_id=$_POST[rank_dtls];
}

if($num13>0){

if($zrow3[sales_rank_id]<4)
{




$sel_mem = "select * from `sales_agent`" ;
$num_rows = mysqli_num_rows(mysqli_query($con,$sel_mem));
$count=$num_rows+1;
$count_1=$num_rows;
$str1="PUIS" ;
$ct=strlen($count);
$rest=4-$ct;
for($i=1;$i<=$rest;$i++)
{
$zero=$zero."0";
}
$spid=$str1.$zero.$count;
$sponsorid=strtoupper($_POST[sponsorid]);


$chk_mem = "select `agent_id` from `sales_agent` where `spid`='$spid'" ;// die() ;
$num_chk_mem = @mysqli_num_rows(mysqli_query($con,$chk_mem)) ;
//print $num_chk_mem ; die() ;
if($num_chk_mem == 0){
$time = time() ;
$pass=password(8);
$password1=password(8);
$password2=password(8);


$doj=$date;



$ins_mem = "INSERT INTO `sales_agent` (`agent_code`,`sname`, `pass`,`sponsorid`,`doj`,`time`,`mob`, `email`, `sex`, `addr`, `country`, `state`, `pincode`,`pan`,`nominee_name`,`nominee_rel`,`bank`, `branch`, `acc_no`, `ifsc_code`,`trans_password`,`epin_password`,`fname`,`dob`,`city`,`paytm`,`acc_type`,`aadhar`,`admin_join`,`member_status`,`sales_rank_id`) VALUES ('$spid','$_POST[assoc_name]', '$pass','$sponsorid','$doj', '$time','$_POST[mob_no]', '$_POST[email]', '$_POST[sex]', '$_POST[address]', '$_POST[country]', '$_POST[state]','$_POST[zip]','$_POST[pan]','$_POST[nominee_name]','$_POST[nominee_rel]','$_POST[bank]', '$_POST[branch]', '$_POST[accno]', '$_POST[ifsc]','$password1','$password2','$_POST[fname]','$_POST[dob]','$_POST[city]','$_POST[paytm]','$_POST[acc_type]','$_POST[aadhar]','1','1','$sales_rank_id')" ; //die() ;
$res_mem = mysqli_query($con,$ins_mem) ;
if(!$res_mem){
header("location:joining.php?msg=operation not successful") ;
exit();
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if($sales_rank_id==1){

$sel_lev = "select * from `sales_agent` where `agent_code`='$spid'";
$res_lev = mysqli_query($con,$sel_lev) ;
$row_lev = mysqli_fetch_array($res_lev) ;
$agent_level=1;
$agent_bianry=$row_lev[agent_id];
$ins_bin_lev = "UPDATE `sales_agent` SET `agent_level`='$agent_level',`agent_bianry`='$agent_bianry' where `agent_id`='$row_lev[agent_id]'";
$res_bin_lev = mysqli_query($con,$ins_bin_lev)  ;

}
else{

$sel_lev1 = "select * from `sales_agent` where `agent_code`='$sponsorid'";
$res_lev1 = mysqli_query($con,$sel_lev1) ;
$row_lev1 = mysqli_fetch_array($res_lev1) ;

$sel_lev = "select * from `sales_agent` where `agent_code`='$spid'";
$res_lev = mysqli_query($con,$sel_lev) ;
$row_lev = mysqli_fetch_array($res_lev) ;
$agent_level = $row_lev1[agent_level]+1;
$agent_bianry = $row_lev1[agent_bianry].$row_lev[agent_id];

$ins_bin_lev = "UPDATE `sales_agent` SET `agent_level`='$agent_level',`agent_bianry`='$agent_bianry' where `agent_id`='$row_lev[agent_id]'";
$res_bin_lev = mysqli_query($con,$ins_bin_lev)  ;

}



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
<td bgcolor='#72c0fc'>
<span style='color:#ffffff;font-size:14px;'>
E-Pin Password $password2
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
$headers .= 'From: $row_sp1[com_name] <$row_sp1[email]>' . "\r\n";

$to="$_POST[email]";
$subject="$_POST[assoc_name] Password Details";
//mail($to,$subject,$newmg,$headers);



//////////////////////////////////////////////////////////////////////////////////


$message="Dear ".$_POST[assoc_name].", Welcome you to ".$row_sp1[com_name].". Your login ID: ".$spid." Pwd: ".$pass." ,Epin Pass: ".$password2.",Transaction Pass: ".$password1." respectively.";
//SMS_Sender($_POST[mob_no],$message);


header("location:agent_join.php?msg=Joining is successful") ;

}
else{
header("location:agent_join.php?msg=operation not successful") ;
}



}else{
header("location:agent_join.php?msg=This ID is not valid for Joining.") ;
}



}else{
header("location:agent_join.php?msg=Sponsor Id is not valid.") ;
}
?>

