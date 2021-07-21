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
<h1>Add Level</h1>
<small>Add Level</small>
</div>
</section>
<!-- Main content -->
<section class="content">
<div class="row">
<div class="col-sm-4">
<div class="panel lobidisable panel-bd">
<div style="padding:10px;color: #010611;background-color: #e8f1f3;border-color: #b7b9bf;position: relative;">
<div class="panel-title">

</div>
</div>
<div class="panel-body">
  <?php
  if(isset($_POST[call_submit]))
  {
  $sql1="INSERT INTO `level`(`rank_name`, `pair`, `st`) VALUES ('$_POST[level_name]','$_POST[pair]','1')";
  $res1=mysqli_query($con,$sql1);
 }

  ?>
<form action="" method="post" enctype="multipart/form-data">





<div class="form-group">
<label>Level Name</label>
<input type="text" class="form-control" name="level_name"  value="" required>
</div>



<div class="form-group">
<label>Pair</label>
<input type="number" class="form-control" name="pair" value="" required>
</div>




<div class="form-group">

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
<h4>level Details</h4>
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
$sql="select * from `level` where `st`='1'";
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
<th>level name</th>
<th>No of pair</th>
<!--<th>Type</th>
<th>Self</th>
<th>Sponsor</th>
-->


<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$msgsql="SELECT * FROM `level`  ORDER BY  `level_id` ASC limit $lower,$upper";
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

<td><?=$msgrow[rank_name]?></td>
<td><?=$msgrow[pair]?></td>



<td><?=$msg?></td>

<td>

<a href="level_edit.php?id=<?=$msgrow[level_id]?>" type="button" class="btn btn-add btn-sm" ><i class="fa fa-pencil"></i></a>

<a href="level_delete.php?id=<?=$msgrow[level_id]?>" type="button" class="btn btn-danger btn-sm"  onclick="return confirm('Are you sure to block?')"><i class="fa fa-trash-o"></i> </a>

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
print "<A HREF='package.php?pg=$pre&lid=$dtls_link[sublink_id]'class='previous-off'>&laquo; Previous</A>";
else
print "<span class='previous-off'>&laquo; Previous</span>";



for($i=1;$i<=$pgno;$i++)
{
if($i!=$pg)
print "&nbsp;&nbsp;&nbsp;&nbsp;<A HREF='package.php?pg=$i&lid=$dtls_link[sublink_id]'>$i</A>";
else
print "&nbsp;&nbsp;&nbsp;&nbsp;$i";
}

if($pg!=$pgno)
print "&nbsp;&nbsp;&nbsp;&nbsp;<A HREF='package.php?pg=$nxt&lid=$dtls_link[sublink_id]'class='next'>Next &raquo;</A>";
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
