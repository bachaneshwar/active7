<?php
include("include/top.php");
include("include/menu.php");


$sql="SELECT * FROM `member` WHERE `spid`='$_SESSION[spid]'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);
$pass=$row[trans_password];
$pack_st=$row[st];


$last_day=date("Y-m-d",strtotime("+1 month -1 second",strtotime(date("Y-m-1"))));


$sqlm_1="SELECT * FROM `amount_rate`";
$reslm_1=mysqli_query($con,$sqlm_1);
$rowlm_1=mysqli_fetch_array($reslm_1);

$sqc="SELECT * FROM `ewallet` WHERE `spid`='$_SESSION[spid]'";
$rqc=mysqli_query($con,$sqc);
$rowqc=mysqli_fetch_array($rqc);
$total_amt=$rowqc[rest_amt];


if($row[pan]!=""){
$tds_amt=round(($total_amt*$rowlm_1[tds])/100);
}else{
$tds_amt=round(($total_amt*$rowlm_1[tds_pan])/100);
}
$sc_amt=round(($total_amt*$rowlm_1[sc])/100);

$final_amount=round($total_amt-($tds_amt+$sc_amt));

?>
<!-- //////////////////////////////////////////////////// Content-Panel div -->

<script type="text/javascript">
function keyRestrict(e, validchars) {
var key='', keychar='';
key = getKeyCode(e);
if (key == null) return true;
keychar = String.fromCharCode(key);
keychar = keychar.toLowerCase();
validchars = validchars.toLowerCase();
if (validchars.indexOf(keychar) != -1)
return true;
if ( key==null || key==0 || key==8 || key==9 || key==13 || key==27 )
return true;
return false;
}
function getKeyCode(e) {
if (window.event)
return window.event.keyCode;
else if (e)
return e.which;
else
return null;
}
</script>
<script type="text/javascript">
function validate_form(form){
if( form.elements['amount'].value=="" ) { alert("Please type Amount."); form.elements['amount'].focus(); return false; }
}
</script>

<div id="content-panel">
<div class="container-fluid">

<div class="row">
    <div class="col-xs-12 dashboard-header">
    <h1 class="dash-title">Withdrawal</h1>
    <!-- //////////////////////////////////////////////////// Breadcrumb -->
        <ol class="breadcrumb">
          <li><a href="current_ewallet_status.php?m=5"><i class="fa fa-home" aria-hidden="true"></i> E-Wallet</a></li>
          <li><a href="withdrwal_transfer.php?m=5" class="active">Withdrawal</a></li>
        </ol> <!-- /breadcrumb -->

    </div> <!-- /dashboard -->
</div> <!-- /row -->
<!-- //////////////////////////////////////////////////// Work Shift Master -->
<div class="row">



    <div class="col-md-12 col-sm-12 col-xs-12">



        <div class="panel">
		<br/>

            <div class="panel-heading">
                <h3>Withdrawal Panel</h3>
                <p class="text-muted"></p>
            </div> <!-- /panel-heading -->
            <div class="panel-body m-t-0">
            <form class="form-horizontal"  method="post" action="final_withdrwal_transfer.php?m=5" onsubmit="return validate_form(this)" autocomplete="off">

            <table class="table table-bordered">
<tr>
<td>


            <table class="table table-bordered">



<tr>
<td colspan="4"><br><?php
$msg=$_REQUEST[msg];
if($_REQUEST[msg])
echo "<p style='color:green;font-weight:bold'>&nbsp;$msg</p>";
if($_REQUEST[msg1])
echo "<p style='color:red;font-weight:bold'>&nbsp;$_REQUEST[msg1]</p>";
?>	</td>
</tr>
</tr>

<tr class="box-bg">
<td>&nbsp;&nbsp;</td>
<td align="left" valign="middle" class="bodytext" style="color:green;font-weight:bold;font-size:14px">Balance</td>
<td align="center" valign="middle" class="bodytext">:</td>
<td align="left" valign="middle" style="color:green;font-weight:bold;font-size:14px"> <?=$rowqc[rest_amt]?></td>
<tr>
<td colspan="4"><br></td>
</tr>
</tr>



<tr class="box-bg">
<td>&nbsp;&nbsp;</td>
<td align="left" valign="middle" class="bodytext">Amount</td>
<td align="center" valign="middle" class="bodytext">:</td>
<td align="left" valign="middle"><b></b><input type="text" name="amount" onCopy="return false" onPaste="return false" ninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
</td>
<tr>
<td colspan="4"><br></td>
</tr>
</tr>






</table>
</td>
</tr>

</td>
</tr>



<tr>
<td  align='center' valign='middle'><input type="submit" name="submit" value="Withdrawal" class="btn btn-md bg-purple"></td>
</tr>


<tr>
<td align="center" style="color:red">
<br/>
</td>
</tr>

</table>
 <!-- /form-horizontal -->
          </form>    </div>


			<!-- /panel-body -->
        </div> <!-- /panel-->
    </div> <!-- /col -->
</div> <!-- /row -->

<?php include("include/footer.php"); ?>
