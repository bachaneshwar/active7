<!DOCTYPE html>
<html lang="en">


<?php
include_once("include/header_top.php");
?>

<body class="hold-transition sidebar-mini">
<!--preloader-->
<div id="preloader">
<div id="status"></div>
</div>

<?
if($_GET[eid]!=""){

$decode_id=base64_decode($_GET[eid]);
$value_num=$my->second_num($con,area,area_id,$decode_id,st,1);

if($value_num>0){
$value_det=$my->total_row($con,area,area_id,$decode_id);
}


}else{
$value_num=0;
}

if($value_num==0){
$action_type="Add";
}else{
$action_type="Edit";
}


if($_GET[did]!=""){
$decode_id=base64_decode($_GET[did]);
$value_det=$my->total_row($con,area,area_id,$decode_id);
if($value_det[st]==1){
$my->normal_UPDATE1($con,area,st,0,area_id,$decode_id);
}else{
$my->normal_UPDATE1($con,area,st,1,area_id,$decode_id);
}
$nurl="$log_url?pg=$_GET[pg]&lid=$dtls_link[sublink_id]";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$nurl.'">';	
}
?>




<?


if($_POST[call_submit]!=""){

if($_POST[subId]!=""){
$newdata=mysqil_real_escape_string($con,$newdata);
$my->new_modify($con,area,$nurl,$_POST[subId]);
$nurl="$log_url?pg=$_GET[pg]&lid=$dtls_link[sublink_id]";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$nurl.'">';		

}else{
$nurl="$log_url?lid=$dtls_link[sublink_id]";
$my->new_insert($con,area,$nurl);
}


}

?>



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
<div class="header-icon"><i class="fa fa-shopping-cart"></i></div>
<div class="header-title">
<h1>Area</h1>
<small>Area Details</small>
</div>
</section>
<!-- Main content -->
<section class="content">
<div class="row">
<div class="col-sm-4">
<div class="panel lobidisable panel-bd">
<div style="padding:10px;color: #010611;background-color: #e8f1f3;border-color: #b7b9bf;position: relative;">
<div class="panel-title">
<h4><?=$action_type?> Area</h4>
</div>
</div>
<div class="panel-body">
<form action="" method="post">

<div class="form-group">
<label>Area Name</label>
<input type="text" class="form-control" name="area_name" placeholder="Enter Short description" value="<?=$value_det[area_name]?>"  required />
</div>

<!--
<div class="form-group">
<label>Point</label>
<input type="text" class="form-control" name="point" placeholder="Enter Short description" value="<?=$value_det[point]?>"  onkeypress="return keyRestrict(event, '1234567890.')" required />
</div>
-->

<div class="form-group">

<input type="hidden" name="subId" value="<?=$value_det['area_id']?>" />



<?
if($_GET[eid]!=""){
?>

<input type="hidden" name="st" value="<?=$value_det[st]?>" />

<?} else{?>

<input type="hidden" name="st" value="1" />

<?}?>


<input type="submit" name="call_submit" class="btn btn-add"  value="Submit" />

</div>
</form>
</div>
</div>
</div>
<div class="col-sm-8">
<div class="panel lobidisable panel-bd">
<div style="padding:10px;color: #010611;background-color: #e8f1f3;border-color: #b7b9bf;position: relative;">
<div class="panel-title">
<h4>Area Details</h4>
</div>
</div>

<?php
if($_GET[pg])
{
$pg=$_GET[pg];
}
else
{
$pg=1;
}
$upper=10;
$lower=$upper*($pg-1);
$sql="select * from `area`";
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



<div class="panel-body">
<div class="table-responsive">
<table class="table table-bordered table-hover">
<thead>
<tr class="info">
<th>Sr.</th>
<th>Area</th>
<!--<th>Point</th>-->
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$msgsql="SELECT * FROM `area`  ORDER BY  `area_name` ASC limit $lower,$upper";
$msgres=mysqli_query($con,$msgsql);
while($msgrow=mysqli_fetch_array($msgres)){
$c++;

$decode_val=base64_encode($msgrow[area_id]);
$decode_time=base64_encode(time());

if($msgrow[st]==0){
$msg="<font style='color:black;'>Block</font>";
}
if($msgrow[st]==1){
$msg="<font style='color:blue;'>Active</font>";
}

?>

<tr>
<td><?=$c?></td>
<td><?=$msgrow[area_name]?></td>
<!--<td><?=$msgrow[point]?></td>-->
<td><?=$msg?></td>
<td>
<a href="<?=$log_url?>?lid=<?=$dtls_link[sublink_id]?>&eid=<?=$decode_val?>&<?=$decode_time?>&pg=<?=$_GET[pg]?>" type="button" class="btn btn-add btn-sm" ><i class="fa fa-pencil"></i></a>
<a href="<?=$log_url?>?lid=<?=$dtls_link[sublink_id]?>&did=<?=$decode_val?>&<?=$decode_time?>&pg=<?=$_GET[pg]?>" type="button" class="btn btn-danger btn-sm"  onclick="return confirm('Are you sure to block?')"><i class="fa fa-trash-o"></i> </a>
</td>
</tr>

<? } ?>

</tbody>
</table>

<div class="pagination">
<?
$pre=$pg-1;
$nxt=$pg+1;

if($pg!=1)
print "<A HREF='area.php?pg=$pre&lid=$dtls_link[sublink_id]'class='previous-off'>&laquo; Previous</A>";
else
print "<span class='previous-off'>&laquo; Previous</span>";



for($i=1;$i<=$pgno;$i++)
{
if($i!=$pg)
print "&nbsp;&nbsp;&nbsp;&nbsp;<A HREF='area.php?pg=$i&lid=$dtls_link[sublink_id]'>$i</A>";
else
print "&nbsp;&nbsp;&nbsp;&nbsp;$i";
}

if($pg!=$pgno)
print "&nbsp;&nbsp;&nbsp;&nbsp;<A HREF='area.php?pg=$nxt&lid=$dtls_link[sublink_id]'class='next'>Next &raquo;</A>";
else
print "&nbsp;&nbsp;&nbsp;&nbsp;<span class='next'>Next &raquo;</span>";
?> 
</div>  


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
