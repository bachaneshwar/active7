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
<small>Edit Gallery</small>
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
<h4><?=$action_type?> Edit Gallery</h4>
<? } else {?>
<h4><?=$action_type?> Edit Gallery</h4>
<? } ?>
</div>
</div>


<?php
$id=$_REQUEST['id'];
$sqlu="SELECT * FROM `gallery` WHERE `gid`='$id'";
$resu=mysqli_query($con,$sqlu);
$rowu=mysql_fetch_assoc($resu);

if($_POST[call_submit]!="")
{
	$title=$_POST['title'];
	$img=$_FILES['image'];
	$name1=$img[name];
	if($name1!="")
	{
		$path="../gallery_image/".$name1;
		move_uploaded_file($img[tmp_name],$path);	
	}
	else
	{
		$name1=$rowu[image];	
	}	

	$sqle="UPDATE `gallery` SET `title`='$title', `image`='$name1' WHERE `gid`='$id'";
	$rese=mysqli_query($con,$sqle);
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=addgallery.php?pg='.$_GET[pg].'">';		
}

?>


<div class="panel-body">
<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
	<label>Title</label>
	<input type="text" class="form-control" name="title" placeholder="Enter Tiltle" value="<?php echo $rowu[title];?>" required>
</div>
<div class="form-group">
	<label>Image</label>
	<input type="file" id="image" name="image"  class="form-control" >
</div>


<input type="submit" name="call_submit" class="btn btn-add"  value="Submit" />


</div>
</form>
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
