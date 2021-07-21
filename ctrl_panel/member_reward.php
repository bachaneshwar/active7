<?php
ob_start();
error_reporting(0);
include_once("lib_panel/config.php");


$spid=$_POST[spid];
$sel_sp = "select * from `member` WHERE `spid`='$spid'" ;
$res_sp = mysqli_query($con,$sel_sp) ;
$row_sp = mysqli_fetch_array($res_sp);
$date=date("Y-m-d");


$sql="SELECT * FROM `reward_generation`  WHERE `spid`='$spid' AND `endt`='$_POST[endt]'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);
// print $row[reward_id];

// $srow=$my->total_row($con,member,spid,$row_pay[spid]);

$srow1=$my->total_row($con,reward_select,reward_id,$row[reward_id]);

	if($_POST[endt]==$row[endt]){





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
<h1>Reward Report <?=$row[endt]?> of <?=$row_sp[spid]?></h1>

<div class="">
<div id="employee_grid_wrapper" class="dataTables_wrapper">
<form action="" method="post">


<!-- <center>
<input type="submit" name="payment_submit" style='text-transform:uppercase;font-size:18px' value="Payment" />
<br/>
</center> -->
<table  class="display dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="employee_grid_info" style="width: 100%;">
<thead>
<tr role="row">


<!-- <th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Sr</td> -->
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Member ID</th>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Member</th>


<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>End Date</th>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Prize</th>
<!-- <th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Net Amount</th>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Status</th>
 -->
</tr>
</thead>


<tbody>

<tr>
	

<!-- <td style='font-size:13px;border:1px solid black;'><?=$c?>.</td> -->
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$row[spid]?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$row_sp['sname']?></td>
<!-- <td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$row_pay[stdt]?></td> -->

<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$row[endt]?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$srow1[prize]?></td>
<!-- <td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$row_pay[total_amt]?></td> -->
<!-- <td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$status?></td> -->
</tr>	

<?php
}
else{
	header("location:show_reward2.php");
}
?>

</tbody>


</table>
<input type="hidden" name="stdt" value="<?=$row[stdt]?>" readonly />
<input type="hidden" name="endt" value="<?=$row[endt]?>"   readonly />
</form>

<center> <a style='text-decoration:none;font-size:20px' href="show_reward2.php">BACK</a> </center>

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

