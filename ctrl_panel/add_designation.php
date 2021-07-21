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
$value_num=$my->second_num($con,designation,designation_id,$decode_id,st,1);

if($value_num>0){
$value_det=$my->total_row($con,designation,designation_id,$decode_id);
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
$sql="UPDATE `designation` set `st`='0' where `designation_id`='$_REQUEST[did]'";
$res=mysqli_query($con,$sql);
}


?>




<?

if($_POST[call_submit]!=""){

$ads1=$_FILES[product_image];
$name=$ads1[name];
$folder="product/".$name;
$folder1="../product/".$name;
move_uploaded_file($ads1[tmp_name],$folder1);	


if($_POST[subId]!=""){
$nurl="$log_url?pg=$_GET[pg]";

if($name==""){$folder=$_POST[old_img];}
$my->new_modify_val($con,designation,product_image,$folder,$nurl,$_POST[subId]);



echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$nurl.'">';		
}else{
$nurl="$log_url?lid=$dtls_link[sublink_id]";
$my->insertval1($con,designation,designation_name,$_POST[designation_name],$nurl);

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
<div class="header-icon"><i class="fa fa-user-o"></i></div>

<div class="header-title">
<h1>Add Designation</h1>
<small>Designation Details</small>
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
<h4><?=$action_type?>  Designation</h4>
<? } else {?>
<h4><?=$action_type?>  Designation</h4>
<? } ?>
</div>
</div>
<div class="panel-body">
<form action="" method="post">





<div class="form-group">
<label>Designation </label>
<input type="text" class="form-control" name="designation_name" placeholder="Enter description" value="<?=$value_det[designation_name]?>" required>
</div>




<div class="form-group">


<input type="hidden" name="old_img" value="<?=$value_det['product_image']?>" />
<input type="hidden" name="subId" value="<?=$value_det['product_id']?>" />
<input type="hidden" name="product_type" value="1" />


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
<h4>Designation Details</h4>
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
$upper=25;
$lower=$upper*($pg-1);
$sql="select * from `designation` where `st`='1' ORDER BY  `designation_id` ASC";
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
<th>Designation</th>
<!-- <th>Amount</th> -->
<!--<th>Type</th>
<th>Self</th>
<th>Sponsor</th>
-->

<!-- <th>Image</th>

<th>Status</th> -->
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$msgsql="SELECT * FROM `designation` where `st`='1' ORDER BY  `designation_id` ASC limit $lower,$upper";
$msgres=mysqli_query($con,$msgsql);
while($msgrow=mysqli_fetch_array($msgres)){
$c++;

$decode_val=base64_encode($msgrow[product_id]);
$decode_time=base64_encode(time());

if($msgrow[package_type]==1){$pmsg="Join Package";}
if($msgrow[package_type]==2){$pmsg="Repurchase Package";}
if($msgrow[package_type]==3){$pmsg="TopUp Package";}


if($msgrow[st]==0){
$msg="<font style='color:black;'>Block</font>";
}
if($msgrow[st]==1){
$msg="<font style='color:blue;'>Active</font>";
}


//$package_num=$my->second_num($con,package_booking,package_id,$msgrow[package_id],status,1);
?>

<tr>
<td><?=$c?></td>

<td><?=$msgrow[designation_name]?></td>
<!-- <td><?=$msgrow[product_amount]?></td> -->

<!--<td><?=$pmsg?></td>
<td><?=$msgrow[self]?></td>
<td><?=$msgrow[direct]?></td>
-->
<!-- <td><? if($msgrow[product_image]!=""){?><img src="../<?=$msgrow[product_image]?>" style="width:100px;height:100px" /><?}?></td>

<td><?=$msg?></td> -->

<td>

<!-- <a href="<?=$log_url?>?lid=<?=$dtls_link[sublink_id]?>&eid=<?=$decode_val?>&<?=$decode_time?>&pg=<?=$_GET[pg]?>" type="button" class="btn btn-add btn-sm" ><i class="fa fa-pencil"></i></a> -->

<a href="<?=$log_url?>?lid=<?=$dtls_link[sublink_id]?>&did=<?=$msgrow[designation_id]?>&<?=$decode_time?>&pg=<?=$_GET[pg]?>" type="button" class="btn btn-danger btn-sm"  onclick="return confirm('Are you sure to block?')"><i class="fa fa-trash-o"></i> </a>

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
print "<A HREF='add_designation.php?pg=$pre&lid=$dtls_link[sublink_id]'class='previous-off'>&laquo; Previous</A>";
else
print "<span class='previous-off'>&laquo; Previous</span>";



for($i=1;$i<=$pgno;$i++)
{
if($i!=$pg)
print "&nbsp;&nbsp;&nbsp;&nbsp;<A HREF='add_designation.php?pg=$i&lid=$dtls_link[sublink_id]'>$i</A>";
else
print "&nbsp;&nbsp;&nbsp;&nbsp;$i";
}

if($pg!=$pgno)
print "&nbsp;&nbsp;&nbsp;&nbsp;<A HREF='add_designation.php?pg=$nxt&lid=$dtls_link[sublink_id]'class='next'>Next &raquo;</A>";
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
