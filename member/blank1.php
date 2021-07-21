<?
include("include/top.php");
include("include/menu.php");
// error_reporting(0);
session_start();
$radio = $_SESSION['radio'];
// echo "<pre>";
// print_r($radio);
// echo "</pre>";

foreach($_SESSION['radio'] as $a => $b)
{
  // echo "x  ".$x++;
$sql3 = "SELECT * FROM `savequestion` WHERE `spid`='$_SESSION[spid]' AND `st`='0'";
$res3 = mysqli_query($con,$sql3);
$row3 = mysqli_fetch_array($res3);
// {
$sql4 = "SELECT * FROM `answer` WHERE `question_id`='$row3[question_id]'";
  $res4 = mysqli_query($con,$sql4);
  $row4 = mysqli_fetch_array($res4);
  // echo "<br>".$a. "   cst-->".$row4[correct_st];


   if($b==$row4[correct_st])
   {
     $c++;

     $sql6 = "SELECT * FROM `question` WHERE `question_id`='$row3[question_id]'";
     $res6 = mysqli_query($con,$sql6);
     $row6 = mysqli_fetch_array($res6);
     // {

       $amt = $row6[amount];
       $credit = $row6[number];
       $sql7 = "INSERT INTO `qrank`(`rank_id`, `spid`, `sname`,`question_id`, `credit`, `price`) VALUES ('','$_SESSION[spid]','$_SESSION[sname]','$row3[question_id]','$credit','$amt')";
       $res7 = mysqli_query($con,$sql7);
      //
      // echo "<br>hi".$a."   row".$row4[correct_st];

     // }
   }

   // echo "<br><br>paysql1 ".$paysql = "UPDATE `savequestion` SET `st`='1' WHERE `spid`='$_SESSION[spid]'";
   // mysqli_query($con,$paysql);

// $nurl = "dashboard.php";
// echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$nurl.'">';
// }
}

// ---------------rank table-----------------------------

// echo "<br><br>sql8 ".$sql8 = "SELECT spid,sname,SUM(credit) AS wcredit FROM `qrank` WHERE `st`='0' GROUP BY `spid` ORDER BY SUM(credit) DESC";
// $res8 = mysqli_query($con,$sql8);
// while($row8 = mysqli_fetch_array($res8))
// {
//
// echo "<br><br>sql9 ".$sql9 = "SELECT * FROM `rank` WHERE `spid`='$$_SESSION[spid]' AND `st`='0'";
// $res9 = mysqli_query($con,$sql9);
// $row9 = mysqli_num_rows($res9);
// if($row9==0)
// {
  // $c++;
  //
  // echo "<br><br>sql1 ".$sql11 = "INSERT INTO `rank`(`Rank_id`, `Rank_Type`, `spid`, `st`, `sname`, `credit`) VALUES ('','$c','$_SESSION[spid]','0','$row8[sname]','$row8[wcredit]')";
  //  mysqli_query($con,$sql11);
 // }


// }
// else {
// $sql112 = "UPDATE `rank` SET `credit`='$row8[wcredit]' WHERE `spid`='$_SESSION[spid]' AND `st`='0'";
// mysqli_query($con,$sql112);
// }

// echo"<pre>";
// print_r($_POST);
// echo"</pre>";

// if ($_POST[hidden]!="") {

   // $spid = $_SESSION[spid];
   //  echo "<br><br>paysql1".$paysql1 = "INSERT INTO `pay`(`pay_id`, `spid`, `st`) VALUES ('','$spid','0')";
    // mysqli_query($con,$paysql1);

?>
<body onload="myFunction()">
 <div id="content-panel">
 <div class="container-fluid">

 <div class="row">
     <div class="col-xs-12 dashboard-header">
     <!-- <h1 class="dash-title">Registration</h1> -->
     <!-- //////////////////////////////////////////////////// Breadcrumb -->
         <!-- <ol class="breadcrumb">
           <li><a href="current_ewallet_status.php?m=5"><i class="fa fa-home" aria-hidden="true"></i> Registration</a></li>
           <li><a href="current_ewallet_status.php?m=5" class="active">Join Now</a></li>
         </ol> <!-- /breadcrumb -->

     </div> <!-- /dashboard -->
 </div> <!-- /row -->
 <!-- //////////////////////////////////////////////////// Work Shift Master -->
 <div class="row">

     <div class="col-md-12 col-sm-12 col-xs-12">



         <div class="panel">
 		<br/>

             <div class="panel-heading">
               <center>
                 <p class="text-muted">
                      <br>
                    <b style="font-size:25px;">Your quiz has been successfully Submitted, <br><br>Best of luck !!!!</b>
 				</p></center>
             </div> <!-- /panel-heading -->
             <div class="panel-body m-t-0">

  <!-- /form-horizontal -->
             </div>


 			<!-- /panel-body -->
         </div> <!-- /panel-->
     </div> <!-- /col -->
 </div> <!-- /row -->
</body>
<script>
  function myFunction()
  {
    alert("Submitted Succesfully");

  }
</script>
<!-- <?unset($radio);?> -->
<?php include("include/footer.php"); ?>
 
