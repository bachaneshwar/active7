<?php
include("include/top.php");
include("include/menu.php");
?>
<!-- //////////////////////////////////////////////////// Content-Panel div -->

<div id="content-panel">
<div class="container-fluid">

<div class="row">
    <div class="col-xs-12 dashboard-header">
    <h1 class="dash-title">Sponsor Pair</h1>
    <!-- //////////////////////////////////////////////////// Breadcrumb -->
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Team View</a></li>
          <li><a href="#" class="active">Sponsor Pair</a></li>
        </ol> <!-- /breadcrumb -->
    </div> <!-- /dashboard -->
</div> <!-- /row -->


<div class="row">

    <!-- //////////////////////////////////////////////////// Responsvie Table Bordered -->
    <div class=" col-xs-12">
        <div class="panel">
            <div class="panel-heading">
            </div> <!-- /panel-heading -->
            <div class="panel-body m-t-0">
            <div class="table-responsive">
            <table class="table table-bordered">
            <thead>
            <tr>
                <th>Sr.</th>
                <th>Package</th>
                <th>Left</th>
				<th>Right</th>


            </tr>
            </thead>
                <tbody>
<?php
// $sql="SELECT * FROM `member_sponsor` as mspon,`package` as pack  WHERE mspon.spid='$_SESSION[spid]' and mspon.package_id=pack.package_id group by pack.package_group";


// $sql1="SELECT SUM(left_side),SUM(right_side) FROM `member_sponsor` as mspon,`package` as pack WHERE mspon.spid='$_SESSION[spid]'
// AND mspon.package_id=pack.package_id AND pack.package_group='$sql_row[package_group]' GROUP BY pack.package_group ";
// print "  spid=".$_SESSION[spid];
// print "<br>    ";
 $sql1="SELECT SUM(left_side),SUM(right_side),pack.package_group  FROM `member_sponsor` as mspon,`package` as pack WHERE mspon.spid='$_SESSION[spid]' AND mspon.package_id=pack.package_id GROUP BY pack.package_group ";
$res=mysqli_query($con,$sql1);
while($row=mysqli_fetch_array($res)
){
$cl++;

// print "  l=".
$left_side=$row[0];
// print "right=".
//
$right_side=$row[1];
//
// print "  group=".$row[2];
// // $sre="SELECT * FROM `package` WHERE `package_id`='$row[package_id]'";
// // $ret=mysqli_query($con,$sre);
// // $des=mysqli_fetch_array($ret);
// // pack_group
$sre="SELECT * FROM `pack_group` WHERE `id`='$row[2]'";
$ret=mysqli_query($con,$sre);
$des=mysqli_fetch_array($ret);

?>
                <tr>
                <th scope="row"><?=$cl?></th>
                   <td><?=$des[name]?></td>
                    <td><?=$left_side?></td>
                    <td><?=$right_side?></td>
                </tr>
<?php
}
?>
                </tbody>
            </table>
            </div> <!-- /table-responsive -->
            </div> <!-- /panel-body -->
        </div> <!-- /panel-->
    </div> <!-- /col -->
</div> <!-- /row -->

<!-- //////////////////////////////////////////////////// Footer -->
<?php include("include/footer.php"); ?>
