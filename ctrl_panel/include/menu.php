<aside class="main-sidebar">

<!-- sidebar -->

<div class="sidebar">

<!-- sidebar menu -->

<ul class="sidebar-menu">

<li class="active">

<a href="dashboard.php"><i class="fa fa-tachometer"></i><span>Dashboard</span>

<span class="pull-right-container">

</span>

</a>

</li>






<?php
$details_link=$my->check_all_asc($con,link,st,1,order_by);
foreach($details_link as $kk=>$kv){

if($_SESSION[login_type]=="superadmin"){
$num_status=1;
}else{
$sqlnum="SELECT * FROM `link` as ln,`sublink` as sln,`authenticate_status` as auth WHERE ln.link_id=sln.link_id AND auth.sublink_id=sln.sublink_id AND auth.employee_id='$_SESSION[employee_id]' AND ln.link_id='$kv[link_id]' AND auth.authen_status='1'";
$resnum=mysqli_query($con,$sqlnum);
$num_status=mysqli_num_rows($resnum);
}
if($num_status>0){
?>

<li class="treeview">
<a href="#"><i class="fa fa-tachometer"></i>
<i class="<?=$kv[link_icon]?>"></i><span> <?=$kv[link_name]?></span>
<span class="pull-right-container"><i class="fa fa-angle-down pull-right"></i></span>
</a>

<?
$sub_details_link=$my->search_row2($con,sublink,link_id,$kv[link_id],st,1);
?>
<ul class="treeview-menu">
<?
foreach($sub_details_link as $kk1=>$kv1){

if($_SESSION[login_type]=="superadmin"){
$snum_status=1;
}else{
$ssqlnum="SELECT * FROM `sublink` as sln,`authenticate_status` as auth WHERE auth.sublink_id=sln.sublink_id AND auth.employee_id='$_SESSION[employee_id]' AND auth.authen_status='1' AND sln.sublink_id='$kv1[sublink_id]'";
$sresnum=mysqli_query($con,$ssqlnum);
$snum_status=mysqli_num_rows($sresnum);
}
if($snum_status>0){

?>
<li><a href="<?=$kv1[sub_url]?>?lid=<?=$kv1[sublink_id]?>"><?=$kv1[sublink_name]?></a></li>
<? }} ?>
</ul>


</li>

<? }} ?>






</ul>

</div>

<!-- /.sidebar -->

</aside>
