<?php
include_once("include/conn.php");

$sql="SELECT * FROM `plot_booking` WHERE `spid`='$_REQUEST[spid]' AND `status`='1'";
$res=mysqli_query($con,$sql);
?>
<select name="plot_bkId" id="plot_bkId" onchange="ajax28();extra_cal();" class="form-control" required >
<option value="">Select Plot</option>
<?
while($row=mysqli_fetch_array($res)){

$prow=$my->total_row($con,plot,plot_id,$row[plot_id]);
$phrow=$my->total_row($con,phase,phase_id,$prow[phase_id]);
?>
<option value="<?=$row[plot_bkId]?>"><?=$prow[plot_name]?>(<?=$phrow[phase_name]?>)</option>
<? } ?>
</select>

