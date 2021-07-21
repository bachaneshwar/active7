<?php
ob_start();
session_start();
if(	$_SESSION[indi_cpanel]!="OnlyIndi19Panel")
{
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?msg=Login First">';		 
}

?>