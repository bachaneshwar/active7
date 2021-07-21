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
<h1>Member</h1>
<small>All Member</small>
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
$sql="select * from `member` WHERE `st`='0'";
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

<i class="fa fa-list"></i> All Block Member Details 
</div>
</div>
<div class="panel-body">

<?
if($_GET[did]!=""){
$decode_id=base64_decode($_GET[did]);
$value_det=$my->total_row($con,member,memid,$decode_id);
if($value_det[st]==1){
$my->normal_UPDATE1($con,member,st,0,memid,$decode_id);
}else{
$my->normal_UPDATE1($con,member,st,1,memid,$decode_id);
}
$nurl="$log_url?pg=$_GET[pg]&lid=$dtls_link[sublink_id]";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$nurl.'">';	
}


if($_GET[gid]!=""){
$decode_id=base64_decode($_GET[gid]);
$value_det=$my->total_row($con,member,memid,$decode_id);
if($value_det[member_status]==1){
$my->normal_UPDATE1($con,member,member_status,0,memid,$decode_id);
}else{
$my->normal_UPDATE1($con,member,member_status,1,memid,$decode_id);
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
<th scope="col" class="rounded">Member Id</th>
<th scope="col" class="rounded">Name</th>
<th scope="col" class="rounded">Sponsor Id</th>
<!--<th scope="col" class="rounded">Sponsor Name</th>-->
<th scope="col" class="rounded">Password</th>
<th scope="col" class="rounded">DOJ</th>
<th scope="col" class="rounded">Status</th>
<th scope="col" class="rounded-q4">Action</th>
</tr>
</thead>
<tbody>

<?php
$msgsql="select * from `member` WHERE `st`='0' ORDER BY `memid` ASC limit $lower,$upper";
$msgres=mysqli_query($con,$msgsql);
while($row=mysqli_fetch_array($msgres)){
$c++;


$decode_val=base64_encode($row[memid]);
$decode_time=base64_encode(time());

$srow=$my->total_row($con,member,spid,$row[sponsorid]);

$sre="SELECT * FROM `package` WHERE `package_id`='$row[package_id]'";
$ret=mysqli_query($con,$sre);
$des=mysqli_fetch_array($ret);


if($row[st]==0){
$msg="<font style='color:black;'>Block</font>";
}
if($row[st]==1){
$msg="<font style='color:blue;'>Active</font>";
}

$dt1=explode("-",$row[doj]);
$dt2=$dt1[2]."-".$dt1[1]."-".$dt1[0];


if($row[leg]=="L"){
$lmsg="A";
}
if($row[leg]=="R"){
$lmsg="B";
}

if($row[admin_join]==1){
$joinmsg="<span style='color:green;font-weight:bold'>Admin Panel</span>";
}else{
$joinmsg="<span style='color:blue;font-weight:bold'>Member panel</span>";
}


?>

<tr>
<td><?=$c?></td>
<td >
<?
if($row[member_status]==1){
?>
<span style='color:#339900;font-weight:bold'> <?=$row[spid]?> </span>
<? } else {?>
<span style='color:#ff0000;font-weight:bold'> <?=$row[spid]?> </span>
<? } ?>
</td>
<td style='font-size:11px'><?=$row[sname]?></td>
<td><?=$row[sponsorid]?></td>
<!--<td><?=$srow[sname]?></td>-->
<td><?=$row[pass]?></td>
<td><?=$dt2?></td>

<td><?=$msg?></td>
<td>

<a href="<?=$log_url?>?did=<?=$decode_val?>&<?=$decode_time?>&pg=<?=$_GET[pg]?>" type="button" class="btn btn-danger btn-sm"  onclick="return confirm('Are you sure to Active?')"><i class="fa fa-trash-o"></i> </a>
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
print "<A HREF='allmember1.php?pg=$pre&lid=$dtls_link[sublink_id]'class='previous-off'>&laquo; Previous</A>";
else
print "<span class='previous-off'>&laquo; Previous</span>";



for($i=1;$i<=$pgno;$i++)
{
if($i!=$pg)
print "&nbsp;&nbsp;&nbsp;&nbsp;<A HREF='allmember1.php?pg=$i&lid=$dtls_link[sublink_id]'>$i</A>";
else
print "&nbsp;&nbsp;&nbsp;&nbsp;$i";
}

if($pg!=$pgno)
print "&nbsp;&nbsp;&nbsp;&nbsp;<A HREF='allmember1.php?pg=$nxt&lid=$dtls_link[sublink_id]'class='next'>Next &raquo;</A>";
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