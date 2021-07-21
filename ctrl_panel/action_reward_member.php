<?php
ob_start();
error_reporting(0);
include_once("lib_panel/config.php");


$sql="SELECT * FROM `generate_payout`  WHERE `gen_payout_id`='$_REQUEST[gen_payout_id]'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);

?>

<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Reward Report From <?=$row[start_date]?> To <?=$row[end_date]?></title>
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
<h1>Reward Report From <?=$_POST[start_date]?> To <?=$_POST[end_date]?></h1>

<div class="">
<div id="employee_grid_wrapper" class="dataTables_wrapper">

<table id="employee_grid" class="display dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="employee_grid_info" style="width: 100%;">
<thead>
<tr role="row">

<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Sr</td>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Member ID</th>
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Member</th>

<!-- <th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Binary</th> -->
<!-- <th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Reward Name</th> -->
<th style='font-size:13px;border:1px solid black;font-weight:bold;text-align:center'>Achive Date</th>


</tr>
</thead>


<tbody>
<?

 $sel1="select * from `member`  WHERE `doj`>='$_POST[start_date]' AND `doj`<='$_POST[end_date]' AND `st`='1' AND `member_status`='1' ORDER BY `memid` ASC";
$res_pay = mysqli_query($con,$sel1);
while($row11 = mysqli_fetch_array($res_pay)) {
 $c++;


$sel_bin = "select * from `binary_level` where `spid`='$row11[spid]'" ;
$res_bin = mysqli_query($con,$sel_bin);
$num_bin = mysqli_num_rows($res_bin);
$row112 = mysqli_fetch_array($res_bin);
$id =$row112[spid];


/*Left Right calculation start*/
 $sel_bin_id = "select `binary` from `binary_level` where `spid`='$id'" ;
$res_bin_id = mysqli_query($con,$sel_bin_id) ;
$row_bin_id = mysqli_fetch_array($res_bin_id) ;
//print_r($row_bin_id) ;
$left_pt = $row_bin_id[0]."L" ;
$sel_left_calc = "select * from `binary_level` where `binary` LIKE '$left_pt%'" ;
$res_left_calc = mysqli_query($con,$sel_left_calc) ;
$num_left_calc = mysqli_num_rows($res_left_calc) ;
$leftno = $num_left_calc ;

$right_pt = $row_bin_id[0]."R" ;
$sel_right_calc = "select * from `binary_level` where `binary` LIKE '$right_pt%'" ;
$res_right_calc = mysqli_query($con,$sel_right_calc) ;
$num_right_calc = mysqli_num_rows($res_right_calc) ;
$rightno = $num_right_calc ;


$strong_pt = $row_bin_id[0]."M" ;
$sel_strong_calc = "select * from `binary_level` where `binary` LIKE '$strong_pt%'" ;
$res_strong_calc = mysqli_query($con,$sel_strong_calc) ;
$num_strong_calc = mysqli_num_rows($res_strong_calc) ;
 $strongno = $num_strong_calc ;
// echo "spid".$id;
// echo "<br>";
 $total_tree=$leftno+$rightno+$strongno;
// echo "</br>";
// echo "level".$row112[level];
// echo "</br>";





//
//
//
//
//
 $sq4="SELECT * FROM `member` WHERE `spid`='$id'";
$res_q11 = mysqli_query($con,$sq4);
 // $total_member= mysqli_num_rows($res_q11);
//


 // echo $level_achive[total_member];
if ($total_tree>=39 OR $total_tree>=3279) {
// if ($total_tree>=3 OR $total_tree>=7) {
$res44 = mysqli_fetch_array($res_q11);
// echo $res44[sponsorid];
// echo $res44[sponsorid];
// echo "<br>";
// echo$res44[spid];
// echo "<br>";

// $binary_income+=$row8[0];
// $level_income+=$row8[1];
// $referral_income+=$row8[2];
// $td+=$row8[3];
// $sc_amount+=$row8[4];
// $total_amt+=$row8[5];

?>
<tr>

<td style='font-size:13px;border:1px solid black;'><?= $c;?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$res44[spid]; ?></td>
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$res44[sname]; ?></td>
<!-- <td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$binary_income?></td> -->
<!-- <td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$level_achive[level];?></td> -->
<td style='font-size:13px;border:1px solid black;text-transform:uppercase'><?=$res44[doj];?></td>


</tr>
<?} }?>


</tbody>


</table>


<center> <a style='text-decoration:none;font-size:20px'  href="reward_member.php">BACK</a> </center>

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
