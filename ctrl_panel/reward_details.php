<?php
ob_start();
error_reporting(0);
include_once("lib_panel/config.php");



?>

<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Reward Report Till Date</title>
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
<h1>Reward Report Till Date</h1>

<div class="">
<div id="employee_grid_wrapper" class="dataTables_wrapper">

<table id="employee_grid" class="display dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="employee_grid_info" style="width: 100%;">
<thead>
<tr role="row">
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Sr</td>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Member ID</th>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Member</th>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Reward</th>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Date</th>
</tr>
</thead>


<tbody>



<? 
$sel1 = "select * from `reward_generation` WHERE `reward_id`!='0' ORDER BY `rd_id` DESC";
$res_pay = mysqli_query($con,$sel1);
while($row_pay = mysqli_fetch_array($res_pay)) { 
$c++;

$srow=$my->total_row($con,member,spid,$row_pay[spid]);

$sql="SELECT * FROM `reward_select` WHERE `reward_id`='$row_pay[reward_id]'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);

if($row[reward_id]!=""){

?>
<tr>
<td style='font-size:13px;border:1px solid black;'><?=$c?>.</td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$srow[spid]?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$srow['sname']?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$row[prize]?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$row_pay[reward_date]?></td>
</tr>	
<?}} ?>



</tbody>


</table>


<center> <a style='text-decoration:none;font-size:20px'  href="show_all_reward.php">BACK</a> </center>

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

