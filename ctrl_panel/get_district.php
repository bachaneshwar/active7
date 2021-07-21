<?
include_once("lib_panel/config.php");
?>
<select  class="form-control" id="district_id" name="district_id" onfocus='this.size=10;' 
onblur='this.size=1;' onchange='this.size=1; this.blur();majax3();'  required >
<option value="">Select District</option>
<?
$msgsql="SELECT * FROM `district` WHERE `state_id`='$_GET[state_id]' AND `st`='1' ORDER BY  `district_name` ASC";
$msgres=mysqli_query($con,$msgsql);
while($msgrow=mysqli_fetch_array($msgres)){
?>	  
      <option value="<?=$msgrow[district_id]?>"><?=$msgrow[district_name]?></option> 
<? } ?>	  
</select>

