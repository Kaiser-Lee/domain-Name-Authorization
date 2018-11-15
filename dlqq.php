<?php
// $uarowser=$_SERVER['HTTP_USER_AGENT'];

// if(strstr($uarowser, 'MSIE 6') || strstr($uarowser, 'MSIE 7') || strstr($uarowser, 'MSIE 8')){
//  // echo 5005;
//  exit;
// }


	// //代理IP直接退出
	// empty($_SERVER['HTTP_VIA']) or exit('error : xinkagou');
	// //防止快速刷新
	// session_start();
	// $seconds = '2'; //时间段[秒]
	// $refresh = '5'; //刷新次数
	// //设置监控变量
	// $cur_time = time();
	// if(isset($_SESSION['last_time'])){
	//  $_SESSION['refresh_times'] += 1;
	// }else{
	//  $_SESSION['refresh_times'] = 1;
	//  $_SESSION['last_time'] = $cur_time;
	// }
	// //处理监控结果
	// if($cur_time - $_SESSION['last_time'] < $seconds){
	//  if($_SESSION['refresh_times'] >= $refresh){
	//   //跳转至攻击者服务器地址
	//   header(sprintf('Location:%s', 'http://127.0.0.1'));
	//   exit('error : xinkagou');
	//  }
	// }else{
	//  $_SESSION['refresh_times'] = 0;
	//  $_SESSION['last_time'] = $cur_time;
	// }
?>
<?php 
include("api.inc.php");
if($confs['switch']=='0')
exit('系统正在升级中，请稍后访问。');
?>
<!--By：小杰-->
<!--由小杰二次修改-->
<!DOCTYPE html>
<!--[if IE 9 ]>
<html class="ie9">
<![endif]-->
<head>


<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<link rel="stylesheet" type="text/css" href="456/css/style.css" />
    <title>授权商查询</title>
    <!--baidu-->
    <meta name="baidu-site-verification" content="4IPJiuihDj" />
    <!-- Bootstrap -->
    <link href="456/css/bootstrap.css" rel="stylesheet">
    <script src="456/js/jquery.min.js"></script>
    <script src="456/js/bootstrap.min.js"></script>
    <!--[if lt IE 9]>
      <script src="456/js/html5shiv.min.js"></script>
      <script src="456/js/respond.min.js"></script>
    <![endif]-->
	<style>
	body{
		margin: 0 auto;
		text-align: center;
	}
	.container {
	  max-width: 580px;
	  padding: 15px;
	  margin: 0 auto;
	}
	.xx{
		float: left;
	}
	.xxbj {
	color: #31708f;
	background-color: rgba(217, 237, 247, 0.73);
	border-color: #bce8f1;

	padding: 15px;
	margin-bottom: 20px;
	border: 1px solid transparent;
	border-radius: 3px;
	}
	.xxwl-transparent {
	display: block;
	width: 100%;
	height: 34px;
	padding: 6px 12px;
	font-size: 14px;
	line-height: 1.42857143;
	color: #555;
	background-color: rgba(255, 255, 255, 0.48);
	background-image: none;
	border: 1px solid #ccc;
	border-radius: 4px;
	-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
	box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
	-webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
	-o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
	transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
	}
	body {

	background-image: url(456/images/login.jpg);
	background-repeat: no-repeat;	
}
	</style>
	<script type="text/javascript">
	  function getValue(obj,str){
	  var input=window.document.getElementById(obj);
	  input.value=str;
	  }
  </script>
<script> 
function stop(){ return false; } 
document.oncontextmenu=stop; 
</script> 
</head>
<body>

<br>
<br>
<br>
<div class="container xxbj">    <div class="header">
        <ul class="nav nav-pills pull-right" role="tablist">
          <a class="xx" href="index.php"><span class="btn btn-info btn-sm" class="active">正版查询</a></span>
          <a class="xx" href="buy.php"><span class="btn btn-info btn-sm">自助授权</a></span>
        </ul>
        <h3 class="text-muted" align="left">正版授权商查询</h3>
     </div><hr>
	 <h3 class="form-signin-heading">请输入授权商QQ</h3>
<form action="" class="form-sign" method="post">
<input type="hidden" name="do" value="do">
<div class="form-group">
<section id="main">
<div class="panel-heading">请输入QQ进行查询</div>
<div class="panel-body">
比如：80743522
<input type="text" class="form-control" name="dlqq" placeholder="请输入QQ进行查询" value=""><br>
</div>
<div class="form-group">
<label for="exampleInputPassword1">

<div class="fileupload fileupload-new" data-provides="fileupload">
	 <input type="submit" class="btn btn-info btn-sm" name="submit" value="点击查询"><br/>
<?php
if($dlqq=$_POST['dlqq']) {
	$dlqq=$_POST['dlqq'];
	$row=$DB->get_row("SELECT * FROM auth_user WHERE dlqq='$dlqq' limit 1");
	echo '<div class="panel-body"><font color="red">查询QQ：<font color="red">'.$dlqq.'';
	if($row) {
		echo '
		</p><font color="red">该QQ是授权商，请放心交易！</p>';
?>
<?php
	}else{
		echo '</p><font color="red">该QQ不是授权商，请立即结束交易！</p>';
	}
}
$DB->close();
?>
	 
	 <hr><div class="container-fluid">
  <a href="http://auth.521sun.cn/admin" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-credit-card"></span>后台</a>
  <a href="" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-exclamation-sign"></span> 帮助</a> 
  <button type="button" class="btn btn-info btn-sm" data-toggle="collapse" data-target="#lxkf-1"><span class="glyphicon glyphicon-user"></span> 客服</button> 
  <a href="http://wpa.qq.com/msgrd?v=3&uin=80743522&site=qq&mmenu=yes" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-pencil"></span> 反馈</a>
<p style="text-align:center"><br>&copy; Powered by <a href="http://wpa.qq.com/msgrd?v=3&uin=80743522&site=qq&menu=yes">云言科技</a>!</p>
</div>
</div>
</body>
</html>