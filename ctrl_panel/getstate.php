<?
include_once("lib_panel/config.php");
?>
<select class="form-control"  id="state_id" name="state_id" onfocus='this.size=10;' 
onblur='this.size=1;' onchange='this.size=1; this.blur();majax2();'required >
<option value="">Select State</option>
<?
$msgsql="SELECT * FROM `state` WHERE `country_id`='$_GET[country_id]' AND `st`='1' ORDER BY  `state_name` ASC";
$msgres=mysqli_query($con,$msgsql);
while($msgrow=mysqli_fetch_array($msgres)){
?>	  
      <option value="<?=$msgrow[state_id]?>"><?=$msgrow[state_name]?></option> 
<? } ?>	  
</select>