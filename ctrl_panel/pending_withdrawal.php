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
<div class="header-icon"><i class="fa fa-shopping-basket"></i></div>
<div class="header-title">
<h1>Withdrawal</h1>
<small>Pending Withdrawal</small>
</div>
</section>

<!-- Main content -->
<section class="content">

<script language="JavaScript">
function toggle1(source) {
  checkboxes = document.getElementsByName('chkName[]');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
</script>




<div class="row">
<div class="col-sm-12">
<div class="panel panel-bd lobidrag">
<div style="padding:10px;color: #010611;background-color: #e8f1f3;border-color: #b7b9bf;position: relative;">
<div class="btn-group" id="buttonlist">

<i class="fa fa-list"></i> All Pending Withdrawal Details
</div>
</div>
<div class="panel-body">
<center>
<form action="" method="post" name="newform" onsubmit="return validate_form(this);" >
<table style="width:100%">
<tr>
<td>Member Code</td>
<td><input type="text" class="form-control" name="spid" style="width:200px" required /></td>
</tr>
<tr><td colspan="2"><br/></td></tr>
</table>
<div class="form-group">
<input type="hidden" name="st" value="1" />
<input type="submit" name="call_submit" class="btn btn-success"  value="Submit" />
<input type="reset" name="reset"  class="btn btn-warning" value="Exit" />
</div>
</form>
</center>

<?php
$msg=$_REQUEST[msg];
echo "<center><font color=\"#ff0066\" size=\"3\">".$msg."</font></center>";
?>

<div class="table-responsive">


<form action="bank_transfer_action.php" method="post">
<center>
<input type="submit" name="approve_panel"  class="btn btn-success" value="Approve" /></center>
<br/>


<table id="dataTableExample1" class="table table-bordered table-striped table-hover">
<thead>
<tr class="info">

<th scope="col" class="rounded"><input type="checkbox"  name="allCheck" onClick="toggle1(this)" > </th>
<th scope="col" class="rounded">Mem ID</th>
<th scope="col" class="rounded">Name</th>
<th scope="col" class="rounded">Mob</th>
<th scope="col" class="rounded">PAN</th>
<th scope="col" class="rounded">Bank</th>
<th scope="col" class="rounded">Branch</th>
<th scope="col" class="rounded">Account</th>
<th scope="col" class="rounded">IFSC</th>
<th scope="col" class="rounded">Amount</th>
</tr>
</thead>
<tbody>

<?php

if($_POST[spid]==""){
$msgsql="SELECT * FROM `withdrawal` WHERE `status`='0' ORDER BY `with_d_id` ASC";
}else{
$msgsql="select * from `withdrawal` WHERE spid='$_POST[spid]' AND `status`='0'";
}

$msgres=mysqli_query($con,$msgsql);
while($row=mysqli_fetch_array($msgres)){
$c++;

$sql1="SELECT * FROM `member` WHERE `spid`='$row[spid]'";
$res1=mysqli_query($con,$sql1);
$row1=mysqli_fetch_array($res1);
?>

<tr>
<td><input type="checkbox" name="chkName[]" value="<?=$row[with_d_id]?>" /></td>
<td style="font-size:12px"><?=$row1[spid]?></td>
<td style="font-size:12px"><?=$row1[sname]?></td>
<td style="font-size:12px"><?=$row1[mob]?></td>
<td style="font-size:12px"><?=$row1[pan]?></td>
<td style="font-size:12px"><?=$row1[bank]?></td>
<td style="font-size:12px"><?=$row1[branch]?></td>
<td style="font-size:12px"><?=$row1[acc_no]?></td>
<td style="font-size:12px"><?=$row1[ifsc_code]?></td>
<td style="font-size:12px"><?=$row[amount]?></td>

</tr>
<? } ?>

</tbody>
</table>


</form>
</div>
<div>
<table>
<form>

<?php
unset($amount);unset($tds);unset($sc);
if($_POST[spid]==""){
$msgsql="SELECT * FROM `withdrawal` WHERE `status`='0' ORDER BY `with_d_id` ASC";
}else{
$msgsql="select * from `withdrawal` WHERE spid='$_POST[spid]' AND `status`='0'";
}

$msgres=mysqli_query($con,$msgsql);
while($row=mysqli_fetch_array($msgres)){

$amount=$amount+$row[amount];
$tds=$tds+$row[tds];
$sc=$sc+$row[sc];
}
  ?>

  <td style="padding:30px;">Total Amount:</td>
  <td><input type="text" class="form-control" value="<?=$amount?>" style="width:200px" readonly/></td>



  <form>
  </table>
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
