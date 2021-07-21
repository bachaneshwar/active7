<?
include_once("lib_panel/config.php");
include("include/loginchk.php");
ob_start();


$log_url=end(explode("/","$_SERVER[PHP_SELF]"));
$dtls_link=$my->total_row($con,sublink,sub_url,$log_url);



if(time() - $_SESSION['timestamp'] > 3600) { //subtract new timestamp from the old one

echo "<script>alert('30 minutes over');</script>";
unset($_SESSION[indi_cpanel]);
unset($_SESSION[login_type]);
unset($_SESSION[userid]);
unset($_SESSION[employee_id]);
unset($_SESSION[timestamp]);
session_destroy();
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?msg=Login First">';     
exit;
} else {
$_SESSION['timestamp'] = time(); //set new timestamp
}



if($_SESSION[login_type]=="Employee"){
if($log_url!="dashboard.php" && $log_url!="changepass1.php"){
$vsqlnum="SELECT * FROM `sublink` as sln,`authenticate_status` as auth WHERE auth.sublink_id=sln.sublink_id AND auth.employee_id='$_SESSION[employee_id]' AND auth.authen_status='1' AND sln.sublink_id='$_REQUEST[lid]'";
$vresnum=mysqli_query($con,$vsqlnum);
$vnum_status=mysqli_num_rows($vresnum);
$vnum_row=mysqli_fetch_array($vresnum);
if($vnum_status==0){
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=dashboard.php?m=0">';     
}
$edit_status=$vnum_row[edit_status];
}
}






$sel_sp1 = "select * from `company_details`" ;
$res_sp1 = mysqli_query($con,$sel_sp1) ;
$row_sp1 = mysqli_fetch_array($res_sp1);

?>



<head>

      <meta charset="utf-8">

      <meta http-equiv="X-UA-Compatible" content="IE=edge">

      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>ADMIN PANEL</title>

      <!-- Favicon and touch icons -->

      <link rel="shortcut icon" href="assets/dist/img/ico/favicon.png" type="image/x-icon">

      <!-- Start Global Mandatory Style

         =====================================================================-->

      <!-- jquery-ui css -->

      <link href="assets/plugins/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css"/>

      <!-- Bootstrap -->
<link rel="stylesheet" href="assets/chosen/chosen.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
             <script src="assets/chosen/chosen.jquery.min.js"></script>
      <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<!-- <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script> -->
      <!-- Bootstrap rtl -->

      <!--<link href="assets/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->

      <!-- Lobipanel css -->

      <link href="assets/plugins/lobipanel/lobipanel.min.css" rel="stylesheet" type="text/css"/>

      <!-- Pace css -->

      <link href="assets/plugins/pace/flash.css" rel="stylesheet" type="text/css"/>

      <!-- Font Awesome -->

      <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

      <!-- Pe-icon -->

      <link href="assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css"/>

      <!-- Themify icons -->

      <link href="assets/themify-icons/themify-icons.css" rel="stylesheet" type="text/css"/>

      <!-- End Global Mandatory Style

         =====================================================================-->

      <!-- Start page Label Plugins 

         =====================================================================-->

      <!-- Emojionearea -->

      <link href="assets/plugins/emojionearea/emojionearea.min.css" rel="stylesheet" type="text/css"/>

      <!-- Monthly css -->

      <link href="assets/plugins/monthly/monthly.css" rel="stylesheet" type="text/css"/>

      <!-- End page Label Plugins 

         =====================================================================-->

      <!-- Start Theme Layout Style

         =====================================================================-->

      <!-- Theme style -->

      <link href="assets/dist/css/stylecrm.css" rel="stylesheet" type="text/css"/>

      <!-- Theme style rtl -->

      <!--<link href="assets/dist/css/stylecrm-rtl.css" rel="stylesheet" type="text/css"/>-->

      <!-- End Theme Layout Style

         =====================================================================-->

  

 <!-- calender -->

  <script type='text/javascript' src="zpcal/utils/zapatec.js"></script>

<!-- Custom includes -->  

<!-- import the calendar script -->

<script type="text/javascript" src="zpcal/src/calendar.js"></script>

<!-- import the language module -->

<script type="text/javascript" src="zpcal/lang/calendar-en.js"></script>

<!-- other languages might be available in the lang directory; please check

your distribution archive. -->

<!-- ALL demos need these css -->

<link href="zpcal/website/css/zpcal.css" rel="stylesheet" type="text/css">

<!--<link href="zpcal/website/css/template.css" rel="stylesheet" type="text/css">-->

<link href="zpcal/themes/aqua.css" rel="stylesheet" type="text/css">

<script language="javascript" src="js/validation.js"></script>

  <!-- end calender -->


  





<script language="javascript" type="text/javascript" src="ajax.js"></script>                 
<script language="javascript" type="text/javascript" src="newajax.js"></script>       

   

</head>