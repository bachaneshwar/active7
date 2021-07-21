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

<?php
if($_POST[call_submit]!="")
{
$name=$_POST['name'];
$img=$_FILES['image'];
$name1=$img[name];
$path="../gallery_image/".$name1;
move_uploaded_file($img[tmp_name],$path);	

$sqlg="INSERT INTO `gallery`(`title`,`image`) VALUES ('$name','$name1')";
$resg=mysqli_query($con,$sqlg);

echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$nurl.'">';		

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
<h1>Setting</h1>
<small>Gallery</small>
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
<h4><?=$action_type?>  Gallery</h4>
<? } else {?>
<h4><?=$action_type?>  Gallery</h4>
<? } ?>
</div>
</div>
<div class="panel-body">
<form action="" method="post" enctype="multipart/form-data">



<div class="form-group">
	<label>Title</label>
	<input type="text" class="form-control" name="name" placeholder="Enter Tiltle"  required>
</div>
<div class="form-group">
	<label>Image</label>
	<input type="file" id="package_image" name="image"  class="form-control" required >
</div>




<div class="form-group">

<input type="hidden" name="old_img" value="<?=$value_det['package_image']?>" />
<input type="hidden" name="subId" value="<?=$value_det['package_id']?>" />


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
<h4>Gallery Details</h4>
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
$upper=2;
$lower=$upper*($pg-1);
$sql="select * from `gallery` ";
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
<th>Title</th>
<th>Image</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$msgsql="SELECT * FROM `gallery`  ORDER BY  `gid` ASC limit $lower,$upper";
$msgres=mysqli_query($con,$msgsql);
while($msgrow=mysqli_fetch_array($msgres)){
$c++;

$decode_val=base64_encode($msgrow[package_id]);
$decode_time=base64_encode(time());



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

<td><?=$msgrow[title]?></td>
<td style="text-align: center;"><? if($msgrow[image]!=""){?><img src="../gallery_image/<?=$msgrow[image]?>" style="width:200px;height:100px; " /><?}?></td>
<td>
    <a href="edit_gallery_item.php?id=<?php echo $msgrow[gid]; ?>&pg=<?=$_GET[pg]?>" type="button" class="btn btn-add btn-sm" ><i class="fa fa-pencil"></i>Edit</a>
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
print "<A HREF='addgallery.php?pg=$pre&lid=$dtls_link[sublink_id]'class='previous-off'>&laquo; Previous</A>";
else
print "<span class='previous-off'>&laquo; Previous</span>";


for($i=1;$i<=$pgno;$i++)
{
if($i!=$pg)
print "&nbsp;&nbsp;&nbsp;&nbsp;<A HREF='addgallery.php?pg=$i&lid=$dtls_link[sublink_id]'>$i</A>";
else
print "&nbsp;&nbsp;&nbsp;&nbsp;$i";
}

if($pg!=$pgno)
print "&nbsp;&nbsp;&nbsp;&nbsp;<A HREF='addgallery.php?pg=$nxt&lid=$dtls_link[sublink_id]'class='next'>Next &raquo;</A>";
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
