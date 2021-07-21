<?php
$api="rzp_test_PUR5DNpM9JuJW5";
include("include/top.php");
include("include/menu.php");
include_once("config.php");
session_start();
 ?>

 <!DOCTYPE html>
 <div>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
     <meta name="viewport" content="width=device-width">
     <style >
       .razorpay-payment-button{
         /* color: red; */
         background-color: #4CAF50;
   border: none;
   color: white;
   padding: 15px 32px;
   text-align: center;
   text-decoration: none;
   display: inline-block;
   font-size: 16px;
   margin: 4px 2px;
   cursor: pointer;
   /* padding:15em; */
       }
     </style>
   </head>
   <body>
     <?PHP
error_reporting(0);
     $amt=$_SESSION[total]*100;
     ?>
    <br>
<br>
<br>
<br>   <div align="center">
     <form action="blank1.php" method="POST">
     <script
         src="https://checkout.razorpay.com/v1/checkout.js"
         data-key="<?=$pay_key?>";// Enter the Key ID generated from the Dashboard
         data-amount="<?=$amt?>" // Amount is in currency subunits. Default currency is INR. Hence, 29935 refers to 29935 paise or INR 299.35.
         data-currency="INR"

         data-buttontext="Pay for KYA AAP PAANCHVI PAAS HAIN?"
         data-name="<?=$_SESSION[sname]?>"
         data-description="KYA AAP PAANCHVI PAAS HAIN?"
         data-image="https://example.com/your_logo.jpg"
         data-prefill.name="<?=$_SESSION[spid]?>"
         data-prefill.email=""
         data-theme.color="green"
     ></script>
     <input type="hidden" custom="Hidden Element" name="hidden" value="<?=$_SESSION[spid]?>">
     </form>
</div>
   </body>
 </html>
</div>
<br><br>
<div style="background-color:lightblue">
  <br>
  <center>
  <h1>KYA AAP PAANCHVI PAAS HAIN?</h1><br>
  <h2>*MEGA CONTEST*<br><br>
Get ready for mega winnings
</h2><br>
</center>
</div>
<center>
  <br><br><br>
<div>
<?php include("include/footer.php"); ?>
</div>
</center>
