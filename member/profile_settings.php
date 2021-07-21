<?php 
include("include/top.php");
include("include/menu.php");

if($_POST[submit]!=""){

$bitcoin_address=mysqli_real_escape_string($con,$_POST[bitcoin_address]);
$member_det=$my->total_row($con,member,spid,$_SESSION[spid]);

if($_POST[aadhar]!=""){ $aadhar=$_POST[aadhar];}else{$aadhar=$member_det[aadhar];}
if($_POST[bank]!=""){ $bank=$_POST[bank];}else{$bank=$member_det[bank];}
if($_POST[branch]!=""){ $branch=$_POST[branch];}else{$branch=$member_det[branch];}
if($_POST[acc_no]!=""){ $acc_no=$_POST[acc_no];}else{$acc_no=$member_det[acc_no];}
if($_POST[ifsc_code]!=""){ $ifsc_code=$_POST[ifsc_code];}else{$ifsc_code=$member_det[ifsc_code];}
if($_POST[acc_type]!=""){ $acc_type=$_POST[acc_type];}else{$acc_type=$member_det[acc_type];}
if($_POST[nominee_name]!=""){ $nominee_name=$_POST[nominee_name];}else{$nominee_name=$member_det[nominee_name];}
if($_POST[nominee_rel]!=""){ $nominee_rel=$_POST[nominee_rel];}else{$nominee_rel=$member_det[nominee_rel];}


$query="UPDATE `member` SET `fname`='$_POST[fname]',`mother_name`='$_POST[mother_name]',`dob`='$_POST[dob]',`sex`='$_POST[sex]',`addr`='$_POST[addr]',`address1`='$_POST[addr1]',`pincode`='$_POST[pincode]',`city`='$_POST[city]',`aadhar`='$aadhar',`nominee_name`='$nominee_name',`nominee_rel`='$nominee_rel',`district_id`='$_POST[district_id]' WHERE `spid`='$_SESSION[spid]'";
$rows=mysqli_query($con,$query);



if($rows){
header("location:profile_settings.php?m=1");
}

}



?>
<!-- //////////////////////////////////////////////////// Content-Panel div -->


<script type="text/javascript">
function validate_form(form){
if( form.elements['sname'].value=="" ) { alert("Please type Member Name"); form.elements['sname'].focus(); return false; }
if( form.elements['pass'].value=="" ) { alert("Please type Password "); form.elements['pass'].focus(); return false; }
if( form.elements['mob'].value=="" ) { alert("Please type your Mobile no."); form.elements['mob'].focus(); return false; }
if( form.elements['mob'].value!="" ) { 
var number = form.elements['mob'].value;
var number1=number.length;
if(number1!=10){alert("Please type valid Number"); form.elements['mob'].focus(); return false; }  
}
}
</script>	

<?
$member_det=$my->total_row($con,member,spid,$_SESSION[spid]);
?>

<div id="content-panel">
<div class="container-fluid">

<div class="row">
    <div class="col-xs-12 dashboard-header">
    <h1 class="dash-title">Profile Settings</h1>
    <!-- //////////////////////////////////////////////////// Breadcrumb -->
        <ol class="breadcrumb">
          <li><a href="dashboard.php"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a></li>
          <li><a href="profile_settings.php" class="active">Profile Settings</a></li>
        </ol> <!-- /breadcrumb -->
        
    </div> <!-- /dashboard -->
</div> <!-- /row -->
<!-- //////////////////////////////////////////////////// Work Shift Master -->
<div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel">
            <div class="panel-heading">
                <h3></h3>
                <p class="text-muted"></p>
            </div> <!-- /panel-heading -->
            <div class="panel-body m-t-0">

			
			
			
            <form class="form-horizontal"  action="profile_settings.php" method="post" >
       <table style="width:100%">

<tr>
	<td colspan="2"><br></td>
</tr>



<tr>
<td>Member Name <span style="color:#ff0000"></span></td>
<td><?=$member_det[sname]?></td>
</tr>


<tr>
	<td colspan="2"><br></td>
</tr>



<tr>
	<td >Mobile Number </td>
	<td><?=$member_det[mob]?></td>
	</td>
</tr>
<tr>
	<td colspan="2"><br></td>
</tr>
<tr>
	<td >E-mail</td>
	<td><input type="email" name="email" class="form-control"  value="<?=$member_det[email]?>" /></td>
</tr>
<tr>
	<td colspan="2"><br></td>
</tr>

<tr>
	<td >Address</td>
		<td><textarea name="addr" class="form-control"  rows="6" cols="24"><?=$member_det[addr]?></textarea></td>
</tr>
<tr>
	<td colspan="2"><br></td>
</tr>



<?php
$value_det=$my->total_row($con,district,district_id,$member_det[district_id]);
$value_det1=$my->total_row($con,state,state_id,$value_det[state_id]);
$value_det2=$my->total_row($con,country,country_id,$value_det1[country_id]);
?>

<tr>
<td> Country:</td>
<td>

<select id="country_id" name="country_id"  onchange="return ajax1();" class="form-control">
<option value="">Select Country</option>
<?
$row_dt1=$my->check_all($con,country,st,1);
foreach($row_dt1 as $k1=>$v1){
?>
<option value="<?=$v1['country_id']?>" <? if($v1['country_id']==$value_det2[country_id]){?>Selected<?}?>><?=$v1['country_name']?></option>
<?
}
?>
</select>

</td>
</tr>
<tr>
	<td colspan="2"><br></td>
</tr>

<tr>
<td> State:</td>
<td>
<div id="waitsubcat" >
<select class="form-control"   name="state_id"   onchange="return majax2();">
<?
$state_det=$my->search_row2($con,state,country_id,$value_det1['country_id'],st,1);
foreach($state_det as $k=>$v){
?>	  
      <option value="<?=$v[state_id]?>" <? if($v['state_id']==$value_det1[state_id]){?>Selected<?}?>><?=$v[state_name]?></option> 
<? } ?>	  
</select>
</div>
<div id="loadsubcat"></div>
</td>
</tr>
<tr>
	<td colspan="2"><br></td>
</tr>
<tr>
<td> District Name:</td>
<td>
<div id="waitspeci">
<select class="form-control"  id="district_id" name="district_id"  >
<?
$district_det=$my->search_row2($con,district,state_id,$value_det['state_id'],st,1);
foreach($district_det as $k=>$v){
?>	  
      <option value="<?=$v[district_id]?>" <? if($v['district_id']==$member_det[district_id]){?>Selected<?}?>><?=$v[district_name]?></option> 
<? } ?>	  
</select>


</div>
<div id="loadspeci"></div>
</td>
</tr>

<tr>
	<td colspan="2"><br></td>
</tr>


<tr>
	<td >City/Town </td>
	<td><input type="text" name="city" class="form-control"  value="<?=$member_det[city]?>" ></td>
</tr>
<tr>
	<td colspan="2"><br></td>
</tr>





<tr>
	<td >Aadhar No <span style="color:#ff0000"></span></td>
	<td>
	<?
	if($member_det[aadhar]==""){
	?>
	<input type="text" name="aadhar" class="form-control" value="" >
	<? } else { ?>
	<?=$member_det[aadhar]?>
	<? } ?>
	</td>
</tr>
<tr>
	<td colspan="2"><br></td>
</tr>

<tr>
	<td >PAN No <span style="color:#ff0000"></span></td>
	<td><?=$member_det[pan]?></td>
</tr>

<tr>
	<td colspan="2"><br></td>
</tr>





<tr>
	<td >Nominee Name </td>
	<td>
	<?
	if($member_det[nominee_name]==""){
	?>
	<input type="text" name="nominee_name" class="form-control" value="" >
	<? } else { ?>
	<?=$member_det[nominee_name]?>
	<? } ?>
	
	</td>
</tr>
<tr>
	<td colspan="2"><br></td>
</tr>
<tr>
	<td >Nominee Relation</td>
	<td>
		<?
	if($member_det[nominee_rel]==""){
	?>
	<input type="text" name="nominee_rel" class="form-control" value="" >
	<? } else { ?>
	<?=$member_det[nominee_rel]?>
	<? } ?>
	</td>
</tr>
<tr>
	<td colspan="2"><br></td>
</tr>

<tr >
<td colspan="2">

</td>
</tr>

<tr >
<td colspan="2">
<br/>
               <center> <input type="submit" name='submit' value="Submit"  class="btn btn-md bg-purple"/> </center>
</td>
</tr>
<tr>
	<td colspan="2"><br></td>
</tr>

</table> 

            </form> <!-- /form-horizontal -->

            </div> <!-- /panel-body -->
        </div> <!-- /panel-->
    </div> <!-- /col -->
</div> <!-- /row -->

<?php include("include/footer.php"); ?>