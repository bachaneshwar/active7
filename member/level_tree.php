<?php 
include("include/top.php");
include("include/menu.php");
?>
<!-- //////////////////////////////////////////////////// Content-Panel div -->

<div id="content-panel">
<div class="container-fluid">

<div class="row">
    <div class="col-xs-12 dashboard-header">
    <h1 class="dash-title">Matrix Tree</h1>
    <!-- //////////////////////////////////////////////////// Breadcrumb -->
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Team View</a></li>
          <li><a href="#" class="active">Matrix Tree</a></li>
        </ol> <!-- /breadcrumb -->
    </div> <!-- /dashboard -->
</div> <!-- /row -->

<?
$vsql1="SELECT * FROM `binary_level` WHERE `spid`='$_SESSION[spid]'";
$vres1=mysqli_query($con,$vsql1);
$vrow1=mysqli_fetch_array($vres1);

$sel_bin_id = "select * FROM `binary_level` where `spid`='$vrow1[spid]'" ;
$res_bin_id = mysqli_query($con,$sel_bin_id) ;
$row_bin_id = mysqli_fetch_array($res_bin_id) ;
$binary     = $row_bin_id[level_binary];
$level      = $row_bin_id[level_level];
?>				
	


<div class="row">
    
    <!-- //////////////////////////////////////////////////// Responsvie Table Bordered -->
    <div class=" col-xs-12">
        <div class="panel">
            <div class="panel-heading">
            </div> <!-- /panel-heading -->
            <div class="panel-body m-t-0">
            <div class="table-responsive">
      
             <table style="width:800px"  border="0" cellpadding="1" cellspacing="1">
<?
$sel_left_calc="Select * from `binary_level` bin,`member` mat WHERE bin.spid=mat.spid AND bin.level_binary LIKE '$binary%'  AND bin.level_level!='$level' GROUP BY bin.level_level ORDER BY bin.level_level ASC";
$res_left_calc = mysqli_query($con,$sel_left_calc) ;
$num_left_calc = mysqli_num_rows($res_left_calc) ;
if($num_left_calc>0){
while($row_left_calc=mysqli_fetch_array($res_left_calc)){

?> 
  <tr>
<td style="border:1px solid #663300;">  
<center>
<a onclick="document.getElementById('div_name<?=$row_left_calc[level_level]?>').style.display='';return false;" href="" 
style="text-decoration:none;font-weight:bold;font-size:13px"> LEVEL  <?=$row_left_calc[level_level]-$level?></a>
</center>

<div id="div_name<?=$row_left_calc[level_level]?>" style="display:none;margin:15px 15px 0px 15px;padding:5px;border:1px solid #aaa;width:900px">

 <table class="table table-bordered"> 
            <thead> 
            <tr> 
<th scope="col" class="rounded" style='text-align:center'>Sr.</th>
<th scope="col" class="rounded" style='text-align:center'>Member Id</th>
<th scope="col" class="rounded" style='text-align:center'>Name</th>
<th scope="col" class="rounded" style='text-align:center'>Sponsor Id</th>
<th scope="col" class="rounded" style='text-align:center'>Parent Id</th>

<th scope="col" class="rounded" style='text-align:center'>DOJ</th>
<th scope="col" class="rounded" style='text-align:center'>Place</th>


            </tr> 
            </thead> 

<?
$vsql2="SELECT * FROM `binary_level` WHERE `level_binary` LIKE '$binary%' AND `level_level`='$row_left_calc[level_level]'";
$vres2=mysqli_query($con,$vsql2);
while($vrow2=mysqli_fetch_array($vres2))
{


$ch++;

$sqll="select * from `member` where `spid`='$vrow2[spid]' ";
$res1=mysqli_query($con,$sqll);
$row1=mysqli_fetch_array($res1);

$sql2="select * from `package` where `package_id`='$row1[package_id]' ";
$res2=mysqli_query($con,$sql2);
$row2=mysqli_fetch_array($res2);



?>
<tr align="center" valign="middle">
<td align="center" style="border:1px solid #663300;font-size:12px;"><?=$ch?></td>
<td style="border:1px solid #663300;font-size:12px;">
<? if($row1[member_status]==0){?> <span style='color:red;font-size:12px;'><?=$vrow2[spid]?></span><? } else { ?><span style='color:green;font-size:12px;'><?=$vrow2[spid]?></span><? } ?>
</td>
<td style="border:1px solid #663300;font-size:12px;"><?=$row1[sname]?></td>
<td style="border:1px solid #663300;font-size:12px;"><?=$row1[sponsorid]?></td>
<td style="border:1px solid #663300;font-size:12px;"><?=$row1[parentspid]?></td>

<td style="border:1px solid #663300;font-size:12px;"><?=$row1[doj]?></td>
<td style="border:1px solid #663300;font-size:12px;"><?=$row1[leg]?></td>

</tr>
<?  }?>

</table>


<center>
<a onclick="document.getElementById('div_name<?=$row_left_calc[level]?>').style.display='none';return false;" href="" 
style="text-decoration:none;font-weight:bold;font-size:14px;color:red">HIDE</a>
</center>
</div>
<br />
<td>
</tr>

<? } } ?>

</table>
            </div> <!-- /table-responsive -->
            </div> <!-- /panel-body -->
        </div> <!-- /panel-->
    </div> <!-- /col -->
</div> <!-- /row -->

<!-- //////////////////////////////////////////////////// Footer -->
<?php include("include/footer.php"); ?>