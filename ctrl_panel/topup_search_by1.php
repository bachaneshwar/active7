<?php
ob_start();
error_reporting(0);
include_once("lib_panel/config.php");




$stdt=$_POST['start_date'];
$endt=$_POST['end_date'];
$gen=$_POST['gen'];

?>

<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>TopUp Details From <?=$_REQUEST[start_date]?> To <?=$_REQUEST[end_date]?></title>
<link rel="stylesheet" type="text/css" href="jscss/datatables.min.css">
<script type="text/javascript" src="jscss/datatables.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
font-size: 16px !important;
line-height: 25px !important;
}
</style>

</head>
<body class="">

<div class="container" style="min-height:500px;">

<div class="container" style="padding:20px;20px;">
<div class="">
<h1>TopUp Details generate by <?=$gen?> From <?=$_REQUEST[start_date]?> To <?=$_REQUEST[end_date]?></h1>

<div class="">
<div id="employee_grid_wrapper" class="dataTables_wrapper">

<table id="employee_grid" class="display dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="employee_grid_info" style="width: 100%;">
<thead>
<tr role="row">
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Serial No.</td>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Name</td>
<!-- <th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Serial</td> -->
  <th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Epin</td>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>State</th>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Address</th>
<!-- <th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Address</th>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Address</th> -->
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Pincode</th>
<!-- <th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Email</th> -->

<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Mobile No.</th>
<!-- <th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Alternate Mobile No.</th> -->
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>User Id</th>

<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Package</th>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Package Amount</th></tr>
</thead>
<tbody>

<?
unset($tot);
if($gen=="admin"){
$admin="admin";
 $msgsql = "select * from `e-pin` as epin,`package` as pack WHERE epin.useddate>='$_REQUEST[start_date]' AND epin.useddate<='$_REQUEST[end_date]' AND pack.package_type='1' AND epin.generatedid='$admin' AND pack.package_id=epin.package_id  ORDER BY epin.id ASC";
$msgres = mysqli_query($con,$msgsql);
}else {
  $admin="admin";
   $msgsql = "select * from `e-pin` as epin,`package` as pack WHERE epin.useddate>='$_REQUEST[start_date]' AND epin.useddate<='$_REQUEST[end_date]' AND pack.package_type='1' AND epin.generatedid!='$admin' AND pack.package_id=epin.package_id ORDER BY epin.id ASC";
  $msgres = mysqli_query($con,$msgsql);
}
while($row = mysqli_fetch_array($msgres)) {
$c++;

$srow=$my->total_row($con,member,spid,$row[memberusedid]);

// $sre="SELECT * FROM `package` WHERE `package_id`='$row[package_id]'";
// $ret=mysqli_query($con,$sre);
// $des=mysqli_fetch_array($ret);
//
// $dt1=explode("-",$row[topup_dt]);
// $dt2=$dt1[2]."-".$dt1[1]."-".$dt1[0];

$tot=$tot+$row[package_amount];

?>
<tr>
<td style='font-size:13px;border:1px solid black;'><?=$c?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$srow['sname']?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$row[pin]?></td>

<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$srow[state]?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$srow[addr]?></td>
<!-- <td style='font-size:13px;border:1px solid black;text-transform:uppercase'></td> -->
<!-- <td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$srow[city]?></td> -->
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$srow[pincode]?></td>
<!-- <td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$srow[email]?></td> -->
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$srow[mob]?></td>
<!-- <td style='font-size:13px;border:1px solid black;text-transform:uppercase'></td> -->
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$srow[spid]?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$row[package_name]?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$row[package_amount]?></td>
</tr>
<?} ?>
<tr>
<td style='font-size:13px;border:1px solid black;'><?=$c?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'>Total</td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'></td>

<td style='font-size:13px;border:1px solid black;text-transform:uppercase'></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'></td>
<!-- <td style='font-size:13px;border:1px solid black;text-transform:uppercase'></td> -->
<!-- <td style='font-size:13px;border:1px solid black;text-transform:uppercase'></td> -->
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'></td>
<!-- <td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$srow[email]?></td> -->
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'></td>
<!-- <td style='font-size:13px;border:1px solid black;text-transform:uppercase'></td> -->
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$tot?></td>
</tr>
</tbody>


</table>


<center> <a style='text-decoration:none;font-size:20px'  href="topup_search_by.php">BACK</a> </center>

</div>

</div>
</div>

</div>


</div>


<script type="text/javascript">
$( document ).ready(function() {
$('#employee_grid').DataTable({
"processing": true,
"dom": 'lBfrtip',
"buttons": [
{
extend: 'collection',
text: 'Export',
buttons: [
'excel',
'csv',
'pdf',
'print'
]
}
]
});
});
</script>
</body>
</html>
