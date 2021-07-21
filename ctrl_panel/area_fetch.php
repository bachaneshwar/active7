<?php
include_once("include/conn.php");
$sql="SELECT * FROM `plot` WHERE `phase_id` ='$_GET[phase_id]' GROUP BY `area_id`";
$res=mysqli_query($con,$sql);
?>
<select name="area_id" id="area_id" onchange="ajax24()" class="form-control" required >
<option value="">Select Area</option>
<?
while($row=mysqli_fetch_array($res)){
$area_row=$my->total_row($con,area,area_id,$row[area_id]);
?>
<option value="<?=$row[area_id]?>"><?=$area_row[area_name]?></option>
<? }  ?>
</select>

