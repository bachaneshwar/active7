<!DOCTYPE html>
<html lang="en">

<?php
include_once("include/header_top.php");
?>
<body class="hold-transition sidebar-mini" oncontextmenu="return false">
<!--preloader-->
<div id="preloader">
<div id="status"></div>
</div>
<!-- Site wrapper -->
<div class="wrapper">
<?php
include_once("include/header_down.php");





?>
<!-- =============================================== -->
<!-- Left side column. contains the sidebar -->
<?php
include_once("include/menu.php");
?>

<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->

<section class="content-header">
<div class="header-icon"><i class="fa fa-users"></i></div>
<div class="header-title">
<h1>Distributor</h1>
<small>Pending KYC</small>
</div>
</section>

<!-- Main content -->
<section class="content">




<?php
if($_GET[pg])
{
$pg=$_GET[pg];
}
else
{
$pg=1;
}
$upper=100;
$lower=$upper*($pg-1);
if($_POST[spid]){
$sql="select * from `member` WHERE `kyc_updt`='1' AND `spid`='$_POST[spid]' AND `kyc_status`='0' ";
}else{
$sql="select * from `member` WHERE `kyc_updt`='1' AND `kyc_status`='0' ";

}


$res=mysqli_query($con,$sql);
$num=mysqli_num_rows($res);
$pgno=intval($num/$upper);
if($num%$upper!=0)
{
$pgno=$pgno+1;
}


if($_GET[pg]==""){
$c=0;
}
else{
$c=($_GET[pg]-1)*$upper;
}

?>


<div class="row">
<div class="col-sm-12">
<div class="panel panel-bd lobidrag">
<div style="padding:10px;color: #010611;background-color: #e8f1f3;border-color: #b7b9bf;position: relative;">
<div class="btn-group" id="buttonlist">

<i class="fa fa-list"></i> Pending KYC Details
</div>
</div>






<div class="panel-body">



<form action="" method="post" name="newform" onsubmit="return validate_form(this);" >
<table style="width:100%">


<tr>
<td>Distributor ID</td>
<td><input type="text" class="form-control" name="spid" style="width:200px" required /></td>

</tr>
<tr ><td colspan="2"><br/></td></tr>

</table>




<div class="form-group">

<input type="hidden" name="st" value="1" />

<input type="submit" name="call_submit" class="btn btn-success"  value="Submit" />
<input type="reset" name="reset"  class="btn btn-warning" value="Exit" />
</div>




</form>


<?php
// $msg=$_REQUEST[msg];
echo "<center><font color=\"#ff0066\" size=\"5\">".$msg."</font></center>";

?>

</div>

<div class="panel-body">

<?
if($_GET[kid]!=""){
$decode_id=$_GET[kid];
$value_det=$my->total_row($con,member,spid,$decode_id);
if($value_det[kyc_status]==1){
$my->normal_UPDATE1($con,member,kyc_status,0,spid,$decode_id);
}else{
// echo "hhh";
$my->normal_UPDATE1($con,member,kyc_status,1,spid,$decode_id);
}
$nurl="$log_url?pg=$_GET[pg]&lid=$dtls_link[sublink_id]";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$nurl.'">';
}


?>

<div class="table-responsive">
<table id="dataTableExample1" class="table table-bordered table-striped table-hover">
<thead>
<tr class="info">

<th>Sr</th>
<th scope="col" class="rounded">Id</th>
<th scope="col" class="rounded">Name</th>
<th scope="col" class="rounded">Aadhaar</th>
<th scope="col" class="rounded">Aadhaar Status</th>
<th scope="col" class="rounded">PAN</th>
<th scope="col" class="rounded">Pan Status</th>
<!-- <th scope="col" class="rounded">Bank</th> -->
<!-- <th scope="col" class="rounded">Bank Status</th> -->

</tr>
</thead>
<tbody>

<?php
if($_POST[spid]){
$msgsql="select * from `member` WHERE `kyc_updt`='1' AND `kyc_status`='0'  AND `spid`='$_POST[spid]'  ORDER BY `memid` ASC limit $lower,$upper";
}else{
$msgsql="select * from `member` WHERE `kyc_updt`='1' AND `kyc_status`='0'  ORDER BY `memid` ASC limit $lower,$upper";
}
$msgres=mysqli_query($con,$msgsql);
while($row=mysqli_fetch_array($msgres)){
$c++;


$decode_val=base64_encode($row[memid]);
$decode_time=base64_encode(time());

$srow=$my->total_row($con,bank,bank_id,$row[bank_id]);

////////////////////////////////////////////////////////////
if($row[aadhar_st]==0 && $row[aadhar_updt]==0){
$amsg="<span style='color:red'>Not Updated</span>";
}
if($row[aadhar_st]==1 && $row[aadhar_updt]==0){
$amsg="<span style='color:blue'>Pending</span>";
}
if($row[aadhar_st]==1 && $row[aadhar_updt]==1){
$amsg="<span style='color:green'>Approved</span>";
}
///////////////////////////////////////////////////////////////
if($row[pan_st]==0 && $row[pan_updt]==0){
$pmsg="<span style='color:red'>Not Updated</span>";
}
if($row[pan_st]==1 && $row[pan_updt]==0){
$pmsg="<span style='color:blue'>Pending</span>";
}
if($row[pan_st]==1 && $row[pan_updt]==1){
$pmsg="<span style='color:green'>Approved</span>";
}
///////////////////////////////////////////////////////////////
// if($row[bank_st]==0 && $row[bank_updt]==0){
// $bmsg="<span style='color:red'>Not Updated</span>";
// }
// if($row[bank_st]==1 && $row[bank_updt]==0){
// $bmsg="<span style='color:blue'>Pending</span>";
// }
// if($row[bank_st]==1 && $row[bank_updt]==1){
// $bmsg="<span style='color:green'>Approved</span>";
// }
///////////////////////////////////////////////////////////////

?>

<tr>
<td><?=$c?></td>
<td >



<span style='color:blue;font-weight:bold;font-size:12px'> <?=$row[spid]?> </span>

</td>
<td style='font-size:12px'><?=$row[sname]?></td>


<td style='font-size:12px'>
<?
if($row[aadhar_st]==1){
?>
<a href="document_details.php?spid=<?=$row[spid]?>&<?=$decode_time?>&pg=<?=$_GET[pg]?>&sub=1&lid=<?=$_REQUEST[lid]?>&mid=1" type="button" class="btn btn-add btn-sm" >See Details</a>
<? } ?>
</td>

<td style='font-size:12px'><?=$amsg?></td>

<td style='font-size:12px'>
<?
if($row[pan_st]==1){
?>
<a href="document_details.php?spid=<?=$row[spid]?>&<?=$decode_time?>&pg=<?=$_GET[pg]?>&sub=1&lid=<?=$_REQUEST[lid]?>&mid=2" type="button" class="btn btn-add btn-sm" >See Details</a>
<? } ?>
</td>


<td style='font-size:12px'><?=$pmsg?></td>


<!-- <td style='font-size:12px'>
<?
if($row[bank_st]==1){
?>
<a href="document_details.php?spid=<?=$row[spid]?>&<?=$decode_time?>&pg=<?=$_GET[pg]?>&sub=1&lid=<?=$_REQUEST[lid]?>&mid=3" type="button" class="btn btn-add btn-sm" >See Details</a>
<? } ?>
</td> -->

<!-- <td style='font-size:12px'><?=$bmsg?></td> -->





</tr>

<? } ?>

</tbody>
</table>
</div>

<div class="pagination">
<?
$pre=$pg-1;
$nxt=$pg+1;

if($pg!=1)
print "<A HREF='pending_kyc.php?pg=$pre&lid=$dtls_link[sublink_id]'class='previous-off'>&laquo; Previous</A>";
else
print "<span class='previous-off'>&laquo; Previous</span>";



for($i=1;$i<=$pgno;$i++)
{
if($i!=$pg)
print "&nbsp;&nbsp;&nbsp;&nbsp;<A HREF='pending_kyc.php?pg=$i&lid=$dtls_link[sublink_id]'>$i</A>";
else
print "&nbsp;&nbsp;&nbsp;&nbsp;$i";
}

if($pg!=$pgno)
print "&nbsp;&nbsp;&nbsp;&nbsp;<A HREF='pending_kyc.php?pg=$nxt&lid=$dtls_link[sublink_id]'class='next'>Next &raquo;</A>";
else
print "&nbsp;&nbsp;&nbsp;&nbsp;<span class='next'>Next &raquo;</span>";
?>
</div>



</div>
</div>
</div>
</div>



</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include_once("include/footer_top.php");
?>
</div>
<!-- /.wrapper -->
<!-- Start Core Plugins
=====================================================================-->
<?php
include_once("include/footer_down.php");
?>

</body>

</html>
