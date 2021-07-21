<?php
session_start();
error_reporting(0);
include("include/top.php");
include("include/menu.php");



//
// $date=date("Y-m-d");
// if($_POST[login_submit]!=""){
//
// $sql="INSERT INTO `member_message`(`spid`,`message`,`date`)VALUES('$_SESSION[spid]','$_POST[message]','$date')";
// $res=mysqli_query($con,$sql);
// if($res){
// header("location:compose_messages.php?msg=Sucessfully Submitted&m=3.");
//  }
// }



?>
<!-- //////////////////////////////////////////////////// Content-Panel div -->

<script type="text/javascript">



</script>
<script type="text/javascript">
function validate_form(form){
if( form.elements['start_date'].value=="" ) { alert("Please type Start Date"); form.elements['start_date'].focus(); return false; }
if( form.elements['end_date'].value=="" ) { alert("Please type End Date"); form.elements['end_date'].focus(); return false; }
}
</script>

<div id="content-panel">
<div class="container-fluid">

<div class="row">
    <div class="col-xs-12 dashboard-header">
    <h1 class="dash-title">Compose Messages</h1>
    <!-- //////////////////////////////////////////////////// Breadcrumb -->
        <ol class="breadcrumb">
          <li><a href="dashboard.php"><i class="fa fa-home" aria-hidden="true"></i> select date</a></li>
          <!-- <li><a href="compose_messages.php?m=3" class="active">select date</a></li> -->
        </ol> <!-- /breadcrumb -->

    </div> <!-- /dashboard -->
</div> <!-- /row -->
<!-- //////////////////////////////////////////////////// Work Shift Master -->
<div class="row">



    <div class="col-md-12 col-sm-12 col-xs-12">



        <div class="panel">
		<br/>

            <div class="panel-heading">
                <h3>Compose Messages</h3>
                <p class="text-muted"></p>
            </div> <!-- /panel-heading -->
            <div class="panel-body m-t-0">
            <form  class="col-sm-6"  action="show_business_details_member.php" method="post" onsubmit="return validate_form1(this)">
              <div class="form-group" >
              <label>Start Date</label>
              <input type="text" name="start_date"  id="start_date" value='' class="form-control" size="20" readonly  />
              <span id="cal3">&nbsp;<img src="calendar.jpg" style="cursor:pointer;" border="0" /></span>
              <script type="text/javascript">
              var cal = new Zapatec.Calendar.setup({

              inputField:"start_date",
              ifFormat:"%Y-%m-%d",
              button:"cal3",
              showsTime:false

              });

              </script>
              </div>


              <!-- <div class="form-group">
              <label>Start Date</label>
              <input type="text" name="start_date"  id="start_date" value='<?=$find_date?>' class="form-control" size="20" readonly  />
              </div> -->


              <div class="form-group">
              <label>End Date</label>
              <input type="text" name="end_date"  id="end_date" value='' class="form-control" size="20" readonly  />
              <span id="cal4">&nbsp;<img src="calendar.jpg" style="cursor:pointer;" border="0" /></span>
              <script type="text/javascript">
              var cal1 = new Zapatec.Calendar.setup({

              inputField:"end_date",
              ifFormat:"%Y-%m-%d",
              button:"cal4",
              showsTime:false

              });

              </script>


              </div>




            <!-- <div class="form-group">
                <label for="name2" class="col-sm-2 control-label">Messages</label>
                <div class="col-sm-10"><textarea name="message" class="form-control"  id="message" rows="5" cols="36"></textarea></div>
            </div> -->



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
