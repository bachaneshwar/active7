<?php
include("include/top.php");
include("include/menu.php");
?>
<!-- //////////////////////////////////////////////////// Content-Panel div -->

<div id="content-panel">
<div class="container-fluid">

<div class="row">
    <div class="col-xs-12 dashboard-header">
    <h1 class="dash-title">Reward</h1>
    <!-- //////////////////////////////////////////////////// Breadcrumb -->
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Benefit</a></li>
          <li><a href="#" class="active"> Reward</a></li>
        </ol> <!-- /breadcrumb -->
    </div> <!-- /dashboard -->
</div> <!-- /row -->


<div class="row">

    <!-- //////////////////////////////////////////////////// Responsvie Table Bordered -->
    <div class=" col-xs-12">
        <div class="panel">
            <div class="panel-heading">
                <h3> Reward</h3>
            </div> <!-- /panel-heading -->
            <div class="panel-body m-t-0">
            <div class="table-responsive">
            <table class="table table-bordered">
           <tr >

<th >Sr.</th>
<th >PAIR</th>
<th >Prize</th>
<th >Reward Date</th>
<th >Reward</th>
<th >Reward Left PV</th>
<th >Reward Right PV</th>
<th >Left PV</th>
<th >Right PV</th>

</tr>
<?php

$endt="2019-05-24";

$sel_bin_id = "select * FROM `binary_level` where `spid`='$_SESSION[spid]'" ;

$res_bin_id = mysqli_query($con,$sel_bin_id) ;
$row_bin_id = mysqli_fetch_array($res_bin_id) ;
$binary = $row_bin_id[binary];
$level = $row_bin_id[level];


$left_pt = $binary."L" ;
$right_pt = $binary."R" ;





$sel_left_calc="Select SUM(pack.points) from `binary_level` as bin,`member` as mat,`package` as pack,`member_topup` as mtop WHERE bin.spid=mat.spid AND bin.binary LIKE '$left_pt%'  AND mat.member_status='1' AND pack.package_id=mtop.package_id AND mtop.spid=mat.spid AND mat.binary_chk='1'";
$res_left_calc = mysqli_query($con,$sel_left_calc) ;
$num_left_calc = mysqli_fetch_array($res_left_calc) ;
$leftno=$num_left_calc[0];




$sel_right_calc="Select SUM(pack.points) from `binary_level` as bin,`member` as mat,`package` as pack,`member_topup` as mtop WHERE bin.spid=mat.spid AND bin.binary LIKE '$right_pt%'  AND mat.member_status='1' AND pack.package_id=mtop.package_id AND mtop.spid=mat.spid AND mat.binary_chk='1' ";
$res_right_calc = mysqli_query($con,$sel_right_calc) ;
$num_right_calc = mysqli_fetch_array($res_right_calc) ;
$rightno=$num_right_calc[0];


if($leftno==""){$leftno=0;}
if($rightno==""){$rightno=0;}

$sel_left_calc1="Select SUM(pack.points) from `binary_level` as bin,`member` as mat,`package` as pack,`member_topup` as mtop WHERE bin.spid=mat.spid AND bin.binary LIKE '$left_pt%'  AND mat.member_status='1' AND pack.package_id=mtop.package_id AND mtop.spid=mat.spid AND mat.binary_chk='1' and mtop.topup_dt>='$endt' ";
$res_left_calc1= mysqli_query($con,$sel_left_calc1) ;
$num_left_calc1 = mysqli_fetch_array($res_left_calc1) ;
$leftno1=$num_left_calc1[0];




$sel_right_calc1="Select SUM(pack.points) from `binary_level` as bin,`member` as mat,`package` as pack,`member_topup` as mtop WHERE bin.spid=mat.spid AND bin.binary LIKE '$right_pt%'  AND mat.member_status='1' AND pack.package_id=mtop.package_id AND mtop.spid=mat.spid AND mat.binary_chk='1' and mtop.topup_dt>='$endt'";
$res_right_calc1 = mysqli_query($con,$sel_right_calc1) ;
$num_right_calc1 = mysqli_fetch_array($res_right_calc1) ;
$rightno1=$num_right_calc1[0];


if($leftno1==""){$leftno1=0;}
if($rightno1==""){$rightno1=0;}




if($leftno>$rightno){
$pair=$rightno;
}
elseif($rightno>$leftno){
$pair=$leftno;
}
elseif($rightno==$leftno){
$pair=$leftno;
}


$sql9="SELECT * FROM `reward_select` where `level_id`='$_SESSION[rank_id]'";
$res9=mysqli_query($con,$sql9);
while($row9=mysqli_fetch_array($res9)){

    $c++;

$sql7="SELECT * FROM `reward_generation`  WHERE `spid`='$_SESSION[spid]' AND `reward_id`='$row9[reward_id]' AND `st`='1'";
$res7=mysqli_query($con,$sql7);
$row7=mysqli_fetch_array($res7);
$srow1=$my->total_row($con,reward_select,reward_id,$row7[reward_id]);


?>
<tr>
<td  align="center"><?=$c?>.</td>
<td  align="center"><?=$row9[pv]?> PV : <?=$row9[pv]?> PV</td>
<td  align="center"><?=$row9[prize]?></td>

<td  align="center"><?=$row7[reward_date]?></td>
<td  align="center"><?=$srow1[prize]?></td>
<td  align="center"><?=$leftno1?></td>
<td  align="center"><?=$rightno1?></td>
<td  align="center"><?=$leftno?></td>
<td  align="center"><?=$rightno?></td>
</tr>
<?php
}

?>
		</table>
            </div> <!-- /table-responsive -->
            </div> <!-- /panel-body -->
        </div> <!-- /panel-->
    </div> <!-- /col -->
</div> <!-- /row -->

<!-- //////////////////////////////////////////////////// Footer -->
<?php include("include/footer.php"); ?>
