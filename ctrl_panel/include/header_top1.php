<?
ob_start();
include_once("lib_panel/config.php");
include("include/loginchk.php");




if(time() - $_SESSION['timestamp'] > 3600) { //subtract new timestamp from the old one

echo "<script>alert('30 minutes over');</script>";
unset($_SESSION[tarctrl_cpanel]);
unset($_SESSION[login_type]);
unset($_SESSION[userid]);
unset($_SESSION[employee_id]);
unset($_SESSION[timestamp]);
session_destroy();
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';	
} else {
$_SESSION['timestamp'] = time(); //set new timestamp
}


$log_url=end(explode("/","$_SERVER[PHP_SELF]"));
$dtls_link=$my->total_row($con,sublink,sub_url,$log_url);





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
      <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
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

<script type="text/javascript">
function keyRestrict(e, validchars) {
var key='', keychar='';
key = getKeyCode(e);
if (key == null) return true;
keychar = String.fromCharCode(key);
keychar = keychar.toLowerCase();
validchars = validchars.toLowerCase();
if (validchars.indexOf(keychar) != -1)
return true;
if ( key==null || key==0 || key==8 || key==9 || key==13 || key==27 )
return true;
return false;
}
function getKeyCode(e) {
if (window.event)
return window.event.keyCode;
else if (e)
return e.which;
else
return null;
}
</script>  
	



<script src="newajax.js"></script>      	
	 
</head>