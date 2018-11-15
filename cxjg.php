<?php
//decode by http://www.yunlu99.com/

//decode by QQ:270656184 http://www.yunlu99.com/

include("api.inc.php");
include 'head.php';
include 'nav.php';
$qq = $_POST['qq'];

$row=$DB->get_row("SELECT * FROM `openvpn` WHERE iuser='$qq' LIMIT 0, 30 ");
if($qq == ''){
echo "<script> alert('请输入你要查询的QQ号');parent.location.href='index.php'; </script>";
}
$bz = $row['notes'];
$wo = $row['i'];
$zr = $row['pass'];
$wwe = substr_replace(''.$zr.'', '***', -4, 3);
if($wo=='0'){
$tishi='QQ：'.$qq.'\\n已禁用\\n' .$bz;
echo "<script> alert('$tishi');parent.location.href='index.php'; </script>";
}else{
if($wo!=1){
$tishi='QQ：'.$qq.'\\n未授权';
echo "<script> alert('$tishi');parent.location.href='index.php'; </script>";
}else{

$tishi='QQ：'.$qq.'\\n已授权\\n主人：'.$wwe;
echo "<script> alert('$tishi');parent.location.href='index.php'; </script>";

}
}