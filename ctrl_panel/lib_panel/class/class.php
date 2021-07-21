<?
error_reporting(0);
SESSION_START();
ob_start();
date_default_timezone_set ('Asia/Kolkata');
$create_date=date("Y-m-d H:i:s");
$today_date=date("Y-m-d");
ini_set('max_execution_time',3000000000);
$time=time();

$my=new webtech;

// **PREVENTING SESSION HIJACKING**
// Prevents javascript XSS attacks aimed to steal the session ID
ini_set('session.cookie_httponly', 1);

// **PREVENTING SESSION FIXATION**
// Session ID cannot be passed through URLs
ini_set('session.use_only_cookies', 1);

// Uses a secure connection (HTTPS) if possible
ini_set('session.cookie_secure', 1);

if (strpos( $_SERVER['SERVER_NAME'],"localhost")===false)
{
$DB_hostname="localhost";
$DB_username="edulinco_active";
$DB_password="active@123";
$DB_dbname="edulinco_active7";
}
else
{
$DB_hostname="localhost";
$DB_username="root";
$DB_password="";
$DB_dbname="active7";
}
$con = mysqli_connect($DB_hostname,$DB_username,$DB_password,$DB_dbname);




class webtech
{



    /*******************Fetch Field**********/
    function fetchfield($con,$a)
    {
$sql="select * from `".$a."`";
if ($result=mysqli_query($con,$sql))
  {
   // Get field information for all fields
  while ($fieldinfo=mysqli_fetch_field($result))
    {
   $fld[]=$fieldinfo->name;
    }
	// Free result set
  mysqli_free_result($result);
  }
  	return $fld;
	}


	/*******************Insert**********/
	function insert($con,$a,$arr)
	{
		$my=new webtech;
		$ar=$my->fetchfield($con,$a);
		$l=count($ar);
		$l1=count($arr);
		//print_r($arr);
		$sql1="INSERT INTO `".$a."`(";
		foreach($ar as $k=>$v)
		{
			$c++;
			if($c<$l)
				$str=$str."`".$v."`,";
			else
				$str=$str."`".$v."`";

		}
		$sql2=") VALUES (NULL,";
		//print_r($arr);
		foreach($arr as $k1=>$v1)
		{
			$c1++;
		if($k1<$l1-2)
		{
			$v=str_replace("'", "\\'",$v1);
			if($c1<$l1-2)
				$str1=$str1."'".$v."',";
			else
				$str1=$str1."'".$v."' ";
		}
		}
		$sql3=")";
		$sql=$sql1.$str.$sql2.$str1.$sql3;
		$res=mysqli_query($con,$sql);
		$id=mysqli_insert_id($con);
		if($res)
		{
		$msg="Successfully Inserted";
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$_SERVER[PHP_SELF].'?msg='.$msg.'&id='.$id.'">';
		}
	}


function new_insert($con,$a,$url){
$ar=$this->fetchfield($con,$a);
$l=count($ar);
$l1=count($ar);
$sql1="INSERT INTO `".$a."`(";
foreach($ar as $k=>$v)
{
$c++;
if($c<$l)
$str=$str."`".$v."`,";
else
$str=$str."`".$v."`";

}
$sql2=") VALUES (";

foreach($ar as $k1=>$v1)
{
$c1++;

if($c1<$l1)
$str1=$str1."'".mysqli_real_escape_string($con,$_POST[$v1])."',";
else
$str1=$str1."'".mysqli_real_escape_string($con,$_POST[$v1])."' ";

}
$sql3=")";
$sql=$sql1.$str.$sql2.$str1.$sql3;
$res=mysqli_query($con,$sql);
$id=mysqli_insert_id($con);
if($res)
{
$msg="Successfully Inserted";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$url.'&msg='.$msg.'&id='.$id.'">';
}else{
$msg="Operation Failed";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$url.'&msg='.$msg.'">';
}
}




function insert_new($con,$a){
$ar=$this->fetchfield($con,$a);
$l=count($ar);
$l1=count($ar);
$sql1="INSERT INTO `".$a."`(";
foreach($ar as $k=>$v)
{
$c++;
if($c<$l)
$str=$str."`".$v."`,";
else
$str=$str."`".$v."`";

}
$sql2=") VALUES (";

foreach($ar as $k1=>$v1)
{
$c1++;

if($c1<$l1)
$str1=$str1."'".mysqli_real_escape_string($con,$_POST[$v1])."',";
else
$str1=$str1."'".mysqli_real_escape_string($con,$_POST[$v1])."' ";

}
$sql3=")";
$sql=$sql1.$str.$sql2.$str1.$sql3;
$res=mysqli_query($con,$sql);
$id=mysqli_insert_id($con);
}


function insertval1($con,$a,$fld,$val,$url){
$ar=$this->fetchfield($con,$a);
$l=count($ar);
$l1=count($ar);
$sql1="INSERT INTO `".$a."`(";
foreach($ar as $k=>$v)
{
$c++;
if($c<$l)
$str=$str."`".$v."`,";
else
$str=$str."`".$v."`";

}
$sql2=") VALUES (";

foreach($ar as $k1=>$v1)
{
$c1++;

if($c1<$l1)
if($v1==$fld){
$str1=$str1."'".mysqli_real_escape_string($con,$val)."',";
}else{
$str1=$str1."'".mysqli_real_escape_string($con,$_POST[$v1])."',";
}
else
$str1=$str1."'".mysqli_real_escape_string($con,$_POST[$v1])."' ";

}
$sql3=")";
$sql=$sql1.$str.$sql2.$str1.$sql3;
$res=mysqli_query($con,$sql);
$id=mysqli_insert_id($con);
if($res)
{
$msg="Successfully Inserted";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$url.'?&msg='.$msg.'&id='.$id.'">';
}else{
$msg="Operation Failed";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$url.'?&msg='.$msg.'">';
}
}


function insertval2($con,$a,$fld,$val,$fld1,$val1,$url){
$ar=$this->fetchfield($con,$a);
$l=count($ar);
$l1=count($ar);
$sql1="INSERT INTO `".$a."`(";
foreach($ar as $k=>$v)
{
$c++;
if($c<$l)
$str=$str."`".$v."`,";
else
$str=$str."`".$v."`";

}
$sql2=") VALUES (";

foreach($ar as $k1=>$v1)
{
$c1++;

if($c1<$l1){
if($v1==$fld){
$str1=$str1."'".mysqli_real_escape_string($con,$val)."',";
}
else if($v1==$fld1){
$str1=$str1."'".mysqli_real_escape_string($con,$val1)."',";
}
else{
$str1=$str1."'".mysqli_real_escape_string($con,$_POST[$v1])."',";
}

}
else{
$str1=$str1."'".mysqli_real_escape_string($con,$_POST[$v1])."' ";
}

}
$sql3=")";
$sql=$sql1.$str.$sql2.$str1.$sql3;
$res=mysqli_query($con,$sql);
$id=mysqli_insert_id($con);
if($res)
{
$msg="Successfully Inserted";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$url.'?&id='.$id.'">';
}else{
$msg="Operation Failed";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$url.'?&msg='.$msg.'">';
}
}



function ninsertval1($con,$a,$fld,$val){
$ar=$this->fetchfield($con,$a);
$l=count($ar);
$l1=count($ar);
$sql1="INSERT INTO `".$a."`(";
foreach($ar as $k=>$v)
{
$c++;
if($c<$l)
$str=$str."`".$v."`,";
else
$str=$str."`".$v."`";

}
$sql2=") VALUES (";

foreach($ar as $k1=>$v1)
{
$c1++;

if($c1<$l1)
if($v1==$fld){
$str1=$str1."'".mysqli_real_escape_string($con,$val)."',";
}else{
$str1=$str1."'".mysqli_real_escape_string($con,$_POST[$v1])."',";
}
else
$str1=$str1."'".mysqli_real_escape_string($con,$_POST[$v1])."' ";

}
$sql3=")";
$sql=$sql1.$str.$sql2.$str1.$sql3;
$res=mysqli_query($con,$sql);
$id=mysqli_insert_id($con);
if($res)
{
return $id;
}else{
return 0;
}
}

function ninsertval2($con,$a,$fld,$val,$fld1,$val1){
$ar=$this->fetchfield($con,$a);
$l=count($ar);
$l1=count($ar);
$sql1="INSERT INTO `".$a."`(";
foreach($ar as $k=>$v)
{
$c++;
if($c<$l)
$str=$str."`".$v."`,";
else
$str=$str."`".$v."`";

}
$sql2=") VALUES (";

foreach($ar as $k1=>$v1)
{
$c1++;

if($c1<$l1){
if($v1==$fld){
$str1=$str1."'".mysqli_real_escape_string($con,$val)."',";
}
else if($v1==$fld1){
$str1=$str1."'".mysqli_real_escape_string($con,$val1)."',";
}
else{
$str1=$str1."'".mysqli_real_escape_string($con,$_POST[$v1])."',";
}

}
else{
$str1=$str1."'".mysqli_real_escape_string($con,$_POST[$v1])."' ";
}

}
$sql3=")";
$sql=$sql1.$str.$sql2.$str1.$sql3;
$res=mysqli_query($con,$sql);
$id=mysqli_insert_id($con);
if($res)
{
$return_id=$id;
}
}


function insertval3($con,$a,$fld,$val,$fld1,$val1,$fld2,$val2,$url){
$ar=$this->fetchfield($con,$a);
$l=count($ar);
$l1=count($ar);
$sql1="INSERT INTO `".$a."`(";
foreach($ar as $k=>$v)
{
$c++;
if($c<$l)
$str=$str."`".$v."`,";
else
$str=$str."`".$v."`";

}
$sql2=") VALUES (";

foreach($ar as $k1=>$v1)
{
$c1++;

if($c1<$l1){
if($v1==$fld){
$str1=$str1."'".mysqli_real_escape_string($con,$val)."',";
}
else if($v1==$fld1){
$str1=$str1."'".mysqli_real_escape_string($con,$val1)."',";
}
else if($v1==$fld2){
$str1=$str1."'".mysqli_real_escape_string($con,$val2)."',";
}
else{
$str1=$str1."'".mysqli_real_escape_string($con,$_POST[$v1])."',";
}

}
else{
$str1=$str1."'".mysqli_real_escape_string($con,$_POST[$v1])."' ";
}

}
$sql3=")";
$sql=$sql1.$str.$sql2.$str1.$sql3;
$res=mysqli_query($con,$sql);
$id=mysqli_insert_id($con);
if($res)
{
$msg="Successfully Inserted";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$url.'?&msg='.$msg.'&id='.$id.'">';
}else{
$msg="Operation Failed";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$url.'?&msg='.$msg.'">';
}
}


function ninsertval3($con,$a,$fld,$val,$fld1,$val1,$fld2,$val2){
$ar=$this->fetchfield($con,$a);
$l=count($ar);
$l1=count($ar);
$sql1="INSERT INTO `".$a."`(";
foreach($ar as $k=>$v)
{
$c++;
if($c<$l)
$str=$str."`".$v."`,";
else
$str=$str."`".$v."`";

}
$sql2=") VALUES (";

foreach($ar as $k1=>$v1)
{
$c1++;

if($c1<$l1){
if($v1==$fld){
$str1=$str1."'".mysqli_real_escape_string($con,$val)."',";
}
else if($v1==$fld1){
$str1=$str1."'".mysqli_real_escape_string($con,$val1)."',";
}
else if($v1==$fld2){
$str1=$str1."'".mysqli_real_escape_string($con,$val2)."',";
}
else{
$str1=$str1."'".mysqli_real_escape_string($con,$_POST[$v1])."',";
}

}
else{
$str1=$str1."'".mysqli_real_escape_string($con,$_POST[$v1])."' ";
}

}
$sql3=")";
$sql=$sql1.$str.$sql2.$str1.$sql3;
$res=mysqli_query($con,$sql);
if($res)
{
$mid=mysqli_insert_id($con);
}else{
$mid=0;
}
return $mid;
}


function another_new_insert($con,$a,$val,$url)
{
$ar=$this->fetchfield($con,$a);
$l=count($ar);
//print_r($arr);
$sql1="INSERT INTO `".$a."`(";
foreach($ar as $k=>$v)
{
$c++;
if($c<$l)
$str=$str."`".$v."`,";
else
$str=$str."`".$v."`";

}
$sql2=") VALUES (";
foreach($ar as $k1=>$v1)
{
$c1++;
if($k1<$l-1)
{
$str1=$str1."'".mysqli_real_escape_string($con,$_POST[$v1])."',";
}
}
$sql3="'$val')";
$sql=$sql1.$str.$sql2.$str1.$sql3;
$res=mysqli_query($con,$sql);
$id=mysqli_insert_id($con);
if($res)
{
$msg="Successfully Inserted";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$url.'?id='.$id.'">';
}
}

function normal_insert1($con,$tab,$fld1,$val1){
$sql="INSERT INTO `$tab`(`$fld1`)VALUES('$val1')";
$res=mysqli_query($con,$sql);
}

function normal_insert2($con,$tab,$fld1,$val1,$fld2,$val2){
$sql="INSERT INTO `$tab`(`$fld1`,`$fld2`)VALUES('$val1','$val2')";
$res=mysqli_query($con,$sql);
}
function normal_insert3($con,$tab,$fld1,$val1,$fld2,$val2,$fld3,$val3){
$sql="INSERT INTO `$tab`(`$fld1`,`$fld2`,`$fld3`)VALUES('$val1','$val2','$val3')";
$res=mysqli_query($con,$sql);
}

function normal_insert4($con,$tab,$fld1,$val1,$fld2,$val2,$fld3,$val3,$fld4,$val4){
$sql="INSERT INTO `$tab`(`$fld1`,`$fld2`,`$fld3`,`$fld4`)VALUES('$val1','$val2','$val3','$val4')";
$res=mysqli_query($con,$sql);
}

function normal_insert5($con,$tab,$fld1,$val1,$fld2,$val2,$fld3,$val3,$fld4,$val4,$fld5,$val5){
$sql="INSERT INTO `$tab`(`$fld1`,`$fld2`,`$fld3`,`$fld4`,`$fld5`)VALUES('$val1','$val2','$val3','$val4','$val5')";
$res=mysqli_query($con,$sql);
}

function normal_insert6($con,$tab,$fld1,$val1,$fld2,$val2,$fld3,$val3,$fld4,$val4,$fld5,$val5,$fld6,$val6){
$sql="INSERT INTO `$tab`(`$fld1`,`$fld2`,`$fld3`,`$fld4`,`$fld5`,`$fld6`)VALUES('$val1','$val2','$val3','$val4','$val5','$val6')";
$res=mysqli_query($con,$sql);
}

function normal_insert7($con,$tab,$fld1,$val1,$fld2,$val2,$fld3,$val3,$fld4,$val4,$fld5,$val5,$fld6,$val6,$fld7,$val7){
$sql="INSERT INTO `$tab`(`$fld1`,`$fld2`,`$fld3`,`$fld4`,`$fld5`,`$fld6`,`$fld7`)VALUES('$val1','$val2','$val3','$val4','$val5','$val6','$val7')";
$res=mysqli_query($con,$sql);
}

function normal_insert8($con,$tab,$fld1,$val1,$fld2,$val2,$fld3,$val3,$fld4,$val4,$fld5,$val5,$fld6,$val6,$fld7,$val7,$fld8,$val8){
$sql="INSERT INTO `$tab`(`$fld1`,`$fld2`,`$fld3`,`$fld4`,`$fld5`,`$fld6`,`$fld7`,`$fld8`)VALUES('$val1','$val2','$val3','$val4','$val5','$val6','$val7','$val8')";
$res=mysqli_query($con,$sql);
}

function normal_insert9($con,$tab,$fld1,$val1,$fld2,$val2,$fld3,$val3,$fld4,$val4,$fld5,$val5,$fld6,$val6,$fld7,$val7,$fld8,$val8,$fld9,$val9){
$sql="INSERT INTO `$tab`(`$fld1`,`$fld2`,`$fld3`,`$fld4`,`$fld5`,`$fld6`,`$fld7`,`$fld8`,`$fld9`)VALUES('$val1','$val2','$val3','$val4','$val5','$val6','$val7','$val8',
'$val9')";
$res=mysqli_query($con,$sql);
}

function normal_insert10($con,$tab,$fld1,$val1,$fld2,$val2,$fld3,$val3,$fld4,$val4,$fld5,$val5,$fld6,$val6,$fld7,$val7,$fld8,$val8,$fld9,$val9,$fld10,$val10){
$sql="INSERT INTO `$tab`(`$fld1`,`$fld2`,`$fld3`,`$fld4`,`$fld5`,`$fld6`,`$fld7`,`$fld8`,`$fld9`,`$fld10`)VALUES('$val1','$val2','$val3','$val4','$val5','$val6','$val7','$val8',
'$val9','$val10')";
$res=mysqli_query($con,$sql);
}

function normal_insert11($con,$tab,$fld1,$val1,$fld2,$val2,$fld3,$val3,$fld4,$val4,$fld5,$val5,$fld6,$val6,$fld7,$val7,$fld8,$val8,$fld9,$val9,$fld10,$val10,$fld11,$val11){
$sql="INSERT INTO `$tab`(`$fld1`,`$fld2`,`$fld3`,`$fld4`,`$fld5`,`$fld6`,`$fld7`,`$fld8`,`$fld9`,`$fld10`,`$fld11`)VALUES('$val1','$val2','$val3','$val4','$val5','$val6','$val7','$val8','$val9','$val10','$val11')";
$res=mysqli_query($con,$sql);
}

function normal_insert12($con,$tab,$fld1,$val1,$fld2,$val2,$fld3,$val3,$fld4,$val4,$fld5,$val5,$fld6,$val6,$fld7,$val7,$fld8,$val8,$fld9,$val9,$fld10,$val10,$fld11,$val11,$fld12,$val12){
$sql="INSERT INTO `$tab`(`$fld1`,`$fld2`,`$fld3`,`$fld4`,`$fld5`,`$fld6`,`$fld7`,`$fld8`,`$fld9`,`$fld10`,`$fld11`,`$fld12`)VALUES('$val1','$val2','$val3','$val4','$val5','$val6','$val7','$val8','$val9','$val10','$val11','$val12')";
$res=mysqli_query($con,$sql);
}

function normal_insert13($con,$tab,$fld1,$val1,$fld2,$val2,$fld3,$val3,$fld4,$val4,$fld5,$val5,$fld6,$val6,$fld7,$val7,$fld8,$val8,$fld9,$val9,$fld10,$val10,$fld11,$val11,$fld12,$val12,$fld13,$val13){
$sql="INSERT INTO `$tab`(`$fld1`,`$fld2`,`$fld3`,`$fld4`,`$fld5`,`$fld6`,`$fld7`,`$fld8`,`$fld9`,`$fld10`,`$fld11`,`$fld12`,`$fld13`)VALUES('$val1','$val2','$val3','$val4','$val5','$val6','$val7','$val8','$val9','$val10','$val11','$val12','$val13')";
$res=mysqli_query($con,$sql);
}
/*******************Show**********/
function show($con,$a,$upper)
{
   $my=new webtech;
   $ar=$my->fetchfield($con,$a);
   if($_REQUEST[pg])
		$pg=$_REQUEST[pg];
	else
		$pg=1;

   $_SESSION[up]=$upper;
   $_SESSION[lo]=$_SESSION[up]*($pg-1);
   $sql="select * from ".$a." ORDER BY `".$ar[0]."` ASC limit $_SESSION[lo],$_SESSION[up]";
   $res[]=mysqli_query($con,$sql);
   $res[]=$_SESSION[lo];
   return $res;
}


function all_row($con,$a){
$sql="SELECT * FROM `".$a."`";
$res=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($res)){
$title[]=$row;
}
return $title;
}

function all_row_asc($con,$a,$b){
$sql="SELECT * FROM `".$a."` ORDER BY `".$b."` ASC";
$res=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($res)){
$title[]=$row;
}
return $title;
}

function all_num($con,$a){
$sql="SELECT * FROM `$a`";
$res=mysqli_query($con,$sql);
$num=mysqli_num_rows($res);
return $num;
}



function check_all($con,$a,$b,$c){
$sql="SELECT * FROM `".$a."` WHERE `".$b."`='".$c."'";
$res=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($res)){
$title[]=$row;
}
return $title;
}


function check_all_dt($con,$a,$b,$c){
$sql="SELECT * FROM `".$a."` WHERE `".$b."`='".$c."'";
$res=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($res)){
$title[]=$row;
}
return $title;
}

function check_all_asc($con,$a,$b,$c,$d){
$sql="SELECT * FROM `".$a."` WHERE `".$b."`='".$c."' ORDER BY `$d` ASC";
$res=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($res)){
$title[]=$row;
}
return $title;
}

function check_all_desc($con,$a,$b,$c,$d){
$sql="SELECT * FROM `".$a."` WHERE `".$b."`='".$c."' ORDER BY `".$d."` DESC";
$res=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($res)){
$title[]=$row;
}
return $title;
}


function search_row2($con,$a,$b,$c,$d,$e){
$sql="SELECT * FROM `".$a."` WHERE `".$b."`='".$c."' AND `".$d."`='".$e."'";
$res=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($res)){
$title[]=$row;
}
return $title;
}

function search_row2_asc($con,$a,$b,$c,$d,$e,$f){
$sql="SELECT * FROM `".$a."` WHERE `".$b."`='".$c."' AND `".$d."`='".$e."' ORDER BY `".$f."` ASC";
$res=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($res)){
$title[]=$row;
}
return $title;
}



function search_row2_not($con,$a,$b,$c,$d,$e){
$sql="SELECT * FROM `".$a."` WHERE `".$b."`='".$c."' AND `".$d."`<>'".$e."'";
$res=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($res)){
$title[]=$row;
}
return $title;
}

function search_row2_notd($con,$a,$b,$c,$d,$e,$f){
$sql="SELECT * FROM `".$a."` WHERE `".$b."`='".$c."' AND `".$d."`<>'".$e."' ORDER BY `$f` DESC";
$res=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($res)){
$title[]=$row;
}
return $title;
}

function search_row2_less($con,$a,$b,$c,$d,$e){
$sql="SELECT * FROM `".$a."` WHERE `".$b."`='".$c."' AND `".$d."`<='".$e."'";
$res=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($res)){
$title[]=$row;
}
return $title;
}

function search_row2_lesst($con,$a,$b,$c,$d,$e){
$sql="SELECT * FROM `".$a."` WHERE `".$b."`='".$c."' AND `".$d."`<'".$e."'";
$res=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($res)){
$title[]=$row;
}
return $title;
}

function search_row2_grt($con,$a,$b,$c,$d,$e){
$sql="SELECT * FROM `".$a."` WHERE `".$b."`='".$c."' AND `".$d."`>='".$e."'";
$res=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($res)){
$title[]=$row;
}
return $title;
}

function search_row2_grtd($con,$a,$b,$c,$d,$e){
$sql="SELECT * FROM `".$a."` WHERE `".$b."`='".$c."' AND `".$d."`>'".$e."'";
$res=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($res)){
$title[]=$row;
}
return $title;
}

function search_row3($con,$a,$b,$c,$d,$e,$f,$g){
$sql="SELECT * FROM `".$a."` WHERE `".$b."`='".$c."' AND `".$d."`='".$e."' AND `".$f."`='".$g."'";
$res=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($res)){
$title[]=$row;
}
return $title;
}

function search_row4($con,$a,$b,$c,$d,$e,$f,$g,$h,$i){
$sql="SELECT * FROM `".$a."` WHERE `".$b."`='".$c."' AND `".$d."`='".$e."' AND `".$f."`='".$g."' AND `".$h."`='".$i."'";
$res=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($res)){
$title[]=$row;
}
return $title;
}

function search_row4_less($con,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k){
$sql="SELECT * FROM `".$a."` WHERE `".$b."`='".$c."' AND `".$d."`='".$e."' AND `".$f."`='".$g."' AND `".$h."`<='".$i."'";
$res=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($res)){
$title[]=$row;
}
return $title;
}


function search_row5_not($con,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k){
$sql="SELECT * FROM `".$a."` WHERE `".$b."`='".$c."' AND `".$d."`='".$e."' AND `".$f."`='".$g."' AND `".$h."`='".$i."' AND `".$j."`!='".$k."'";
$res=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($res)){
$title[]=$row;
}
return $title;
}

function total_row($con,$a,$b,$c){
$sql="SELECT * FROM `$a` WHERE `$b`='$c'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);
return $row;
}



function second_row($con,$a,$b,$c,$d,$e){
$sql="SELECT * FROM `$a` WHERE `$b`='$c' AND `$d`='$e'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);
return $row;
}

function all($con,$a){
$sql="SELECT * FROM `$a`";
$res=mysqli_query($con,$sql);
$num=mysqli_num_rows($res);
return $num;
}

function total_num($con,$a,$b,$c){
$sql="SELECT * FROM `$a` WHERE `$b`='$c'";
$res=mysqli_query($con,$sql);
$num=mysqli_num_rows($res);
return $num;
}

function second_num($con,$a,$b,$c,$d,$e){
 $sql="SELECT * FROM `$a` WHERE `$b`='$c' AND `$d`='$e'";
$res=mysqli_query($con,$sql);
$num=mysqli_num_rows($res);
return $num;
}

function second_num_not($con,$a,$b,$c,$d,$e){
$sql="SELECT * FROM `$a` WHERE `$b`='$c' AND `$d`!='$e'";
$res=mysqli_query($con,$sql);
$row=mysqli_num_rows($res);
return $num;
}


function third_num($con,$a,$b,$c,$d,$e,$f,$g){
$sql="SELECT * FROM `$a` WHERE `$b`='$c' AND `$d`='$e' AND `$f`='$g'";
$res=mysqli_query($con,$sql);
$num=mysqli_num_rows($res);
return $num;
}

function third_row($con,$a,$b,$c,$d,$e,$f,$g){
$sql="SELECT * FROM `$a` WHERE `$b`='$c' AND `$d`='$e' AND `$f`='$g'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);
return $row;
}



function four_num($con,$a,$b,$c,$d,$e,$f,$g,$h,$i){
$sql="SELECT * FROM `$a` WHERE `$b`='$c' AND `$d`='$e' AND `$f`='$g' AND `$h`='$i'";
$res=mysqli_query($con,$sql);
$num=mysqli_num_rows($res);
return $num;
}

function fifth_num($con,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k){
$sql="SELECT * FROM `$a` WHERE `$b`='$c' AND `$d`='$e' AND `$f`='$g' AND `$h`='$i' AND `$j`='$k'";
$res=mysqli_query($con,$sql);
$num=mysqli_num_rows($res);
return $num;
}

function fourth_row($con,$a,$b,$c,$d,$e,$f,$g,$h,$i){
$sql="SELECT * FROM `$a` WHERE `$b`='$c' AND `$d`='$e' AND `$f`='$g' AND `$h`='$i'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);
return $row;
}

function fifth_row($con,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k){
$sql="SELECT * FROM `$a` WHERE `$b`='$c' AND `$d`='$e' AND `$f`='$g' AND `$h`='$i' AND `$j`='$k'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);
return $row;
}

function like_search($con,$a,$b,$c){
$sql="SELECT * FROM `$a` WHERE `$b` LIKE '$c%'";
$res=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($res)){
$title[]=$row;
}
return $title;
}


function like_search_sec($con,$a,$b,$c,$d,$e){
$sql="SELECT * FROM `$a` WHERE `$b`='$c' AND `$d` LIKE '$e%'";
$res=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($res)){
$title[]=$row;
}
return $title;
}







/*******************Condition Show**********/
function conshow($con,$a,$fld,$val,$upper)
{
   $my=new webtech;
   $ar=$my->fetchfield($con,$a);
   if($_REQUEST[pg])
		$pg=$_REQUEST[pg];
	else
		$pg=1;

   $_SESSION[up]=$upper;
   $_SESSION[lo]=$_SESSION[up]*($pg-1);
   $sql="select * from ".$a." where `".$fld."`='".$val."' ORDER BY `".$ar[0]."` ASC limit $_SESSION[lo],$_SESSION[up]";
   $res[]=mysqli_query($con,$sql);
   $res[]=$_SESSION[lo];
   return $res;
}
/*******************Option Show**********/
function opshow($con,$a)
{
   $my=new webtech;
   $ar=$my->fetchfield($con,$a);
   $sql="select * from ".$a;
   $res=mysqli_query($con,$sql);
   return $res;
}
/*******************Pagging**********/
function pagging($a)
{
	$my=new webtech;
	$ar=$my->fetchfield($con,$a);
	$upper=$_SESSION[up];
	if($_REQUEST[pg])
		$pg=$_REQUEST[pg];
	else
		$pg=1;
	$sql="select * from `".$a." ";
	$res=mysqli_query($con,$sql);
	$num=mysqli_num_rows($res);
	$pgno=intval($num/$upper);
	if($num%$upper!=0)
		$pgno++;
	print "<B>Showing : $pg of $pgno Pages:</B>&nbsp;&nbsp;&nbsp;&nbsp;";
	for($i=1;$i<=$pgno;$i++)
	{
		if($pg==$i)
		print "<a href=''><FONT SIZE=3 COLOR=#FF0000><B>$i</B></FONT></a>&nbsp;";
		else
		print "<a href='".$_SERVER[PHP_SELF]."?pg=$i'>$i</a>&nbsp;";
	}
}
/*******************Condition Pagging**********/
function conpagging($a,$fld,$val)
{
	$my=new webtech;
	$ar=$my->fetchfield($con,$a);
	$upper=$_SESSION[up];
	if($_REQUEST[pg])
		$pg=$_REQUEST[pg];
	else
		$pg=1;
	$sql="select * from `".$a."` where `".$fld."`='".$val."' ";
	$res=mysqli_query($con,$sql);
	$num=mysqli_num_rows($res);
	$pgno=intval($num/$upper);
	if($num%$upper!=0)
		$pgno++;
	print "<B>Showing : $pg of $pgno Pages:</B>&nbsp;&nbsp;&nbsp;&nbsp;";
	for($i=1;$i<=$pgno;$i++)
	{
		if($pg==$i)
		print "<a href=''><FONT SIZE=3 COLOR=#FF0000><B>$i</B></FONT></a>&nbsp;";
		else
		print "<a href='".$_SERVER[PHP_SELF]."?pg=$i'>$i</a>&nbsp;";
	}
}
/*******************Show**********/



function upshow($con,$a)
{
   $my=new webtech;
   $ar=$my->fetchfield($con,$a);
   $eid=$my->decode($_REQUEST[eid]);
   $sql="select * from `".$a."` where `".$ar[0]."`='$eid'";
   $res=mysqli_query($con,$sql);
   $row=mysqli_fetch_array($res);
   return $row;
}
/*******************count row**********/
function countrow($con,$a)
{
   $my=new webtech;
   $ar=$my->fetchfield($con,$a);
   $eid=$my->decode($_REQUEST[eid]);
   $sql="select * from `".$a."`";
   $res=mysqli_query($con,$sql);
   $num=mysqli_num_rows($res);
   return $num;
}
/*******************Search**********/
function search($con,$a,$id)
{
   $my=new webtech;
   $ar=$my->fetchfield($con,$a);
   $sql="select * from `".$a."` where `".$ar[0]."`='$id'";
   $res=mysqli_query($con,$sql);
   $row=mysqli_fetch_array($res);
   return $row;
}
/*******************Search**********/
function othsearch($con,$a,$fld,$id)
{
   $my=new webtech;
   $ar=$my->fetchfield($con,$a);
   $sql="select * from `".$a."` where `".$fld."`='$id'";
   $res=mysqli_query($con,$sql);
   $row=mysqli_fetch_array($res);
   return $row;
}
/*******************Delete**********/
function del($con,$a)
{
	if($_REQUEST[did])
	{
	$my=new webtech;
	$ar=$my->fetchfield($con,$a);
	$did=$my->decode($_REQUEST[did]);
	$sql="delete from `".$a."` where `".$ar[0]."`='$did'";
	$res=mysqli_query($con,$sql);
	//print $res;
	$msg="Successfully Deleted";
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$_SERVER[PHP_SELF].'?msg='.$msg.'">';
	}
}

function delete($con,$a,$b,$c){
$sql="DELETE FROM `$a` WHERE `$b`='$c'";
$res=mysqli_query($con,$sql);
}
/*******************Edit**********/
function edit($con,$a,$upval,$url)
{
	if($_POST[id])
	{
		$my=new webtech;
		$ar=$my->fetchfield($con,$a);
		$c=count($ar)-1;
		//print_r($ar);
		//
		//print_r($upval);
		$up1="UPDATE `".$a."` SET ";
		foreach ($ar as $k=>$v)
		{
			if($k>0)
			{
				$a=$k-1;
				if($c>$k)
				$str=$str."`$v`='$upval[$a]',";
				else
				$str=$str."`$v`='$upval[$a]'";
			}
		}
		$up2=" WHERE `$ar[0]`='$_POST[id]'";
		$update=$up1.$str.$up2;
		mysqli_query($con,$update);
	    $msg="Successfully Updated";
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$url.'?msg='.$msg.'&pg='.$_REQUEST[pg].'">';
	}
}


function new_modify($con,$a,$url,$id){
$ar=$this->fetchfield($con,$a);
$c=count($ar);

$sql="UPDATE `".$a."` SET ";
foreach($ar as $k=>$v){
if($k>0)
{
$a4=$k-1;
if($c-1>$k)
$sql=$sql."`".$v."`"."="."'".mysqli_real_escape_string($con,$_POST[$v])."',";
else
$sql=$sql."`".$v."`"."="."'".mysqli_real_escape_string($con,$_POST[$v])."'";
}
}
$sql.=" WHERE `$ar[0]`='".$id."'";

$res=mysqli_query($con,$sql);
if($res)
{
$msg="Successfully Updated";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$url.'?msg='.$msg.'">';
}
else{
$msg="Operation Failed";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$url.'?&msg='.$msg.'">';
}

}

function new_edit($con,$a,$id){
$ar=$this->fetchfield($con,$a);
$c=count($ar);

$sql="UPDATE `".$a."` SET ";
foreach($ar as $k=>$v){
if($k>0)
{
$a4=$k-1;
if($c-1>$k)
$sql=$sql."`".$v."`"."="."'".mysqli_real_escape_string($con,$_POST[$v])."',";
else
$sql=$sql."`".$v."`"."="."'".mysqli_real_escape_string($con,$_POST[$v])."'";
}
}
$sql.=" WHERE `$ar[0]`='".$id."'";
$res=mysqli_query($con,$sql);
if($res){
return 1;
}else{
return 0;
}
}


function new_modify_val($con,$a,$fld,$val,$url,$id){
$ar=$this->fetchfield($con,$a);
$c=count($ar);

$sql="UPDATE `".$a."` SET ";
foreach($ar as $k=>$v){
if($k>0)
{
$a4=$k-1;
if($c-1>$k){

if($v==$fld){
$sql=$sql."`".$v."`"."="."'".mysqli_real_escape_string($con,$val)."',";
}else{
$sql=$sql."`".$v."`"."="."'".mysqli_real_escape_string($con,$_POST[$v])."',";
}

}
else{
$sql=$sql."`".$v."`"."="."'".mysqli_real_escape_string($con,$_POST[$v])."'";
}
}
}
print $sql.=" WHERE `$ar[0]`='".$id."'";

$res=mysqli_query($con,$sql);
if($res)
{
$msg="Successfully Updated";
//echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$url.'?msg='.$msg.'">';
}
else{
$msg="Operation Failed";
//echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$url.'?&msg='.$msg.'">';
}

}



function new_modify1($con,$a,$url,$id){
$ar=$this->fetchfield($con,$a);
$c=count($ar);

$sql="UPDATE `".$a."` SET ";
foreach($ar as $k=>$v){
if($k>0)
{
$a4=$k-1;
if($c-1>$k)
$sql=$sql."`".$v."`"."="."'".mysqli_real_escape_string($con,$_POST[$v])."',";
else
$sql=$sql."`".$v."`"."="."'".mysqli_real_escape_string($con,$_POST[$v])."'";
}
}
$sql.=" WHERE `$ar[0]`='".$id."'";

$res=mysqli_query($con,$sql);
}


function picture_edit($con,$a,$folder,$url,$id){
$ar=$this->fetchfield($con,$a);
$c=count($ar);

$sql="UPDATE `".$a."` SET ";
foreach($ar as $k=>$v){
if($k>0)
{
$a4=$k-1;
if($c-1>$k)
$sql=$sql."`".$v."`"."="."'".mysqli_real_escape_string($con,$_POST[$v])."',";
else
$sql=$sql."`".$v."`"."="."'".$folder."'";
}
}
$sql.=" WHERE `$ar[0]`='".$id."'";

$res=mysqli_query($con,$sql);
if($res)
{
$msg="Successfully Updated";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$url.'?msg='.$msg.'">';
}
else{
$msg="Operation Failed";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$url.'?&msg='.$msg.'">';
}
}

function normal_UPDATE1($con,$tab,$fld1,$val1,$fld2,$val2){
$sql="UPDATE `$tab` SET `$fld1`='$val1' WHERE `$fld2`='$val2'";
$res=mysqli_query($con,$sql);
}

function normal_UPDATE2($con,$tab,$fld1,$val1,$fld2,$val2,$fld3,$val3){
$sql="UPDATE `$tab` SET `$fld1`='$val1' WHERE `$fld2`='$val2' AND `$fld3`='$val3'";
$res=mysqli_query($con,$sql);
}

function normal_UPDATE3($con,$tab,$fld1,$val1,$fld2,$val2,$fld3,$val3){
$sql="UPDATE `$tab` SET `$fld1`='$val1',`$fld2`='$val2' WHERE `$fld3`='$val3'";
$res=mysqli_query($con,$sql);
}

function normal_UPDATE4($con,$tab,$fld1,$val1,$fld2,$val2,$fld3,$val3,$fld4,$val4){
$sql="UPDATE `$tab` SET `$fld1`='$val1',`$fld2`='$val2',`$fld3`='$val3' WHERE `$fld4`='$val4'";
$res=mysqli_query($con,$sql);
}

function normal_UPDATE5($con,$tab,$fld1,$val1,$fld2,$val2,$fld3,$val3,$fld4,$val4,$fld5,$val5){
$sql="UPDATE `$tab` SET `$fld1`='$val1',`$fld2`='$val2',`$fld3`='$val3',`$fld4`='$val4' WHERE `$fld5`='$val5'";
$res=mysqli_query($con,$sql);
}

function normal_UPDATE6($con,$tab,$fld1,$val1,$fld2,$val2,$fld3,$val3,$fld4,$val4,$fld5,$val5,$fld6,$val6){
 $sql="UPDATE `$tab` SET `$fld1`='$val1',`$fld2`='$val2',`$fld3`='$val3',`$fld4`='$val4',`$fld5`='$val5' WHERE `$fld6`='$val6'";
$res=mysqli_query($con,$sql);
}

function normal_UPDATE8($con,$tab,$fld1,$val1,$fld2,$val2,$fld3,$val3,$fld4,$val4,$fld5,$val5,$fld6,$val6,$fld7,$val7,$fld8,$val8){
$sql="UPDATE `$tab` SET `$fld1`='$val1',`$fld2`='$val2',`$fld3`='$val3',`$fld4`='$val4',`$fld5`='$val5',`$fld6`='$val6',`$fld7`='$val7' WHERE `$fld8`='$val8'";
$res=mysqli_query($con,$sql);
}


function normal_UPDATE11($con,$tab,$fld1,$val1,$fld2,$val2,$fld3,$val3,$fld4,$val4,$fld5,$val5,$fld6,$val6,$fld7,$val7,$fld8,$val8
,$fld9,$val9,$fld10,$val10,$fld11,$val11,$fld12,$val12){
$sql="UPDATE `$tab` SET `$fld1`='$val1',`$fld2`='$val2',`$fld3`='$val3',`$fld4`='$val4',`$fld5`='$val5',`$fld6`='$val6',
`$fld7`='$val7',`$fld8`='$val8',`$fld9`='$val9',`$fld10`='$val10',`$fld11`='$val11' WHERE `$fld12`='$val12'";
$res=mysqli_query($con,$sql);
}

function normal_UPDATE12($con,$tab,$fld1,$val1,$fld2,$val2,$fld3,$val3,$fld4,$val4,$fld5,$val5,$fld6,$val6,$fld7,$val7,$fld8,$val8
,$fld9,$val9,$fld10,$val10,$fld11,$val11,$fld12,$val12,$fld13,$val13){
$sql="UPDATE `$tab` SET `$fld1`='$val1',`$fld2`='$val2',`$fld3`='$val3',`$fld4`='$val4',`$fld5`='$val5',`$fld6`='$val6',
`$fld7`='$val7',`$fld8`='$val8',`$fld9`='$val9',`$fld10`='$val10',`$fld11`='$val11',`$fld12`='$val12'  WHERE `$fld13`='$val13'";
$res=mysqli_query($con,$sql);
}

function normal_UPDATE13($con,$tab,$fld1,$val1,$fld2,$val2,$fld3,$val3,$fld4,$val4,$fld5,$val5){
$sql="UPDATE `$tab` SET `$fld1`='$val1',`$fld2`='$val2',`$fld3`='$val3' WHERE `$fld4`='$val4' AND `$fld5`='$val5'";
$res=mysqli_query($con,$sql);
}


function normal_UPDATE14($con,$tab,$fld1,$val1,$fld2,$val2,$fld3,$val3,$fld4,$val4){
$sql="UPDATE `$tab` SET `$fld1`='$val1' WHERE `$fld2`='$val2' AND `$fld3`='$val3' AND `$fld4`='$val4'";
$res=mysqli_query($con,$sql);
}


function normal_UPDATE15($con,$tab,$fld1,$val1,$fld2,$val2,$fld3,$val3,$fld4,$val4,$fld5,$val5,$fld6,$val6,$fld7,$val7,$fld8,$val8
,$fld9,$val9,$fld10,$val10,$fld11,$val11){
$sql="UPDATE `$tab` SET `$fld1`='$val1',`$fld2`='$val2',`$fld3`='$val3',`$fld4`='$val4',`$fld5`='$val5',`$fld6`='$val6',
`$fld7`='$val7',`$fld8`='$val8',`$fld9`='$val9' WHERE `$fld10`='$val10' AND `$fld11`='$val11'";
$res=mysqli_query($con,$sql);
}

function normal_UPDATE16($con,$tab,$fld1,$val1,$fld2,$val2,$fld3,$val3,$fld4,$val4,$fld5,$val5,$fld6,$val6){
 $sql="UPDATE `$tab` SET `$fld1`='$val1',`$fld2`='$val2',`$fld3`='$val3',`$fld4`='$val4' WHERE `$fld5`='$val5' AND `$fld6`='$val6'";
$res=mysqli_query($con,$sql);
}


function normal_UPDATE17($con,$tab,$fld1,$val1,$fld2,$val2,$fld3,$val3,$fld4,$val4,$fld5,$val5,$fld6,$val6,$fld7,$val7,$fld8,$val8
,$fld9,$val9,$fld10,$val10,$fld11,$val11,$fld12,$val12,$fld13,$val13,$fld14,$val14){
$sql="UPDATE `$tab` SET `$fld1`='$val1',`$fld2`='$val2',`$fld3`='$val3',`$fld4`='$val4',`$fld5`='$val5',`$fld6`='$val6',
`$fld7`='$val7',`$fld8`='$val8',`$fld9`='$val9',`$fld10`='$val10',`$fld11`='$val11',`$fld12`='$val12',`$fld13`='$val13'  WHERE `$fld14`='$val14'";
$res=mysqli_query($con,$sql);
}


function encode($a)
{
$str1=md5(rand());
$str2=md5(rand());
$str=$str1.$a.$str2;
return $str;
}
function decode($a)
{
$str1=substr($a,32);
$str1=substr($str1,0,-32);
return $str1;
}

function int_to_words($x)
{
	$nwords = array("zero","One","Two","Three","Four","Five","Six","Seven","Eight", "Nine", "ten", "Eleven", "Twelve", "Thirteen","Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eighteen","Nineteen", "Twenty", 30 => "Thirty", 40 => "Forty",50 => "Fifty", 60 => "Sixty", 70 => "Seventy", 80 => "Eighty",90 => "Ninety" );
	 	     if(!is_numeric($x))
 	     {
 	         $w = '#';
 	     }else if(fmod($x, 1) != 0)
 	     {
	         $w = '#';
 	     }else{
 	         if($x < 0)
 	         {
 	             $w = 'Minus ';
 	             $x = -$x;
 	         }else{
 	             $w = '';
 	         }
 	         if($x < 21)
 	         {
 	             $w .= $nwords[$x];
 	         }else if($x < 100)
 	         {
 	             $w .= $nwords[10 * floor($x/10)];
 	             $r = fmod($x, 10);
 	             if($r > 0)
 	             {
 	                 $w .= ' '. $nwords[$r];
 	             }
 	         } else if($x < 1000)
 	         {
 	             $w .= $nwords[floor($x/100)] .' Hundred';
 	             $r = fmod($x, 100);
 	             if($r > 0)
 	             {
 	                 $w .= ' and '. $this->int_to_words($r);
 	             }
 	         } else if($x < 1000000)
 	         {
 	             $w .= $this->int_to_words(floor($x/1000)) .' Thousand';
 	             $r = fmod($x, 1000);
 	             if($r > 0)
 	             {
 	                 $w .= ' ';
 	                 if($r < 100)
 	                 {
 	                     $w .= 'and ';
 	                 }
 	                 $w .= $this->int_to_words($r);
 	             }
 	         } else {
 	             $w .= $this->int_to_words(floor($x/1000000)) .' Million';
 	             $r = fmod($x, 1000000);
 	             if($r > 0)
 	             {
 	                 $w .= ' ';
 	                 if($r < 100)
 	                 {
 	                     $word .= 'and ';
 	                 }
 	                 $w .= $this->int_to_words($r);
 	             }
 	         }
 	     }
 	     return $w;
 	 }

function insertval4($con,$a,$fld,$val,$fld1,$val1,$fld2,$val2,$fld3,$val3,$url){
$ar=$this->fetchfield($con,$a);
$l=count($ar);
$l1=count($ar);
$sql1="INSERT INTO `".$a."`(";
foreach($ar as $k=>$v)
{
$c++;
if($c<$l)
$str=$str."`".$v."`,";
else
$str=$str."`".$v."`";

}
$sql2=") VALUES (";

foreach($ar as $k1=>$v1)
{
$c1++;

if($c1<$l1){
if($v1==$fld){
$str1=$str1."'".mysqli_real_escape_string($con,$val)."',";
}
else if($v1==$fld1){
$str1=$str1."'".mysqli_real_escape_string($con,$val1)."',";
}
else if($v1==$fld2){
$str1=$str1."'".mysqli_real_escape_string($con,$val2)."',";
}
else if($v1==$fld3){
$str1=$str1."'".mysqli_real_escape_string($con,$val3)."',";
}
else{
$str1=$str1."'".mysqli_real_escape_string($con,$_POST[$v1])."',";
}

}
else{
$str1=$str1."'".mysqli_real_escape_string($con,$_POST[$v1])."' ";
}

}
$sql3=")";
$sql=$sql1.$str.$sql2.$str1.$sql3;
$res=mysqli_query($con,$sql);
$id=mysqli_insert_id($con);
if($res)
{
$msg="Successfully Inserted";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$url.'?&msg='.$msg.'&id='.$id.'">';
}else{
$msg="Operation Failed";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$url.'?&msg='.$msg.'">';
}
}
  function mkdate($a)
  {
  $s1=explode("/",$a);
  $s2=strtotime(trim($s1[2])."/".trim($s1[1])."/".trim($s1[0]));
  return $s2;
  }
  function spildate($a,$b,$c)
  {
  $s1=explode($b,$a);
  $s2=trim($s1[0]).$c.trim($s1[1]).$c.trim($s1[2]);
  return $s2;
  }
  function password($a)
  {
  $characters = array(
	"A","B","C","D","E","F","G","H","J","K","L","M",
	"N","P","Q","R","S","T","U","V","W","X","Y","Z",
	"1","2","3","4","5","6","7","8","9");
	$keys = array();
	while(count($keys) < $a) {
    $x = mt_rand(0, count($characters)-1);
    if(!in_array($x, $keys)) {
       $keys[] = $x;
    }
	}
	foreach($keys as $key){
	  $random_chars .= $characters[$key];
	}
	return $random_chars;
	 }

	 function difference_month($join_dt,$end_dt){
		$date1 = $join_dt;
		$date2 = $end_dt;
		$ts1 =strtotime($date1);
		$ts2 = strtotime($date2);
		$year1 = date('Y', $ts1);
		$year2 = date('Y', $ts2);
		$month1 = date('m', $ts1); $month2 = date('m', $ts2);
		$diff = (($year2 - $year1) * 12) + ($month2 - $month1) + 1 ;
		return $diff;
	}
}
?>
