<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes" />
   <meta name="description" itemprop="description" content="在这里查询您的授权" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<link rel="stylesheet" type="text/css" href="456/css/style.css" />
    <title>授权查询-云言商业版</title>
    <!--baidu-->
    <meta name="baidu-site-verification" content="4IPJiuihDj" />
    <!-- Bootstrap -->
    <link href="456/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="456/css/sweetalert.css"/>

    <script src="456/js/jquery.min.js"></script>
    <script src="456/js/bootstrap.min.js"></script>
	<script src="456/js/sweetalert.min.js"></script>
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
        <h3 class="text-muted" align="left">正版授权查询</h3>
        <ul class="nav nav-pills pull-right" role="tablist">
          <a class="xx" href="index.php"><span class="btn btn-info btn-sm" class="active">正版查询</a></span>
          <a class="xx" href="index.php"><span class="btn btn-info btn-sm">等待添加</a></span>
<a class="xx" href="dlqq.php"><span class="btn btn-info btn-sm">授权商查询</a></span>
<a class="xx" href="./index.php"><span class="btn btn-info btn-sm">等待添加</a></span>
        </ul>
     </div></br><hr>
	<form class="form-horizontal" name="myform1" method="post" action="cxjg.php" onsubmit="return CheckPost1();">
						<span class="heading">查询QQ授权</span>
	 (输入机器人QQ)
	 <input type="text" class="form-control" name="qq" value=""><br>
	 <input type="submit" class="btn btn-info btn-sm" name="submit" value="立即查询"><br/>
	 
<?php
$mod='blank';
include("api.inc.php");

if($url=$_GET['url']) {
	echo '<label>查询域名：</label>'.$url.'<br>';
	if(checkauth2($url)) {
		echo '<div class="alert alert-success"><img src="static/ico_success.png">查询结果：正版授权！</div>';
	}else{
		echo '<div class="alert alert-danger"><img src="static/ico_tip.png">查询结果：该网站未授权！</div>';
	}
}
$DB->close();
?>
	 	 <hr><div class="container-fluid">
  <!-- <a href="http://sy.521sun.cn/admin" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-credit-card"></span>后台</a> -->
	<a href="./80743522" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-credit-card"></span>后台</a>
  <a href="" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-exclamation-sign"></span> 帮助</a> 
  <button type="button" class="btn btn-info btn-sm" data-toggle="collapse" data-target="#lxkf-1"><span class="glyphicon glyphicon-user"></span> 客服</button> 
  <a href="http://wpa.qq.com/msgrd?v=3&uin=80743522&site=qq&menu=yes" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-pencil"></span> 反馈</a>
</div>
<p style="text-align:center"><br>&copy; Powered by <a href="http://wpa.qq.com/msgrd?v=3&uin=80743522&site=qq&menu=yes">云言科技</a>!</p>
 梦想还是要有的，万一实现了呢？<br/>
<img border="0" width="32" src="456/picture/mgt.gif"><img border="0" width="32" src="456/picture/mt.gif"><img border="0" width="32" src="456/picture/mt6.gif"><img border="0" width="32" src="456/picture/mt.gif"><img border="0" width="32" src="456/picture/mgt.gif">
</center></div>
</body>
</html>