<?php
ob_start();
error_reporting(0);
include_once("lib_panel/config.php");


$sql="SELECT * FROM `reward_generation`  WHERE `endt`='$_REQUEST[endt]' GROUP BY `endt`";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);

?>

<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Reward Report From <?=$row[stdt]?> To <?=$row[endt]?></title>
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
<h1>Reward Report From <?=$row[stdt]?> To <?=$row[endt]?></h1>

<div class="">
<div id="employee_grid_wrapper" class="dataTables_wrapper">

<table id="employee_grid" class="display dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="employee_grid_info" style="width: 100%;">
<thead>
<tr role="row">
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Sr</td>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Member ID</th>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Member</th>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Reward</th>
</tr>
</thead>


<tbody>



<? 

$sel1 = "select * from `reward_generation` WHERE `endt`='$_REQUEST[endt]' ORDER BY `rd_id` ASC";
$res_pay = mysqli_query($con,$sel1);
while($row_pay = mysqli_fetch_array($res_pay)) { 
$c++;

$srow=$my->total_row($con,member,spid,$row_pay[spid]);
$srow1=$my->total_row($con,reward_select,reward_id,$row_pay[reward_id]);

?>
<tr>
<td style='font-size:13px;border:1px solid black;'><?=$c?>.</td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$srow[spid]?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$srow['sname']?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$srow1[prize]?></td>
</tr>	
<?} ?>



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

