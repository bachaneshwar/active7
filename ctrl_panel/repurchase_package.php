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
$value_num=$my->second_num($con,repurchase_package,repurchase_package_id,$decode_id,st,1);

if($value_num>0){
$value_det=$my->total_row($con,repurchase_package,repurchase_package_id,$decode_id);
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
$value_det=$my->total_row($con,repurchase_package,repurchase_package_id,$decode_id);
if($value_det[st]==1){
$my->normal_UPDATE1($con,repurchase_package,st,0,repurchase_package_id,$decode_id);
}else{
$my->normal_UPDATE1($con,repurchase_package,st,1,repurchase_package_id,$decode_id);
}
$nurl="$log_url?pg=$_GET[pg]&lid=$dtls_link[sublink_id]";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$nurl.'">';	
}
?>




<?

if($_POST[call_submit]!=""){


$ads1=$_FILES[package_image];
$name=$ads1[name];
$folder="repurchase/".$name;
$folder1="../repurchase/".$name;
move_uploaded_file($ads1[tmp_name],$folder1);	

if($_POST[subId]!=""){
if($name==""){$folder=$_POST[old_img];}
$nurl="$log_url?pg=$_GET[pg]";
$my->new_modify_val($con,repurchase_package,package_image,$folder,$nurl,$_POST[subId]);
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$nurl.'">';		
}else{
$nurl="$log_url?lid=$dtls_link[sublink_id]";
$my->insertval1($con,repurchase_package,package_image,$folder,$nurl);
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
<div class="header-icon"><i class="fa fa-shopping-basket"></i></div>

<div class="header-title">
<h1>Repurchase Package</h1>
<small>Package Details</small>
</div>
</section>
<!-- Main content -->
<section class="content">
<div class="row">
<div class="col-sm-4">
<div class="panel lobidisable panel-bd">
<div style="padding:10px;color: #010611;background-color: #e8f1f3;border-color: #b7b9bf;position: relative;">
<div class="panel-title">
<?
if($_GET[eid]!=""){
?>
<h4><?=$action_type?>  Package</h4>
<? } else {?>
<h4><?=$action_type?>  Package</h4>
<? } ?>
</div>
</div>
<div class="panel-body">
<form action="" method="post" enctype="multipart/form-data">



<div class="form-group">
<label>Package </label>
<input type="text" class="form-control" name="repurchase_package_name" placeholder="Enter Short description" value="<?=$value_det[repurchase_package_name]?>" required />
</div>


<div class="form-group">
<label>MP Rate</label>
<input type="text" class="form-control" name="mp_rate" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"   value="<?=$value_det[mp_rate]?>" required />
</div>

<div class="form-group">
<label>DP Rate</label>
<input type="text" class="form-control" name="dp_rate" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"   value="<?=$value_det[dp_rate]?>" required />
</div>
<!--
<div class="form-group">
<label>Coupon No</label>
<input type="text" class="form-control" name="coupon_no" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"   value="<?=$value_det[coupon_no]?>" required />
</div>


<div class="form-group">
<label>PV</label>
<input type="text" class="form-control" name="pv" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"   value="<?=$value_det[pv]?>" required />
</div>

<div class="form-group">
<label>Size</label>
<input type="text" class="form-control" name="size"  value="<?=$value_det[size]?>" required />
</div>

<div class="form-group">
<label>Colour</label>
<input type="text" class="form-control" name="colour"  value="<?=$value_det[colour]?>" required />
</div>
-->

<div class="form-group">
<label>Image</label>
<input type="file" id="package_image" name="package_image"  class="form-control"  >
</div>




<div class="form-group">
<input type="hidden" name="subId" value="<?=$value_det['repurchase_package_id']?>" />
<input type="hidden" name="old_img" value="<?=$value_det['package_image']?>" />


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
<h4>Package Details</h4>
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
$upper=100;
$lower=$upper*($pg-1);
$sql="select * from `repurchase_package` ";
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
<th>Package</th>
<th>MRP</th>
<th>DP</th>
<th>Image</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$msgsql="SELECT * FROM `repurchase_package`  ORDER BY  `repurchase_package_id` ASC limit $lower,$upper";
$msgres=mysqli_query($con,$msgsql);
while($msgrow=mysqli_fetch_array($msgres)){
$c++;

$decode_val=base64_encode($msgrow[repurchase_package_id]);
$decode_time=base64_encode(time());



if($msgrow[st]==0){
$msg="<font style='color:black;'>Block</font>";
}
if($msgrow[st]==1){
$msg="<font style='color:blue;'>Active</font>";
}


//$repurchase_package_num=$my->second_num($con,repurchase_package_booking,repurchase_package_id,$msgrow[repurchase_package_id],status,1);
?>

<tr>
<td><?=$c?></td>

<td><?=$msgrow[repurchase_package_name]?></td>
<td><?=$msgrow[mp_rate]?></td>
<td><?=$msgrow[dp_rate]?></td>
<td><? if($msgrow[package_image]!=""){?><img src="../<?=$msgrow[package_image]?>" style="width:100px;height:100px" /><?}?></td>

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
print "<A HREF='repurchase_package.php?pg=$pre&lid=$dtls_link[sublink_id]'class='previous-off'>&laquo; Previous</A>";
else
print "<span class='previous-off'>&laquo; Previous</span>";



for($i=1;$i<=$pgno;$i++)
{
if($i!=$pg)
print "&nbsp;&nbsp;&nbsp;&nbsp;<A HREF='repurchase_package.php?pg=$i&lid=$dtls_link[sublink_id]'>$i</A>";
else
print "&nbsp;&nbsp;&nbsp;&nbsp;$i";
}

if($pg!=$pgno)
print "&nbsp;&nbsp;&nbsp;&nbsp;<A HREF='repurchase_package.php?pg=$nxt&lid=$dtls_link[sublink_id]'class='next'>Next &raquo;</A>";
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
