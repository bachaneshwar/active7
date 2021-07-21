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
<h1>Sales Agent</h1>
<small>All Sales Agent</small>
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
if($_POST[agent_code]){
$sql="select * from `sales_agent` WHERE `st`='0' AND `agent_code`='$_POST[agent_code]'";
}else{
$sql="select * from `sales_agent` WHERE `st`='0'";
	
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

<i class="fa fa-list"></i> All InActive Agent Details 
</div>
</div>






<div class="panel-body">



<form action="" method="post" name="newform" onsubmit="return validate_form(this);" >
<table style="width:100%">


<tr>
<td>Agent ID</td>
<td><input type="text" class="form-control" name="agent_code" style="width:200px" required /></td>

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
$msg=$_REQUEST[msg];
echo "<center><font color=\"#ff0066\" size=\"5\">".$msg."</font></center>";

?>

</div>

<div class="panel-body">

<?
if($_GET[did]!=""){
$decode_id=base64_decode($_GET[did]);
$value_det=$my->total_row($con,sales_agent,agent_id,$decode_id);
if($value_det[st]==1){
$my->normal_UPDATE1($con,sales_agent,st,0,agent_id,$decode_id);
}else{
$my->normal_UPDATE1($con,sales_agent,st,1,agent_id,$decode_id);
}
$nurl="$log_url?pg=$_GET[pg]&lid=$dtls_link[sublink_id]";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$nurl.'">';	
}


if($_GET[gid]!=""){
$decode_id=base64_decode($_GET[gid]);
$value_det=$my->total_row($con,sales_agent,agent_id,$decode_id);
if($value_det[member_status]==1){
$my->normal_UPDATE1($con,sales_agent,member_status,0,agent_id,$decode_id);
}else{
$my->normal_UPDATE1($con,sales_agent,member_status,1,agent_id,$decode_id);
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
<th scope="col" class="rounded">Agent Id</th>
<th scope="col" class="rounded">Name</th>
<th scope="col" class="rounded">Mobile</th>
<th scope="col" class="rounded">Sponsor Id</th>
<th scope="col" class="rounded">Sponsor Name</th>
<th scope="col" class="rounded">DOJ</th>
<th scope="col" class="rounded">Rank</th>
<th scope="col" class="rounded">Status</th>
<th scope="col" class="rounded-q4">Action</th>
</tr>
</thead>
<tbody>

<?php
if($_POST[agent_code]){
$msgsql="select * from `sales_agent` WHERE `st`='0' AND `agent_code`='$_POST[agent_code]' ORDER BY `agent_id` ASC limit $lower,$upper";
}else{
$msgsql="select * from `sales_agent` WHERE `st`='0' ORDER BY `agent_id` ASC limit $lower,$upper";
	
}
$msgres=mysqli_query($con,$msgsql);
while($row=mysqli_fetch_array($msgres)){
$c++;


$decode_val=base64_encode($row[agent_id]);
$decode_time=base64_encode(time());

$srow=$my->total_row($con,sales_agent,agent_code,$row[sponsorid]);

$sre="SELECT * FROM `package` WHERE `package_id`='$row[package_id]'";
$ret=mysqli_query($con,$sre);
$des=mysqli_fetch_array($ret);


if($row[st]==0){
$msg="<font style='color:black;'>Block</font>";
}
if($row[st]==1){
$msg="<font style='color:blue;'>UnBlock</font>";
}

$dt1=explode("-",$row[doj]);
$dt2=$dt1[2]."-".$dt1[1]."-".$dt1[0];



$arow=$my->total_row($con,sales_rank,sales_rank_id,$row[sales_rank_id]);


?>

<tr>
<td><?=$c?></td>
<td >
<?
if($row[member_status]==1){
?>
<span style='color:#339900;font-weight:bold'> <?=$row[agent_code]?> </span>
<?
} else {?>
<span style='color:#ff0000;font-weight:bold'> <?=$row[agent_code]?> </span>
<? } ?>
</td>
<td style='font-size:11px'><?=$row[sname]?></td>
<td><?=$row[mob]?></td>
<td><?=$row[sponsorid]?></td>
<td><?=$srow[sname]?></td>
<td><?=$dt2?></td>
<td><span style="color:<?=$arow[rank_color]?>;font-weight:bold"><?=$arow[designation]?></span></td>

<td><?=$msg?></td>
<td>
<a href="<?=$log_url?>?did=<?=$decode_val?>&<?=$decode_time?>&pg=<?=$_GET[pg]?>" type="button" class="btn btn-danger btn-sm"  onclick="return confirm('Are you sure to unblock?')"><i class="fa fa-trash-o"></i> </a>
</td>


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
print "<A HREF='agent_join_dtls1.php?pg=$pre&lid=$dtls_link[sublink_id]'class='previous-off'>&laquo; Previous</A>";
else
print "<span class='previous-off'>&laquo; Previous</span>";



for($i=1;$i<=$pgno;$i++)
{
if($i!=$pg)
print "&nbsp;&nbsp;&nbsp;&nbsp;<A HREF='agent_join_dtls1.php?pg=$i&lid=$dtls_link[sublink_id]'>$i</A>";
else
print "&nbsp;&nbsp;&nbsp;&nbsp;$i";
}

if($pg!=$pgno)
print "&nbsp;&nbsp;&nbsp;&nbsp;<A HREF='agent_join_dtls1.php?pg=$nxt&lid=$dtls_link[sublink_id]'class='next'>Next &raquo;</A>";
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