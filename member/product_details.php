<?php 
include("include/top.php");
include("include/menu.php");
?>
<!-- //////////////////////////////////////////////////// Content-Panel div -->

<div id="content-panel">
<div class="container-fluid">

<div class="row">
    <div class="col-xs-12 dashboard-header">
    <h1 class="dash-title">Product</h1>
    <!-- //////////////////////////////////////////////////// Breadcrumb -->
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Product</a></li>
          <li><a href="#" class="active">Details</a></li>
        </ol> <!-- /breadcrumb -->
    </div> <!-- /dashboard -->
</div> <!-- /row -->


<div class="row">
    
    <!-- //////////////////////////////////////////////////// Responsvie Table Bordered -->
    <div class=" col-xs-12">
        <div class="panel">
            <div class="panel-heading">
                <h3>Product</h3>
            </div> <!-- /panel-heading -->
            <div class="panel-body m-t-0">
            <div class="table-responsive">
            <table class="table table-bordered"> 
            <thead> 
			
           <tr>
<th scope="col" >Sr.</th>
<th scope="col">Package</th>
<th scope="col">Amount</th>
<th scope="col">PV</th>
<th scope="col"></th>
            

        </tr>
            </thead> 
		
<?php
$msgsql="SELECT * FROM `package`  WHERE `st`='1' ORDER BY  `package_id` ASC";
$msgres=mysqli_query($con,$msgsql);
while($msgrow=mysqli_fetch_array($msgres)){
$c++;
?>
<tr  valign="middle">

<td><?=$c?></td>

<td><?=$msgrow[package_name]?></td>
<td><?=$msgrow[package_amount]?></td>
<td><?=$msgrow[points]?></td>
<td><? if($msgrow[package_image]!=""){?><img src="../<?=$msgrow[package_image]?>" style="width:200px;" /><?}?></td>


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