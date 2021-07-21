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


<script type="text/javascript">
function validate_form(form){
if ( ( form.leg[0].checked == false ) && ( form.leg[1].checked == false ) ) { alert ( "Please choose Left or Right Placement" ); return false; } 
if( form.elements['start_date'].value=="" ) { alert("Please Seclect Starting Date");form.elements['start_date'].focus();return false;}
if( form.elements['end_date'].value=="" ) { alert("Please Seclect Ending Date");form.elements['end_date'].focus();return false;}
}
</script>
<script language="javascript" type="text/javascript" src="datetimepicker.js"></script>


<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="header-icon"><i class="glyphicon glyphicon-pawn"></i></div>
<div class="header-title">
<h1>Team View</h1>
<small></small>
</div>
</section>	

<!-- Main content -->
<section class="content">
<div class="row">
<!-- Form controls -->
<div class="col-sm-12">
<div class="panel panel-bd lobidrag">
<div style="padding:10px;color: #010611;background-color: #e8f1f3;border-color: #b7b9bf;position: relative;">
<div class="btn-group" id="buttonlist"> 
<i class="fa fa-list"></i>TopUp Left Right Details
</div>
</div>




<div class="panel-body">

			
	
        <div class="panel">
		<br/>

 <!-- /panel-heading -->
            <div class="panel-body m-t-0">
            <form class="form-horizontal"  action="" method="post" onsubmit="return validate_form(this)">
            
		

	      <table class="table table-bordered"> 
		  
      
<tr>
<td>Member ID</td>
<td><input type="text" class="form-control" name="spid" style="width:200px" required /></td>

</tr>	

<tr>
<td>Placement <span style="color:#ff0000">*</span></td>
<td>
<input type="radio" name="leg" id="leg" value="L"   /> L  &nbsp;&nbsp;
<input type="radio" name="leg" id="leg" value="R"   /> R  &nbsp;&nbsp;
</td>
</tr>

<tr>

<td>Type <span style="color:#ff0000"></span></td>
<td>
<input type="radio" name="type" id="type" value="1" checked /> Binary Member  &nbsp;&nbsp;
<input type="radio" name="type" id="type" value="0" /> Sponsor Member  &nbsp;&nbsp;
</td>
</tr>


<tr>
<td>Start Date <span style="color:#ff0000">*</span></td>
<td>
<input type="Text" id="start_date" name="start_date" maxlength="25" size="25" readonly ><a href="javascript:NewCal('start_date','ddmmyyyy')">
<img src="cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>
</td>
</tr>

<tr>
<td>End Date <span style="color:#ff0000">*</span></td>
<td>
<input type="Text" id="end_date" name="end_date" maxlength="25" size="25" readonly><a href="javascript:NewCal('end_date','ddmmyyyy')">
<img src="cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>
</td>
</tr>




<tr>
	<td colspan="2"><br></td>
</tr>

</table>

          <!-- /form-group -->


            <div class="col-sm-offset-2 col-sm-10 no-padding">
              <center>  <input type="submit" name='login_submit' class="btn btn-md bg-purple"/> </center>
            </div> <!-- /col -->

            </form> <!-- /form-horizontal -->
            </div> 
			
<?
if($_REQUEST[start_date]!=""){


if($_REQUEST[leg]=="L"){
$placement="Left Side";
}

if($_REQUEST[leg]=="R"){
$placement="Right Side";
}
?>			

<div class="panel-body m-t-0">


            <div class="table-responsive">

			<center><h4><?=$_POST[spid]?>'s <?=$placement?> Member Details (From <?=$_REQUEST[start_date]?> To <?=$_REQUEST[end_date]?>) </h4></center>
<br/>
<table class="table table-bordered"> 

 	<tr>
        	<th  scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:15px;color:#000033">No.</th>
            <th  scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:15px;color:#000033">Member ID</th>
            <th  scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:15px;color:#000033">Name</th>
			<th  scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:15px;color:#000033">TopUp Dt</th>
			<th  scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:15px;color:#000033">Sponsor ID</th>
			<th  scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:15px;color:#000033">Parent ID</th>
			<th  scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:15px;color:#000033">Place</th>
			<th  scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:15px;color:#000033">Package</th>
            <th  scope="col" style="background-color:#d8ded8;border:1px solid #663300;font-size:15px;color:#000033">Member Type</th>

        </tr>
<?php
$sel_bin_id = "select `binary` from `binary_level` where `spid`='$_POST[spid]'" ;
$res_bin_id = mysqli_query($con,$sel_bin_id) ;
$row_bin_id = mysqli_fetch_array($res_bin_id) ;

$left_pt = $row_bin_id[0]."L" ;
$right_pt = $row_bin_id[0]."R" ;

if($_REQUEST[leg]=="L"){
$choose=$left_pt;
}

if($_REQUEST[leg]=="R"){
$choose=$right_pt;
}

$exp_dt2=explode(" ",$_REQUEST[start_date]);
$exp_dt1=explode("-",$exp_dt2[0]);
$exp_dt=$exp_dt1[2]."-".$exp_dt1[1]."-".$exp_dt1[0];
$start_date=$exp_dt." ".$exp_dt2[1];

$zexp_dt2=explode(" ",$_REQUEST[end_date]);
$zexp_dt1=explode("-",$zexp_dt2[0]);
$zexp_dt=$zexp_dt1[2]."-".$zexp_dt1[1]."-".$zexp_dt1[0];
$end_date=$zexp_dt." ".$zexp_dt2[1];

$mem_all="SELECT * FROM `member` mem,`binary_level` bin,`member_topup` as mtop,`package` as pack WHERE mem.spid=bin.spid  AND mem.spid=mtop.spid  AND bin.binary LIKE '$choose%' AND mtop.topup_dt>='$start_date' AND mtop.topup_dt<='$end_date'  AND pack.package_id=mtop.package_id AND pack.package_type='1' AND mem.binary_chk = '$_POST[type]' AND mem.member_status='1' ORDER BY mem.memid ASC ";
$rem=mysqli_query($con,$mem_all);
$rem_all=mysqli_query($mem_all);
$num_all = mysqli_num_rows($rem_all) ;
while($niss=mysqli_fetch_array($rem)){
$c++;


if($niss[binary_chk]==1){
$status="Binary Member";
}else{
$status="Sponsor Member";
}
	
 $sre="SELECT * FROM `package` WHERE `package_id`='$niss[package_id]'";
$ret=mysqli_query($con,$sre);
$des=mysqli_fetch_array($ret);	

?>
    <tr>
           
            <td align="center" style="border:1px solid #663300"><?=$c?>.</td>
            <td style="border:1px solid #663300; color:green"><?=$niss[spid]?></td>
            <td style="border:1px solid #663300"><?=$niss[sname]?></td>
            <td style="border:1px solid #663300"><?=$niss[topup_dt]?></td>
			<td style="border:1px solid #663300"><?=$niss[sponsorid]?></td>
            <td style="border:1px solid #663300"><?=$niss[parentspid]?></td>
			<td style="border:1px solid #663300"><center><?=$niss[leg]?></center></td>
			<td style="border:1px solid #663300"><?=$des[package_name]?></td>
            <td style="border:1px solid #663300"><?=$status?></td>

        </tr>
<?php
	}
?>
</table>


</div> 

</div> 
<? } ?>			
			

	
			<!-- /panel-body -->







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