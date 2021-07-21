<!DOCTYPE html>

<html lang="en">



<?php

include_once("include/header_top.php");


$total_join=$my->all_num($con,member);
$today_join=$my->total_num($con,member,doj,$today_date);

$total_topup=$my->all_num($con,member_topup);
$today_topup=$my->total_num($con,member_topup,topup_dt,$today_date);





?>



<body class="hold-transition sidebar-mini">

<!--preloader-->

<div id="preloader">

<div id="status"></div>

</div>

<!-- Site wrapper -->

<div class="wrapper">



<?php

include_once("include/header_down.php");

?>



<!-- =============================================== -->

<!-- Left side column. contains the sidebar -->

<?php

include_once("include/menu.php");

?>



<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

<!-- Content Header (Page header) -->

<section class="content-header">

<!--

<div class="header-icon">

<i class="fa fa-dashboard"></i>

</div>

-->

<div class="header-title">

<h1>DASHBOARD</h1>

<small>



</small>

</div>

</section>

<!-- Main content -->

<section class="content">
<div class="row">
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
<div id="cardbox1">
<div class="statistic-box">
<i class="fa fa-user-plus fa-3x"></i>
<div class="counter-number pull-right">
<span class="count-number"><?=$today_join?></span>
<span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
</span>
</div>
<h3> Today's Joining</h3>
</div>
</div>
</div>
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
<div id="cardbox2">
<div class="statistic-box">
<i class="fa fa-user-secret fa-3x"></i>
<div class="counter-number pull-right">
<span class="count-number"><?=$total_join?></span>
<span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
</span>
</div>
<h3>  Total Joining</h3>
</div>
</div>
</div>
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
<!-- <div id="cardbox3">
<div class="statistic-box">
<i class="fa fa-money fa-3x"></i>
<div class="counter-number pull-right">
<span class="count-number"><?=$total_topup?></span>
<span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
</span>
</div>
<h3>   Total TopUp </h3>
</div>
</div> -->
</div>
<!-- <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
	<a href="1.php">
<div id="cardbox4">
<div class="statistic-box">
<i class="fa fa-files-o fa-3x"></i>
<div class="counter-number pull-right">
<span class="count-number"><?=$today_topup?></span>
<span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
</span>
</div>
<h3>Today's TopUp</h3>
</div>
</div>
</a>
</div> -->
</div>

<!--
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<div class="panel panel-bd lobidisable">
<div style="padding:10px;color: #010611;background-color: #e8f1f3;border-color: #b7b9bf;position: relative;">
<div class="btn-group" id="buttonlist">
<i class="fa fa-list"></i>&nbsp; Search Panel
</div>
</div>
<div class="panel-body">
<form action="#" method="post">
<table style="width:100%">

<tr><td colspan="2"><br/></td></tr>
<tr>
<td>Search No</td>
<td><input type="text" class="form-control" name="search_no" required /></td>
</tr>
<tr><td colspan="2"><br/></td></tr>

</table>
<div class="reset-button">
<center>
<input type="submit" name="call_submit" class="btn btn-success"  value="Search" />
<input type="reset" name="call_reset" class="btn btn-warning"  value="Exit" />
</center>
</div>
</form>



</div>
</div>
</div>
-->


<!-- /.row -->

</section>

<!-- /.content -->

</div>

<!-- /.content-wrapper -->

<?php

include_once("include/footer_top.php");

?>

</div>

<!-- /.wrapper -->

<!-- Start Core Plugins

=====================================================================-->

<?php

include_once("include/footer_down.php");

?>



</body>



</html>
