<?php

ob_start();

error_reporting(0);

include_once("lib_panel/config.php");



if($_POST[period]==1){

$first_date=$_POST[year]."-04-01";

$end_date=$_POST[year]."-06-30";

$quarter="1st Quarter";

}

if($_POST[period]==2){

$first_date=$_POST[year]."-07-01";

$end_date=$_POST[year]."-09-30";

$quarter="2nd Quarter";

}

if($_POST[period]==3){

$first_date=$_POST[year]."-10-01";

$end_date=$_POST[year]."-12-31";

$quarter="3rd Quarter";

}

if($_POST[period]==4){

$futureyr=($_POST[year]+1);

$first_date=$_POST[year]."-01-01";

$end_date=$futureyr."-03-31";

$quarter="4th Quarter";

}







$employee_dtls=$my->total_row($con,employee,employee_code,$_POST[employee_code]);





if($_SESSION[employee_id]!=""){

$emp_dtls=$my->total_row($con,employee,employee_id,$_SESSION[employee_id]);

$gen_details=$emp_dtls[employee_name];

}else{

$gen_details="Chief Admim";

}



?>



<!DOCTYPE html>

<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title><?=$employee_dtls['employee_name']?> TDS of <?=$quarter?></title>

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

<h1><?=$employee_dtls['employee_name']?> TDS of <?=$quarter?></h1>



<div class="">

<div id="employee_grid_wrapper" class="dataTables_wrapper">



<table id="employee_grid" class="display dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="employee_grid_info" style="width: 100%;">

<thead>

<tr role="row">

<th style='font-size:12px;border:1px solid black;font-weight:bold;text-align:center'>Sr</td>

<th style='font-size:12px;border:1px solid black;font-weight:bold;text-align:center'>Period</td>

<th style='font-size:12px;border:1px solid black;font-weight:bold;text-align:center'>TDS</td>

</tr>

</thead>





<tbody>







<? 



$sel1 = "select * from `employee_salary` where `stdt`>='$first_date' AND `endt`<='$end_date' AND `employee_id`='$employee_dtls[employee_id]' AND `total_amt`!='0' ORDER BY `endt` ASC";

$res_pay = mysqli_query($con,$sel1);

while($row_pay = mysqli_fetch_array($res_pay)) { 

$c++;



$stdt1=explode("-",$row_pay[stdt]);

$stdt=$stdt1[2]."-".$stdt1[1]."-".$stdt1[0];



$endt1=explode("-",$row_pay[endt]);

$endt=$endt1[2]."-".$endt1[1]."-".$endt1[0];



$td+=$row_pay['td'];

?>

<tr>

<td style='font-size:12px;border:1px solid black;'><?=$c?>.</td>

<td style='font-size:12px;border:1px solid black;text-transform:uppercase'><?=$stdt?> To <?=$endt?></td>

<td style='font-size:12px;border:1px solid black;text-transform:uppercase'><?=$row_pay['td']?></td>

</tr>	

<?} ?>



<tr>

<td style='font-size:12px;border:1px solid black;'>Total</td>

<td style='font-size:12px;border:1px solid black;'></td>

<td style='font-size:12px;border:1px solid black;text-transform:uppercase'><?=$td?></td>

</tr>



</tbody>





</table>



<h4>Report Generated By  <?=$gen_details?>	</h4>

<center> <a style='text-decoration:none;font-size:20px'  href="employee_tds.php?lid=<?=$_REQUEST[lid]?>">BACK</a> </center>



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



