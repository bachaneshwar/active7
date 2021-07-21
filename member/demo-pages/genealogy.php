<?
include("../../ctrl_panel/lib_panel/config.php");
$id=$_GET[spid];
$sql="SELECT * FROM `member` WHERE `spid`='$id'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);
$sql1="SELECT * FROM `member` WHERE `spid`='$row[sponsorid]'";
$res1=mysqli_query($con,$sql1);
$row1=mysqli_fetch_array($res1);

$sel_bin_id = "select `binary` from `binary_level` where `spid`='$id'" ;
$res_bin_id = mysqli_query($con,$sel_bin_id) ;
$row_bin_id = mysqli_fetch_array($res_bin_id) ;
$left_pt = $row_bin_id[0]."L" ;

$sel_left_calc = "select * from `binary_level` where `binary` LIKE '$left_pt%'" ;
$res_left_calc = mysqli_query($con,$sel_left_calc) ;
$num_left_calc = mysqli_num_rows($res_left_calc) ;
$leftno = $num_left_calc ;


$right_pt = $row_bin_id[0]."R" ;
$sel_right_calc = "select * from `binary_level` where `binary` LIKE '$right_pt%'" ;
$res_right_calc = mysqli_query($con,$sel_right_calc) ;
$num_right_calc = mysqli_num_rows($res_right_calc);
$rightno = $num_right_calc ;


$strong_pt = $row_bin_id[0]."M" ;
$sel_strong_calc = "select * from `binary_level` where `binary` LIKE '$strong_pt%'" ;
$res_strong_calc = mysqli_query($con,$sel_strong_calc) ;
$num_strong_calc = mysqli_num_rows($res_strong_calc);
$strongno = $num_strong_calc ;


$msgsql="SELECT * FROM `member_topup` WHERE `spid`='$id'";
$msgres=mysqli_query($con,$msgsql);
$msgrow=mysqli_fetch_array($msgres);
$sre="SELECT * FROM `package` WHERE `package_id`='$msgrow[package_id]'";
$ret=mysqli_query($con,$sre);
$des=mysqli_fetch_array($ret);	
?>
<table  style="border-collapse:collapse; margin:2px;" border="1"  cellpadding="0" cellspacing="0" width="200">
<tbody>
<tr>
<td colspan="2" bgcolor="#E3E8EC" height="25" align="center" style="border:1px solid white">
<p><strong><b>DOJ :</b> </strong>
<strong><b><?=$row[doj]?></b></strong></p></td></tr>
<tr>
<td bgcolor="#E3E8EC" style="border:1px solid white"><b>Sponsor</b></td>
<td  bgcolor="#E3E8EC" style="border:1px solid white"><b><?=$row[sponsorid]?></b></td>
</tr>


<tr>
<td bgcolor="#E3E8EC" style="border:1px solid white"><b>Left ID</b></td>
<td  bgcolor="#E3E8EC" style="border:1px solid white"><b><?=$leftno?></b></td>
</tr>
<tr>
<td bgcolor="#E3E8EC" style="border:1px solid white"><b>Middle ID</b></td>
<td  bgcolor="#E3E8EC" style="border:1px solid white"><b><?=$strongno?></b></td>
</tr>
<tr>
<td bgcolor="#E3E8EC" style="border:1px solid white"><b>Right ID</b></td>
<td  bgcolor="#E3E8EC" style="border:1px solid white"><b><?=$rightno?></b></td>
</tr>



</tbody>
</table>