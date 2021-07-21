<?php 
include("include/top.php");
include("include/menu.php");

$zsql="SELECT * FROM `company_account` WHERE `acc_id`='1'";
$zres=mysqli_query($con,$zsql);
$zrow=mysqli_fetch_array($zres);

if($_POST[spid]!=""){

$sq="SELECT * FROM `member` WHERE `spid`='$_POST[spid]'";
$rq=mysqli_query($con,$sq);
$nq=mysqli_num_rows($rq);
	
$sq1="SELECT * FROM `member` WHERE `spid`='$_POST[spid]' AND `member_status`='1'";
$rq1=mysqli_query($con,$sq1);
$nq1=mysqli_num_rows($rq1);


if($nq>0){
if($nq1==0){

$sqp="SELECT * FROM `package` WHERE `package_id`='$_POST[package_id]'";
$rep=mysqli_query($con,$sqp);
$rop=mysqli_fetch_array($rep);

}
else{
header("location:invest_now.php?m=4&msg1=This Member ID is already topuped"); 
}
}
else{
header("location:invest_now.php?m=4&msg1=Please Type Correct Member ID"); 
}


}
?>
<!-- //////////////////////////////////////////////////// Content-Panel div -->

<script type="text/javascript">



</script>


<div id="content-panel">
<div class="container-fluid">

<div class="row">
    <div class="col-xs-12 dashboard-header">
    <h1 class="dash-title">Confirmation Panel</h1>
    <!-- //////////////////////////////////////////////////// Breadcrumb -->
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Invest</a></li>
          <li><a href="invest_now.php?m=4" class="active">Confirmation Panel</a></li>
        </ol> <!-- /breadcrumb -->
        
    </div> <!-- /dashboard -->
</div> <!-- /row -->
<!-- //////////////////////////////////////////////////// Work Shift Master -->
<div class="row">

	

    <div class="col-md-12 col-sm-12 col-xs-12">
	
	

        <div class="panel">
		<br/>

            <div class="panel-heading">
                <h3>Confirmation Panel</h3>
                <p class="text-muted"></p>
            </div> <!-- /panel-heading -->
            <div class="panel-body m-t-0">
            
		

<?
if($_POST[payment_gatway]=="BlockChain"){
?>


<table border="0" cellpadding="0" cellspacing="0" >
<tr>
<td>
<form action="https://blockchain.info" method="post">   </form>
<center>

Please send <b>$ <?=$_POST[topup_amt]?></b> <span style='color:blue'>BLOCKCHAIN</span> to address  <br/>
<?=$zrow[blockchain]?><br/>
<!--
<img src="block-chain-img.png"/><br/>
-->
<span style='color:red'>
BLOCKCHAIN deposit will take roughly 2 to 15 minutes. It is possible it will take longer<br/>
since we require 1 confirmation from the BLOCKCHAIN network before the deposit will go through.<br/><br/>
</span>

<a href="https://blockchain.info"><input type="image" name="cartImage" src="money_pay/qswm6.png" /></a>

</center>
</td>
</tr>
</table>
<? } ?>

<?
if($_POST[payment_gatway]=="Bitcoin"){
?>


<table border="0" cellpadding="0" cellspacing="0" >
<tr>
<td>
<form action="https://blockchain.info/wallet/#/login/" method="post">   </form>
<center>

Please send <b>$ <?=$_POST[topup_amt]?></b>  <span style='color:blue'>BITCOIN</span> to address <br/>
<?=$zrow[bitcoin]?><br/>
<!--
<img src="canvas.png"/><br/>
-->
<span style='color:red'>
BitCoin deposit will take roughly 2 to 15 minutes. It is possible it will take longer<br/>
since we require 1 confirmation from the Bitcoin network before the deposit will go through.<br/><br/>
</span>
<a href="https://blockchain.info/wallet/#/login/"><input type="image" name="cartImage" src="bitcoin.19154c52.svg"  style="width:75px"/></a>


</center>
</td>
</tr>
</table>
<? } ?>


<?
if($_POST[payment_gatway]=="e-wallet"){

$sql6="SELECT * FROM `ewallet` WHERE `spid`='$_SESSION[spid]'";
$res6=mysqli_query($con,$sql6);
$row6=mysqli_fetch_array($res6);

if($row6[rest_amt]>=$_POST[topup_amt]){

?>

            <table class="table table-bordered"> 
<tr>
<td>
<form action="payment_ewallet.php" method="post">
<b>Transaction Password</b> <input name="pass" id="pass" type="password" class="field_gray" value="" required>  <br/> <br/> 
<input type="hidden" name="spid" value="<?=$_POST[spid]?>">
<input type="hidden" name="package_id" value="<?=$rop[package_id]?>">
<input type="hidden" name="PAYMENT_AMOUNT" value="<?=$_POST[topup_amt]?>">
<center><input type="submit" name="PAYMENT_METHOD" value="Pay Now"  class="btn btn-md bg-purple" /></center>
</form>
</td>
</tr>


<tr>
<td>
<center><image src="money_pay/1password_vs_eWallet.jpg" style="width:150px"/></center>
</td>
</tr>
</table>
<? } 
else { ?>
<span style='color:#000;font-weight:bold;font-size:16px'> You doesn't have enough amount.</span>
<? } } ?>
			
          <!-- /form-group -->


          <!-- /col -->

           <!-- /form-horizontal -->
            </div> 
			
		
			<!-- /panel-body -->
        </div> <!-- /panel-->
    </div> <!-- /col -->
</div> <!-- /row -->

<?php include("include/footer.php"); ?>