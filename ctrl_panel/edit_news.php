<!DOCTYPE html>
<html lang="en">


<?php
include_once("include/header_top.php");
?>

<body class="hold-transition sidebar-mini">
<!--preloader-->
<div id="preloader">
<div id="status"></div>
</div>




<?
if($_POST[call_submit1]!=""){
$sql="UPDATE `news` SET `news`='$_POST[news_details]',`date`='$_POST[news_date]' WHERE `id`='$_POST[subId]'";
$res=mysqli_query($con,$sql);

$nurl="add_news.php?lid=$dtls_link[sublink_id]";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$nurl.'">';


}
?>

<?

$sqls="SELECT * FROM `news` WHERE `id`='$_REQUEST[id]'";
$res1=mysqli_query($con,$sqls);
$rows=mysqli_fetch_array($res1);

?>


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
<div class="header-icon"><i class="fa fa-newspaper-o"></i></div>

<div class="header-title">
<h1>News Details</h1>
<small>Add News</small>
</div>
</section>
<!-- Main content -->
<section class="content">
<div class="row">
<div class="col-sm-4">
<div class="panel lobidisable panel-bd">
<div style="padding:10px;color: #010611;background-color: #e8f1f3;border-color: #b7b9bf;position: relative;">
<div class="panel-title">
<h4>Modify  News</h4>

</div>
</div>
<div class="panel-body">
<form action="" method="post">





<div class="form-group">
<label>News Details </label>
<textarea rows="4" cols="50" class="form-control" name="news_details" placeholder="Enter Short description" required><?=$rows[news]?></textarea>
</div>


<div class="form-group">
<label>Date</label>
<div class="panel-body">
<input type="text" name="news_date"  id="news_date" value='<?=$rows['date']?>' class="form-control" size="20" readonly  />
<span id="cal3">&nbsp;<img src="calendar.jpg" style="cursor:pointer;" border="0" /></span>
<script type="text/javascript">
var cal = new Zapatec.Calendar.setup({

inputField:"news_date",
ifFormat:"%Y-%m-%d",
button:"cal3",
showsTime:false

});

</script>


</div>
</div>




<div class="form-group">

<input type="hidden" name="subId" value="<?=$rows['id']?>" />



<input type="submit" name="call_submit1" class="btn btn-add"  value="Submit" />


</div>
</form>
</div>
</div>
</div>



</div>
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
