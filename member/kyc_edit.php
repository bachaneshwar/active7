<?php
session_start();
include("include/top.php");
include("include/menu.php");

?>



<!-- //////////////////////////////////////////////////// Content-Panel div -->



<div id="content-panel">
<div class="container-fluid">

<div class="row">
    <div class="col-xs-12 dashboard-header">
    <h1 class="dash-title">KYC Edit</h1>
    <!-- //////////////////////////////////////////////////// Breadcrumb -->
        <ol class="breadcrumb">
            <?php ?>
          <li><a href="current_ewallet_status.php?m=5"><i class="fa fa-home" aria-hidden="true"></i> KYC</a></li>
          <li><a href="current_ewallet_status.php?m=5" class="active">Edit</a></li>
        </ol> <!-- /breadcrumb -->

    </div> <!-- /dashboard -->
</div> <!-- /row -->


<?
if(isset($_POST[call_submit])){
 @mkdir("uploads");

$fname1	  = $_FILES[Adhaar][name];
$tmp_name1 = $_FILES[Adhaar][tmp_name];

$fname2	  = $_FILES[PAN][name];
$tmp_name2 = $_FILES[PAN][tmp_name];

$fname3	  = $_FILES[Image][name];
$tmp_name3 = $_FILES[Image][tmp_name];



$ext1 = strtolower(end(explode(".",$fname1)));
$ext2 = strtolower(end(explode(".",$fname2)));
$ext3 = strtolower(end(explode(".",$fname3)));
$sqlf = "select * from `member` where `id` = '$_SESSION[spid]'";
$resf = mysqli_query($con,$sqlf);
$rowf = mysqli_fetch_array($resf);


// if(!empty($fname1)&&!empty($fname2)&&!empty($fname3)){
//
// if( ($ext1==jpg || $ext1==jpeg || $ext1==pdf) && ($ext2==jpg || $ext2==jpeg || $ext2==pdf) && ($ext3==jpg || $ext3==jpeg || $ext3==pdf) )
// {
// unlink($rowf[Adhaar_Image]);unlink($rowf[PAN_Image]);unlink($rowf[Image]);
// $path1 = "uploads/".$fname1;
// move_uploaded_file($tmp_name1,$path1);
//
//
// $path2 = "uploads/".$fname2;
// move_uploaded_file($tmp_name2,$path2);
//
//
// $path3 = "uploads/".$fname3;
// move_uploaded_file($tmp_name3,$path3);
//
//
// $sql = "update `member` SET `Adhaar_Image`='$path1', `PAN_Image`='$path2', `Image`='$path3' where `spid`='$_SESSION[spid]'";
// $rows1= mysqli_query($con,$sql);
//
//
// }
// }

if($fname1)
{
   if(($ext1==jpg || $ext1==jpeg || $ext1==pdf)){
    unlink($rowf[Adhaar_Image]);

 		$path1 = "uploads/".$fname1;
 		move_uploaded_file($tmp_name1,$path1);

	$sql1 = "update `member` SET `Adhaar_Image`='$path1' where `spid`='$_SESSION[spid]'";
	mysqli_query($con,$sql1);
  }
}
if($fname2)
{
   if(($ext2==jpg || $ext2==jpeg || $ext2==pdf)){
    unlink($rowf[PAN_Image]);

 		$path2 = "uploads/".$fname2;
 		move_uploaded_file($tmp_name2,$path2);

	$sql2 = "update `member` SET `PAN_Image`='$path2' where `spid`='$_SESSION[spid]'";
	mysqli_query($con,$sql2);
  }
}
if($fname3)
{
   if(($ext3==jpg || $ext3==jpeg || $ext3==pdf)){
    unlink($rowf[Image]);

 		$path3 = "uploads/".$fname3;
 		move_uploaded_file($tmp_name3,$path3);

  $sql3 = "update `member` SET `Image`='$path3' where `spid`='$_SESSION[spid]'";
	mysqli_query($con,$sql3);
  }
}


// if($rows1){
//
// $nurl="$log_url?msg=Sucessfully Top Up.";
// echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$nurl.'">';
// }


// else{
// $nurl="$log_url?msg=This ID Already TopUp";
// echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$nurl.'">';
// }


header("location:kyc.php");


}

?>

<?
$msgsql1="SELECT * FROM `member` WHERE `spid`='$_SESSION[spid]' and `KYC`='0' ";
$msgres1=mysqli_query($con,$msgsql1);
while($msgrow1=mysqli_fetch_array($msgres1)){

?>
<!-- //////////////////////////////////////////////////// Work Shift Master -->
<div class="row">

<script type="text/javascript">
// function validate_form(form){
// if( form.elements['Adhaar'].value=="" ) { alert("Please Select one Package."); form.elements['Adhaar'].focus(); return false; }
// if( form.elements['PAN'].value=="" ) { alert("Please type Serial No."); form.elements['PAN'].focus(); return false; }
// if( form.elements['image'].value=="" ) { alert("Please type E-Pin."); form.elements['image'].focus(); return false; }
//
// }
</script>

<script language="javascript" type="text/javascript" src="ajax.js"></script>

    <div class="col-md-12 col-sm-12 col-xs-12">



        <div class="panel">
		<br/>

            <div class="panel-heading">
                <h3>KYC Details edit</h3>
                <p class="text-muted"></p>
            </div> <!-- /panel-heading -->
            <div class="panel-body m-t-0">


<form action="" method="post" name="newform" enctype = "multipart/form-data" onsubmit="return validate_form(this);" >
<table style="width:100%">

<tr>

  <?php print $sql ?>
	<td >Adhaar Card<span style="color:#ff0000">*</span></td>
<td><input type="file" class="form-control" name="Adhaar"  id="Adhaar"   onkeypress="return keyRestrict(event, '1234567890')"  />
<img src = "<?=$msgrow1[Adhaar_Image]?>" width = "200" height = "100" required >
</td>
</tr>
<tr ><td colspan="2"><br/></td></tr>

<tr>
	<td >PAN Card<span style="color:#ff0000">*</span></td>
<td><input type="file" class="form-control" name="PAN"  id="PAN"     onkeypress="return keyRestrict(event, '1234567890')" />
<img src = "<?=$msgrow1[PAN_Image]?>" width = "200" height = "100" required >
</td>
</tr>
<tr ><td colspan="2"><br/></td></tr>


<!-- <tr>
	<td >EPIC Card<span style="color:#ff0000">*</span></td>
<td><input type="file" class="form-control" name="EPIC"  id="EPIC"  required />
</td>
</tr>
<tr ><td colspan="2"><br/></td></tr> -->

<tr>
	<td >bank details<span style="color:#ff0000">*</span></td>
<td><input type="file" class="form-control" name="Image"  id="Image"   />
  <img src = "<?=$msgrow1[Image]?>" width = "200" height = "100" required >
</td>
</tr>
<tr ><td colspan="2"><br/></td></tr>

</table>




<div class="form-group">



<input type="hidden" name="st" value="1" />

<input type="submit" name="call_submit" class="btn btn-md bg-purple" value="Upload" />
</div>


<?php
$msg=$_REQUEST[msg];
echo "<center><font color=\"#ff0066\" size=\"5\">".$msg."</font></center>";

?>


</form>


 <!-- /form-horizontal -->
            </div>


			<!-- /panel-body -->
        </div> <!-- /panel-->
    </div> <!-- /col -->
</div> <!-- /row -->
<?}?>

<?php include("include/footer.php"); ?>
