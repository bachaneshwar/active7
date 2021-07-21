<?
include("../lib_panel/config.php");
$id=$_GET[spid];
$sql="SELECT * FROM `member` WHERE `spid`='$id'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);



$table="matching_tree";

$sql1="SELECT * FROM `$table` WHERE `spid`='$row[spid]'";
$res1=mysqli_query($con,$sql1);
$row1=mysqli_fetch_array($res1);

$sel_bin_id = "select `binary` from `$table` where `spid`='$id'" ;
$res_bin_id = mysqli_query($con,$sel_bin_id) ;
$row_bin_id = mysqli_fetch_array($res_bin_id) ;
$left_pt = $row_bin_id[0]."L" ;
$right_pt = $row_bin_id[0]."R" ;

$sel_left_calc = "select * from `$table` where `binary` LIKE '$left_pt%' AND `member_status`='1'" ;
$res_left_calc = mysqli_query($con,$sel_left_calc) ;
$num_left_calc = mysqli_num_rows($res_left_calc) ;
$leftno = $num_left_calc ;

$sel_right_calc = "select * from `$table` where `binary` LIKE '$right_pt%' AND `member_status`='1'" ;
$res_right_calc = mysqli_query($con,$sel_right_calc) ;
$num_right_calc = mysqli_num_rows($res_right_calc);
$rightno = $num_right_calc ;





?>
<table  style="border-collapse:collapse; margin:2px;" border="1"  cellpadding="0" cellspacing="0" width="200">
<tbody>
<tr>
<td colspan="2" bgcolor="#E3E8EC" height="25" align="center" style="border:1px solid white">
<p><strong><b>DOJ :</b> </strong>
<strong><b><?=$row1[join_day]?></b></strong></p></td></tr>
<!--
<tr>
<td width="113" bgcolor="#E3E8EC" style="border:1px solid white"><b>Member ID </b></td>
<td  bgcolor="#E3E8EC" style="border:1px solid white"><b><?=$id?></b></td>
</tr>
<tr>
<td bgcolor="#E3E8EC" style="border:1px solid white"><b>Name</b></td>
<td  bgcolor="#E3E8EC" style="border:1px solid white"><b><?=$row[sname]?></b></td>
</tr>
-->
<tr>
<td bgcolor="#E3E8EC" style="border:1px solid white"><b>Sponsor</b></td>
<td  bgcolor="#E3E8EC" style="border:1px solid white"><b><?=$row[sponsorid]?></b></td>
</tr>
<!--
<tr>
<td bgcolor="#E3E8EC" style="border:1px solid white"><b>Sponsor Name</b></td>
<td  bgcolor="#E3E8EC" style="border:1px solid white"><b><?=$row1[sname]?></b></td>
</tr>
-->

<tr>
<td bgcolor="#E3E8EC" style="border:1px solid white"><b>Left Green</b></td>
<td  bgcolor="#E3E8EC" style="border:1px solid white"><b><?=$leftno?></b></td>
</tr>
<tr>
<td bgcolor="#E3E8EC" style="border:1px solid white"><b>Right Green</b></td>
<td  bgcolor="#E3E8EC" style="border:1px solid white"><b><?=$rightno?></b></td>
</tr>

<tr>
<td bgcolor="#E3E8EC" style="border:1px solid white"><b>Update Date</b></td>
<td  bgcolor="#E3E8EC" style="border:1px solid white"><b><?=$row1[update_dt]?></b></td>
</tr>



</tbody>
</table>