<?php

session_start();

function tree_create($con,$v,$table,$id,$date,$join_time){

$sql43="SELECT * FROM `$table` WHERE `spid`='$v'";
$res43=mysqli_query($con,$sql43);
$num43=mysqli_num_rows($res43);
if($num43==0){

$sql44="SELECT * FROM `$table`";
$res44=mysqli_query($con,$sql44);
$num44=mysqli_num_rows($res44);
if($num44==0){
$sql45="INSERT `$table` (`spid`,`doj`,`join_time`,`level`,`binary`)VALUES('$v','$date','$join_time','0','1')";
$res45=mysqli_query($con,$sql45);
}
else{
$sql46="SELECT * FROM `$table` ORDER BY `$id` ASC LIMIT 1";
$res46=mysqli_query($con,$sql46);
$row46=mysqli_fetch_array($res46);
$spid46=$row46[spid];
$_SESSION[level46]=$row46[level];

$sql47="SELECT * FROM `$table` WHERE `parentspid`='$spid46' AND `leg`='L'";
$res47=mysqli_query($con,$sql47);
$num47=mysqli_num_rows($res47);
if($num47==0){
$sql48="INSERT `$table` (`spid`,`doj`,`join_time`,`level`,`binary`,`parentspid`,`leg`)VALUES('$v','$date','$join_time','1','1L','$spid46','L')";
$res48=mysqli_query($con,$sql48);
}else{

$msql49="SELECT * FROM `$table` WHERE `parentspid`='$spid46' AND `leg`='M'";
$mres49=mysqli_query($con,$msql49);
$mnum49=mysqli_num_rows($mres49);
if($mnum49==0){
$msql48="INSERT `$table` (`spid`,`doj`,`join_time`,`level`,`binary`,`parentspid`,`leg`)VALUES('$v','$date','$join_time','1','1M','$spid46','M')";
$mres48=mysqli_query($con,$msql48);
}
else{

$sql49="SELECT * FROM `$table` WHERE `parentspid`='$spid46' AND `leg`='R'";
$res49=mysqli_query($con,$sql49);
$num49=mysqli_num_rows($res49);
if($num49==0){
$sql50="INSERT `$table` (`spid`,`doj`,`join_time`,`level`,`binary`,`parentspid`,`leg`)VALUES('$v','$date','$join_time','1','1R','$spid46','R')";
$res50=mysqli_query($con,$sql50);
}
else{
if($_SESSION[level46]!=""){

$newsql1="SELECT * FROM `$table` WHERE `level`='1'";
$newres1=mysqli_query($con,$newsql1);
while($newrow1=mysqli_fetch_array($newres1)){
$newmem1[]=$newrow1[spid];
}
//print_r($newmem1);
foreach($newmem1 as $k1=>$v1){
$newsql2="SELECT * FROM `$table` WHERE `parentspid`='$v1' AND `leg`='L'";
$newres2=mysqli_query($con,$newsql2);
$newnum2=mysqli_num_rows($newres2);
if($newnum2==0){
$newsql21="SELECT * FROM `$table` WHERE `spid`='$v1'";
$newres21=mysqli_query($con,$newsql21);
$newrow21=mysqli_fetch_array($newres21);


$newbin2=$newrow21[binary]."L";
$newlev2=$newrow21[level]+1;

$newsql22="SELECT * FROM `$table` WHERE `spid`='$v'";
$newres22=mysqli_query($con,$newsql22);
$newnum22=mysqli_num_rows($newres22);
if($newnum22==0){
$sql50="INSERT `$table` (`spid`,`doj`,`join_time`,`level`,`binary`,`parentspid`,`leg`)VALUES('$v','$date','$join_time','$newlev2','$newbin2','$v1','L')";
$res50=mysqli_query($con,$sql50);
}
}
else{

$newsql2="SELECT * FROM `$table` WHERE `parentspid`='$v1' AND `leg`='M'";
$newres2=mysqli_query($con,$newsql2);
$newnum2=mysqli_num_rows($newres2);
if($newnum2==0){
$newsql21="SELECT * FROM `$table` WHERE `spid`='$v1'";
$newres21=mysqli_query($con,$newsql21);
$newrow21=mysqli_fetch_array($newres21);


$newbin2=$newrow21[binary]."M";
$newlev2=$newrow21[level]+1;

$newsql22="SELECT * FROM `$table` WHERE `spid`='$v'";
$newres22=mysqli_query($con,$newsql22);
$newnum22=mysqli_num_rows($newres22);
if($newnum22==0){
$sql50="INSERT `$table` (`spid`,`doj`,`join_time`,`level`,`binary`,`parentspid`,`leg`)VALUES('$v','$date','$join_time','$newlev2','$newbin2','$v1','M')";
$res50=mysqli_query($con,$sql50);
}
}
else{


$newsql2="SELECT * FROM `$table` WHERE `parentspid`='$v1' AND `leg`='R'";
$newres2=mysqli_query($con,$newsql2);
$newnum2=mysqli_num_rows($newres2);
if($newnum2==0){
$newsql21="SELECT * FROM `$table` WHERE `spid`='$v1'";
$newres21=mysqli_query($con,$newsql21);
$newrow21=mysqli_fetch_array($newres21);


$newbin2=$newrow21[binary]."R";
$newlev2=$newrow21[level]+1;

$newsql22="SELECT * FROM `$table` WHERE `spid`='$v'";
$newres22=mysqli_query($con,$newsql22);
$newnum22=mysqli_num_rows($newres22);
if($newnum22==0){
$sql50="INSERT `$table` (`spid`,`doj`,`join_time`,`level`,`binary`,`parentspid`,`leg`)VALUES('$v','$date','$join_time','$newlev2','$newbin2','$v1','R')";
$res50=mysqli_query($con,$sql50);
}
}

}

}


}


$_SESSION[level47]=2;
unset($_SESSION[level46]);
unset($newmem1);
}
if($_SESSION[level47]!=""){
for($i=2;$i<=$_SESSION[level47];$i++){
$newsql1="SELECT * FROM `$table` WHERE `level`='$i'";
$newres1=mysqli_query($con,$newsql1);
while($newrow1=mysqli_fetch_array($newres1)){
$newmem2[]=$newrow1[spid];
}

//print_r($newmem2);
//print "<br>";



foreach($newmem2 as $k1=>$v1){
$newsql2="SELECT * FROM `$table` WHERE `parentspid`='$v1' AND `leg`='L'";
$newres2=mysqli_query($con,$newsql2);
$newnum2=mysqli_num_rows($newres2);
if($newnum2==0){
$newsql21="SELECT * FROM `$table` WHERE `spid`='$v1'";
$newres21=mysqli_query($con,$newsql21);
$newrow21=mysqli_fetch_array($newres21);


$newbin2=$newrow21[binary]."L";
$newlev2=$newrow21[level]+1;

$newsql22="SELECT * FROM `$table` WHERE `spid`='$v'";
$newres22=mysqli_query($con,$newsql22);
$newnum22=mysqli_num_rows($newres22);
if($newnum22==0){
$sql50="INSERT `$table` (`spid`,`doj`,`join_time`,`level`,`binary`,`parentspid`,`leg`)VALUES('$v','$date','$join_time','$newlev2','$newbin2','$v1','L')";
$res50=mysqli_query($con,$sql50);
}
}
else{

$newsql2="SELECT * FROM `$table` WHERE `parentspid`='$v1' AND `leg`='M'";
$newres2=mysqli_query($con,$newsql2);
$newnum2=mysqli_num_rows($newres2);
if($newnum2==0){
$newsql21="SELECT * FROM `$table` WHERE `spid`='$v1'";
$newres21=mysqli_query($con,$newsql21);
$newrow21=mysqli_fetch_array($newres21);


$newbin2=$newrow21[binary]."M";
$newlev2=$newrow21[level]+1;

$newsql22="SELECT * FROM `$table` WHERE `spid`='$v'";
$newres22=mysqli_query($con,$newsql22);
$newnum22=mysqli_num_rows($newres22);
if($newnum22==0){
$sql50="INSERT `$table` (`spid`,`doj`,`join_time`,`level`,`binary`,`parentspid`,`leg`)VALUES('$v','$date','$join_time','$newlev2','$newbin2','$v1','M')";
$res50=mysqli_query($con,$sql50);
}
}
else{

$newsql2="SELECT * FROM `$table` WHERE `parentspid`='$v1' AND `leg`='R'";
$newres2=mysqli_query($con,$newsql2);
$newnum2=mysqli_num_rows($newres2);
if($newnum2==0){
$newsql21="SELECT * FROM `$table` WHERE `spid`='$v1'";
$newres21=mysqli_query($con,$newsql21);
$newrow21=mysqli_fetch_array($newres21);


$newbin2=$newrow21[binary]."R";
$newlev2=$newrow21[level]+1;

$newsql22="SELECT * FROM `$table` WHERE `spid`='$v'";
$newres22=mysqli_query($con,$newsql22);
$newnum22=mysqli_num_rows($newres22);
if($newnum22==0){
$sql50="INSERT `$table` (`spid`,`doj`,`join_time`,`level`,`binary`,`parentspid`,`leg`)VALUES('$v','$date','$join_time','$newlev2','$newbin2','$v1','R')";
$res50=mysqli_query($con,$sql50);
}
}


}

}


}

$tab=$_SESSION[level47]+1;
$newsql51="SELECT * FROM `$table` WHERE `level`='$tab'";
$newres51=mysqli_query($con,$newsql51);
$newnum51=mysqli_num_rows($newres51);
if($newnum51>0){
$_SESSION[level47]=$tab;
}
else{
$_SESSION[level47]=0;
unset($_SESSION[level47]);
}

unset($newmem2);
}
}
}

}


}


}

}


}
?>
