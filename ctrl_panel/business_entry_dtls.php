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
<h1>Business Details</h1>
<small>Unpaid Business Details</small>
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
$upper=50;
$lower=$upper*($pg-1);
if($_POST[agent_code]){
$sql="select * from `sales_business` WHERE `payout_id`='0' AND `agent_code`='$_POST[agent_code]'";
}else{
$sql="select * from `sales_business` WHERE `payout_id`='0'";
	
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

<i class="fa fa-list"></i> All Active Agent Details 
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
if($_POST[submit]!=""){

$sql7="UPDATE `sales_business` SET `business_amount`='$_POST[business_amount]' WHERE `sales_business_id`='$_POST[sales_business_id]'";
$res7=mysqli_query($con,$sql7);
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
<th scope="col" class="rounded">Amount</th>
<th scope="col" class="rounded">Date</th>
<th scope="col" class="rounded">Rank</th>
<th scope="col" class="rounded-q4">Action</th>
</tr>
</thead>
<tbody>

<?php
if($_POST[agent_code]){
$msgsql="select * from `sales_business` WHERE `payout_id`='0' AND `agent_code`='$_POST[agent_code]' ORDER BY `sales_business_id` ASC limit $lower,$upper";
}else{
$msgsql="select * from `sales_business` WHERE `payout_id`='0' ORDER BY `sales_business_id` ASC limit $lower,$upper";
	
}
$msgres=mysqli_query($con,$msgsql);
while($row=mysqli_fetch_array($msgres)){
$c++;



$srow=$my->total_row($con,sales_agent,agent_code,$row[agent_code]);
$arow=$my->total_row($con,sales_rank,sales_rank_id,$srow[sales_rank_id]);


if($row[payout_id]==0){
$msg="<font style='color:black;'>Yes</font>";
}
if($row[payout_id]==1){
$msg="<font style='color:blue;'>No</font>";
}

$dt1=explode("-",$row[entry_dt]);
$dt2=$dt1[2]."-".$dt1[1]."-".$dt1[0];



?>

<tr>
<td><?=$c?></td>
<form method="post" action="">
<td><?=$srow[agent_code]?></td>
<td><?=$srow[sname]?></td>
<td>
<input type="text" name="business_amount" value="<?=$row[business_amount]?>" style="width:60px;font-size:12px" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
</td>
<td><?=$dt2?></td>
<td><span style="color:<?=$arow[rank_color]?>;font-weight:bold"><?=$arow[designation]?></span></td>
<td>
<input type="hidden" name="sales_business_id" value="<?=$row[sales_business_id]?>" readonly />
<input type="hidden" name="pg" value="<?=$_GET[pg]?>" readonly />
<input type="submit" name="submit" id="submit" value="Submit" style="width:60px;font-size:12px" />
</form>

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
print "<A HREF='business_entry_dtls.php?pg=$pre&lid=$dtls_link[sublink_id]'class='previous-off'>&laquo; Previous</A>";
else
print "<span class='previous-off'>&laquo; Previous</span>";



for($i=1;$i<=$pgno;$i++)
{
if($i!=$pg)
print "&nbsp;&nbsp;&nbsp;&nbsp;<A HREF='business_entry_dtls.php?pg=$i&lid=$dtls_link[sublink_id]'>$i</A>";
else
print "&nbsp;&nbsp;&nbsp;&nbsp;$i";
}

if($pg!=$pgno)
print "&nbsp;&nbsp;&nbsp;&nbsp;<A HREF='business_entry_dtls.php?pg=$nxt&lid=$dtls_link[sublink_id]'class='next'>Next &raquo;</A>";
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