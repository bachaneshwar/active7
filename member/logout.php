<?php
session_start();

//$_SESSION["flag"]="";
//unset($_SESSION["flag"]);

session_destroy();

header("location:index.php?msg=Logout successfully");

?>
