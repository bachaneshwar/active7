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

if($_GET[did]!=""){
$decode_id=base64_decode($_GET[did]);
$my->delete(company_message,id,$decode_id);
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$log_url.'?lid='.$dtls_link[sublink_id].'&pg='.$_GET[pg].'">';		 
}



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
<div class="header-icon"><i class="fa fa-envelope-o"></i></div>
<div class="header-title">
<h1>Message</h1>
<small>Sent Message</small>
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
$upper=30;
$lower=$upper*($pg-1);
$sql="select * from `company_message`";
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

<i class="fa fa-list"></i> Sent Messages Details 
</div>
</div>
<div class="panel-body">



<div class="table-responsive">
<table id="dataTableExample1" class="table table-bordered table-striped table-hover">
<thead>
<tr class="info">
<th>Sr</th>
<th>Messages</th>
<th>Date</th>
<th>Member ID</th>
<th>Action</th>
</tr>
</thead>
<tbody>

<?php
$msgsql="SELECT * FROM `company_message`  ORDER BY `id` DESC limit $lower,$upper";
$msgres=mysqli_query($con,$msgsql);
while($msgrow=mysqli_fetch_array($msgres)){
$c++;

$decode_val=base64_encode($msgrow[id]);
$decode_time=base64_encode(time());


?>

<tr>
<td><?=$c?></td>
<td><?=$msgrow[message]?></td>
<td><?=$msgrow['date']?></td>
<td><?=$msgrow[spid]?></td>
<td>
<a href="<?=$log_url?>?lid=<?=$dtls_link[sublink_id]?>&did=<?=$decode_val?>&<?=$decode_time?>&pg=<?=$_GET[pg]?>" type="button" class="btn btn-danger btn-sm"  onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash-o"></i> </a>
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
print "<A HREF='sent_messages.php?pg=$pre&lid=$dtls_link[sublink_id]'class='previous-off'>&laquo; Previous</A>";
else
print "<span class='previous-off'>&laquo; Previous</span>";



for($i=1;$i<=$pgno;$i++)
{
if($i!=$pg)
print "&nbsp;&nbsp;&nbsp;&nbsp;<A HREF='sent_messages.php?pg=$i&lid=$dtls_link[sublink_id]'>$i</A>";
else
print "&nbsp;&nbsp;&nbsp;&nbsp;$i";
}

if($pg!=$pgno)
print "&nbsp;&nbsp;&nbsp;&nbsp;<A HREF='sent_messages.php?pg=$nxt&lid=$dtls_link[sublink_id]'class='next'>Next &raquo;</A>";
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