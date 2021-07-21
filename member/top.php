<?php
ob_start();
session_start();
include_once("../ctrl_panel/lib_panel/config.php");
include("../ctrl_panel/include/function.php");
if($_SESSION[memb]!="wrong")
{
header("location:index.php?msg=You are not avalid user.");
}


date_default_timezone_set("Asia/Calcutta");
$url=end(explode("/",$_SERVER['PHP_SELF']));

$today=date("Y-m-d");
$timestamp = strtotime($today);
$day = date('l', $timestamp);

$aasql="SELECT * FROM `amout_rate` WHERE `id`='1'";
$aares=mysqli_query($con,$aasql);
$aarow=mysqli_fetch_array($aares);

$sql="SELECT * FROM `member` WHERE `spid`='$_SESSION[spid]'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);
$sname=$row[sname];
$doj=$row[doj];
//$sponsor_mem=$row[sponsorid];

$sqlb1="SELECT * FROM `member` WHERE `spid`='$_SESSION[spid]'";
$resb1=mysqli_query($con,$sqlb1);
$rowb1=mysqli_fetch_array($resb1);


$vsql1="SELECT * FROM `binary_level` WHERE `spid`='$_SESSION[spid]'";
$vres1=mysqli_query($con,$vsql1);
$vrow1=mysqli_fetch_array($vres1);

$sqlr11="SELECT * FROM `member_login` WHERE `spid`='$_SESSION[spid]' ORDER BY `member_login_id` DESC LIMIT 1";
$resr11=mysqli_query($con,$sqlr11);
$rowr11=mysqli_fetch_array($resr11);
$new_id1=$rowr11[member_login_id];

$sqlr12="SELECT * FROM `member_login` WHERE `spid`='$_SESSION[spid]' AND `member_login_id`!='$new_id1' ORDER BY `member_login_id` DESC LIMIT 1";
$resr12=mysqli_query($con,$sqlr12);
$numr12=mysqli_num_rows($resr12);
$rowr12=mysqli_fetch_array($resr12);


$sql7m="SELECT * FROM  `ewallet` WHERE `spid`='$_SESSION[spid]'";
$res7m=mysqli_query($con,$sql7m);
$row7m=mysqli_fetch_array($res7m);

/*--------------------------------------------------Investment Benefit--------------------------------------------------*/





$msgsqlx="SELECT * FROM `company_message` WHERE `spid`='$_SESSION[spid]' AND `status`='0'";
$msgresx=mysqli_query($con,$msgsqlx);
$numresx=mysqli_num_rows($msgresx);


$prosql="SELECT * FROM `member_proof` WHERE `spid`='$_SESSION[spid]'";
$prores=mysqli_query($con,$prosql);
$prorow=mysqli_fetch_array($prores);
$pronum=mysqli_num_rows($prores);



$sel_sp1 = "select * from `company_address`" ;
$res_sp1 = mysqli_query($con,$sel_sp1) ;
$row_sp1 = mysqli_fetch_array($res_sp1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="description" content="Admin Template">
    <meta name="author" content="Zwolek">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>
  
   Member Panel</title>

    <!-- Custom Style-->
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <!-- Theme Color Style-->
    <link rel="stylesheet" type="text/css" href="css/theme-purple.css">     
    <!-- Nano Scroller Default Style-->
    <link rel="stylesheet" href="css/nanoscroller.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<!-- //////////////////////////////////////////////////// Header-Panel div -->
<div id="header-panel">
<nav class="navbar navbar-fixed-top">
<div class="container-fluid">
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div id="navbar-header">

      <a class="navbar-brand" style="padding-top: 5px; href="dashboard.php?m=1">
                <span class="logo-text hidden-xs hidden-sm"><img id="imgLogo" src="./Welcome Letter_files/logo.png" style="height:45px;border-width:0px;padding-left: 20px;"></span>
          <span class="logo-img"><!-- logo img <img src="img" alt=""> -->SM</span>
          <!--<span class="logo-text hidden-xs hidden-sm"><?=$row[spid]?></span>-->
      </a> <!-- /navbar-brand --> 

 <!-- /navbar-nav -->
 

 <ul class="nav navbar-nav">

    <li class="btn-menu hidden-xs hidden-sm"> <a id="menu-toggle" href="#" class="toggle"></a> </li>
    <li class="btn-menu hidden-md hidden-lg"> <a id="mobile-menu-toggle" href="#" class="toggle"></a> </li>
  <!--
    <li class="dropdown reports">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-bell" aria-hidden="true"></i>
      <span class="badge">4</span></a>
      <ul class="dropdown-menu">
        <li class="title-alerts">You have 4 reports</li>
        
        <li class="item">
            <button class="close-button"><i class="fa fa-times" aria-hidden="true"></i></button>
            <div class="icon pull-left"><i class="center-block fa fa-user-plus" aria-hidden="true"></i></div>
            <div class="content"> John Doe creat new account</div>
            <div class="time-history">2 min ago</div>
        </li> 

        <li class="item">
            <button class="close-button"><i class="fa fa-times" aria-hidden="true"></i></button>
            <div class="icon pull-left"><i class="center-block fa fa-plus" aria-hidden="true"></i></div>
            <div class="content"> Matthew Doe buy new item</div>
            <div class="time-history">10 min ago</div>
        </li> 

        <li class="item">
            <button class="close-button"><i class="fa fa-times" aria-hidden="true"></i></button>
            <div class="icon pull-left"><i class="center-block fa fa-upload" aria-hidden="true"></i></div>
            <div class="content"> Upload file complete</div>
            <div class="time-history">1 hour ago</div>
        </li> 

        <li class="item">
            <button class="close-button"><i class="fa fa-times" aria-hidden="true"></i></button>
            <div class="icon pull-left"><i class="center-block fa fa-twitter" aria-hidden="true"></i></div>
            <div class="content"> 5 new followers on twitter</div>
            <div class="time-history">3 Hours ago</div>
        </li> 

      </ul> 
    </li>

    <li class="dropdown message">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-envelope" aria-hidden="true"></i>
          <span class="badge">3</span></a>
          <ul class="dropdown-menu">
            <li class="title-alerts">You have 3 mails</li>
            
            <li class="item">
            <a href="#" class="mail-link">
                <div class="icon pull-left"><i class="center-block fa fa-envelope" aria-hidden="true"></i></div>
                <div class="content"> John Doe creat new account</div>
                <div class="time-history">2 min ago</div>
            </a> 
            </li>

            <li class="item">
            <a href="#" class="mail-link">
                <div class="icon pull-left"><i class="center-block fa fa-envelope" aria-hidden="true"></i></div>
                <div class="content"> Matthew Doe buy new item</div>
                <div class="time-history">10 min ago</div>
            </a>
            </li> 

            <li class="item">
            <a href="#" class="mail-link">
                <div class="icon pull-left"><i class="center-block fa fa-envelope" aria-hidden="true"></i></div>
                <div class="content"> Upload file complete</div>
                <div class="time-history">1 hour ago</div>
            </a>
            </li> 

            <li class="all-mails">
                <a href="#" data-toggle="tooltip" data-placement="top" title="See all messages">
                    <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                </a>
            </li> 

          </ul> 
        </li>
-->
      </ul> 



      <!-- /navbar-form -->
       <br>
    
        
        <span style="color:white;  font-size: 17px;  padding-left: 10px;">User ID: <?=$_SESSION[spid]?> (<?=$row[sname]?>)
        <ul class="nav navbar-nav navbar-right">
        
        <li class="dropdown user-menu">
            
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
		
      <!--  <img src="img/admin.jpg" alt="" class="profile-img img-circle img-resposnive pull-left"> -->
		
        <span class="hidden-xs">Welcome (<?=$_SESSION[spid]?>) <?=$row[sname]?></span> <span class="caret"></span></a>

        <ul class="dropdown-menu pull-right">
            <li><a href="profile_settings.php?m=1"><i class="fa fa-user" aria-hidden="true"></i>Profile</a></li>
            <li><a href="dashboard.php?m=1"><i class="fa fa-home" aria-hidden="true"></i>Dashboard</a></li>
            <li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Log out</a></li>
        </ul> 
		<!-- /dropdown-menu -->
        </li> <!-- /dropdwon -->
        
      </ul> <!-- /navbar-right -->

    </div><!-- /navbar-collapse -->
  </div><!-- /container-fluid -->
</nav>
</div> <!-- /header-panel -->