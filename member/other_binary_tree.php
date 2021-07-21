<?php 
include("include/top.php");
include("include/menu.php");


?>
<!-- //////////////////////////////////////////////////// Content-Panel div -->




<div id="content-panel">
<div class="container-fluid">

<div class="row">
    <div class="col-xs-12 dashboard-header">
    <h1 class="dash-title">Team View</h1>
    <!-- //////////////////////////////////////////////////// Breadcrumb -->
        <ol class="breadcrumb">
          <li><a href="dashboard.php"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a></li>
          <li><a href="other_binary_tree.php?m=2" class="active">Other Tree Details</a></li>
        </ol> <!-- /breadcrumb -->
        
    </div> <!-- /dashboard -->
</div> <!-- /row -->
<!-- //////////////////////////////////////////////////// Work Shift Master -->
<div class="row">

	

    <div class="col-md-12 col-sm-12 col-xs-12">
	
	

        <div class="panel">
		<br/>

 <!-- /panel-heading -->
            <div class="panel-body m-t-0">
            <form class="form-horizontal"  action="other_genealogy.php" method="post" onsubmit="return validate_form1(this)">
            
		

			
 

		   <div class="form-group">
                <label for="name2" class="col-sm-2 control-label">Tree Type</label>
                <div class="col-sm-10">
				<select class="form-control" name="tree_id" id="tree_id" style="width:300px" required>
				<option value="">Select Tree Type</option>
				<option value="1">Global Tree</option>
				<option value="2">One India One Tree</option>
				</select>
				
				</div>
            </div> 

          <!-- /form-group -->


            <div class="col-sm-offset-2 col-sm-10 no-padding">
                <input type="submit" name='login_submit' class="btn btn-md bg-purple"/>
            </div> <!-- /col -->

            </form> <!-- /form-horizontal -->
            </div> 
			
			
			

	
			<!-- /panel-body -->
        </div> <!-- /panel-->
    </div> <!-- /col -->
</div> <!-- /row -->

<?php include("include/footer.php"); ?>