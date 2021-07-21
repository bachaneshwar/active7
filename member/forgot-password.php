<?php
ob_start();
session_start();
error_reporting(0);
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
    <title>Master</title>
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

<!-- //////////////////////////////////////////////////// Forgot Password div -->
<div id="forgot-password" class="image-bg">
<div class="container">
<div class="row">
    <div class="col-xs-12 content">
    <div class="forgot-password-form panel">
       <div class="panel-heading">
                <h3>Forgot Password</h3>
            </div> <!-- /panel-heading -->
            <div class="panel-body m-t-0">
            <div class="help">
            <form data-toggle="validator" action="password_sent.php" method="POST">
<?php
if($_GET[msg]){
?>
		<div class="error msg"><?=$_GET[msg]?></div>
<?php
}
?>
			
			
                <div class="form-group">
                    <label for="inputEmail3" class="control-label">User Id</label>
                    <div class="input-group">
                        <span class="input-group-addon bg-purple" id="basic-addon9"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                        <input  type="text" class="form-control" id="spid" name='spid' placeholder="User Id" data-error="User Id required" required>
                    </div> <!-- /input-group -->
                    <div class="help-block with-errors"></div>
                </div> <!-- /form-group -->
                <div class="form-group">
                    <button type="submit" class="btn btn-md bg-purple"><span>Submit</span></button>
                    <a href="index.php" class="single-link pull-right m-t-10 m-r-10"> Sign in</a>
                </div> <!-- /form-group -->

            </form> <!-- /form -->
            </div> <!-- /panel-body -->
            </div> <!-- /help -->
    </div> <!-- /panel-->
    </div> <!-- /col -->
</div> <!-- /row -->
</div> <!-- /container -->
</div> <!-- /forgot-password -->

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