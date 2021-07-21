<?php
ob_start();
session_start();
error_reporting(0);

if($_SERVER["HTTPS"] != "on") {
  //header("HTTP/1.1 301 Moved Permanently");
  //header("Location: https://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]);
 // exit();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="description" content="HTML5 Template">
    <meta name="author" content="Zwolek">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Member Panel</title>
    <!-- Custom Style-->
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <!-- Theme Color Style-->
    <link rel="stylesheet" type="text/css" href="css/theme-purple.css">
    <!-- Nano Scroller Default Style-->
    <link rel="stylesheet" href="css/nanoscroller.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>


<!-- //////////////////////////////////////////////////// Login div -->
<div id="login" class="image-bg">
<div class="container">
<div class="row">
    <div class="col-xs-12 content">
    <div class="panel login-form">
        <div class="panel-heading">
            <h2>Sign In</h2>
        </div> <!-- /panel-heading -->
        <div class="panel-body m-t-0">
        <?php if($_SESSION['msg']){?>
    	<span style="color: #FE5050;"><?php print $_SESSION['msg']; $_SESSION['msg'] = "";?></span>
		<?php }?>
        <form data-toggle="validator" action='verify.php' method="POST">
<?php
if($_GET[msg]){
?>
		<div class="error msg"><?=$_GET[msg]?></div>
<?php
}
?>


                <div class="form-group">
                    <label for="inputEmail" class="control-label">UserId</label>
                    <div class="input-group">
                        <span class="input-group-addon bg-purple" id="basic-addon1"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                        <input  type="text" name="spid" class="form-control" data-minlength="2" id="inputEmail" placeholder="UserId" data-error="Data Error" required>
                    </div> <!-- /input-group -->
                    <div class="help-block with-errors"></div>
                </div> <!-- /form-group -->

                <div class="form-group">

                <label for="inputPassword" class="control-label">Password</label>
                <div class="input-group">
                    <span class="input-group-addon bg-purple" id="basic-addon2"><i class="fa fa-key" aria-hidden="true"></i>
                    </span>
                    <input type="password" name="pass" class="form-control" id="inputPassword" placeholder="Password" data-error="Bruh, that password is invalid" required>
                </div> <!-- /input-group -->
                <div class="help-block with-errors"></div>
                </div> <!-- /form-group -->
                <!--
                <div class="form-group">
                    <div class="checkbox checkbox-purple">
                        <input id="checkbox" type="checkbox"/>
                        <label for="checkbox"><span>Remember me</span></label>
                    </div>
                </div>
				-->

                <div class="form-group">
                    <button type="submit" class="btn btn-md bg-purple"><span>Sign in</span></button>
                    <a href="forgot-password.php" class="single-link pull-right m-t-10" style='color:black'>Forogot Password?</a>
					<a href="../index.php" class="btn btn-md bg-purple">Back</a>

                </div> <!-- /form-group -->

            </form> <!-- /form -->

        </div> <!-- /panel-body -->
    </div> <!-- /panel-->
    </div> <!-- /col -->
</div> <!-- /row -->
</div> <!-- /container -->
</div> <!-- /login -->

<!-- /////////////////////////////// Scripts /////////////////////////////// -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Offline jQuery script -->
<!-- <script  type="text/javascript" src="jquery.min"></script>  -->
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script  type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- Validator scripts -->
<script  type="text/javascript" src="js/validator/validator.js"></script>

</body>
</html>
