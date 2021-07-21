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
<div class="header-icon"><i class="fa fa-shopping-basket"></i></div>

<div class="header-title">
<h1>Edit Level</h1>
<small>Edit Level</small>
</div>
</section>
<!-- Main content -->
<section class="content">
<div class="row">
<div class="col-sm-4">
<div class="panel lobidisable panel-bd">
<div style="padding:10px;color: #010611;background-color: #e8f1f3;border-color: #b7b9bf;position: relative;">
<div class="panel-title">

</div>
</div>
<div class="panel-body">
  <?php
  if(isset($_POST[call_submit]))
  {
    print $sql_up="UPDATE `level` SET `rank_name`='$_POST[level_name]',`pair`='$_POST[pair]',`st`='$_POST[st]' WHERE `level_id`='$_GET[id]'";
    $res=mysqli_query($con,$sql_up);

    //$_SESSION[msg]="edit successfull";
    //header("location:channel.php");
    $nurl="level.php";
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$nurl.'">';
  }

 $sql1="select * from `level` where `level_id`='$_GET[id]'";
  $res1=mysqli_query($con,$sql1);
  $row=mysqli_fetch_array($res1);


  ?>
<form action="" method="post" enctype="multipart/form-data">





<div class="form-group">

<label>Level Name</label>
<input type="text" class="form-control" name="level_name"  value="<?=$row[rank_name]?>" required>
</div>



<div class="form-group">
<label>Pair</label>
<input type="number" class="form-control" name="pair" value="<?=$row[pair]?>" required>
</div>

<div class="form-group">
<label>Status</label>

       <select  name="st" >
       <!-- <select name="pack" class="livesearch" > -->
       <?if($row[st]==1){

              ?>
       <option value="<?=$rows[st];?>">UNBLOCK</option>
         <?
       }

         ?>
         <option value="0">Block</option>
         <option value="1">Unlock</option>

       <!-- <input type="text" class="form-control" name="Category" value=""> -->
       </select>
</div>


<div class="form-group">

<input type="submit" name="call_submit" class="btn btn-add"  value="update" />


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
