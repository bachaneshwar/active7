<?php 
include("include/top.php");
include("include/menu.php");
?>
<!-- //////////////////////////////////////////////////// Content-Panel div -->

<div id="content-panel">
<div class="container-fluid">

<div class="row">
    <div class="col-xs-12 dashboard-header">
    <h1 class="dash-title">Inbox</h1>
    <!-- //////////////////////////////////////////////////// Breadcrumb -->
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Messages</a></li>
          <li><a href="#" class="active">Inbox</a></li>
        </ol> <!-- /breadcrumb -->
    </div> <!-- /dashboard -->
</div> <!-- /row -->


<div class="row">
    
    <!-- //////////////////////////////////////////////////// Responsvie Table Bordered -->
    <div class=" col-xs-12">
        <div class="panel">
            <div class="panel-heading">
                <h3>Inbox</h3>
            </div> <!-- /panel-heading -->
            <div class="panel-body m-t-0">
            <div class="table-responsive">
            <table class="table table-bordered"> 
            <thead> 
			
           <tr>
<th scope="col" >Sr.</th>
<th scope="col" >Message Details</th>
<th scope="col" >Message Date</th>
            

        </tr>
            </thead> 
		
<?php
$sq432="UPDATE `company_message` SET `status`='1' WHERE `spid`='$_SESSION[spid]'";
$msg432=mysqli_query($con,$sq432);

$msgsql="SELECT * FROM `company_message` WHERE `spid`='$_SESSION[spid]' ORDER BY  `date` DESC ";
$msgres=mysqli_query($con,$msgsql);
while($msgrow=mysqli_fetch_array($msgres)){
	$c++;
?>
<tr  valign="middle">

           
            <td align="center" ><?=$c?></td>
			<td ><?=$msgrow[message]?></td>
            <td  align="center"><?=$msgrow['date']?></td>
    


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