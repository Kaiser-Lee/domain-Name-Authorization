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
﻿<?php
include("./api.inc.php");
require './config.php';
if($_POST['do'] == 'do'){
	$km = $_POST['km'];
	$qq = $_POST['qq'];
	$url = $_POST['url'];
	$date = date("Y-m-d H-i-s");
	$row1=$DB->get_row("SELECT * FROM auth_site WHERE 1 order by sign desc limit 1");
	$row2=$DB->get_row("SELECT * FROM auth_site WHERE uid='{$qq}' limit 1");
	$row3=$DB->get_row("SELECT * FROM auth_site WHERE url='{$url}' limit 1");
	$sign=$row1['sign']+1;
	$authcode=md5(random(32).$qq);
	$row = $DB->get_row("SELECT * FROM auth_kms WHERE km = '{$km}'");
	if($km == '' or $qq == '' or $url ==''){
		exit("<script language='javascript'>alert('所有项不能留空!');history.go(-1);</script>");
	}
	if(!$row){
		exit("<script language='javascript'>alert('此卡密不存在!');history.go(-1);</script>");
	}else if($row['zt'] == '0'){
		exit("<script language='javascript'>alert('此卡密已使用！');history.go(-1);</script>");
	}else if($row3 != ''){
		exit("<script language='javascript'>alert('平台已存在此域名！');history.go(-1);</script>");
	}else if($row2 != ''){
		$DB->query("update auth_kms set zt = '0' where id='{$row['id']}'");
		$DB->query("INSERT INTO auth_site (`uid`, `url`, `date`, `authcode`, `sign`,`active`) VALUES ('$qq', '$url', '$date', '".$row2['authcode']."', '".$row2['sign']."', '1')");
		exit("<script language='javascript'>alert('授权成功!');history.go(-1);</script>");
	}else{
		$DB->query("update auth_kms set zt = '0' where id='{$row['id']}'");
		$DB->query("INSERT INTO auth_site (`uid`, `url`, `date`, `authcode`, `sign`,`active`) VALUES ('$qq', '$url', '$date', '$authcode', '$sign', '1')");
		exit("<script language='javascript'>alert('授权成功!');history.go(-1);</script>");
	}
}
?>
<!DOCTYPE html>
<head>
<meta name="baidu-site-verification" content="hE6VuDTDDZ" />
<meta name='zyiis_check_verify' content='8522ccc657813a5aa350dbc60e15ac37'>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
<meta name="format-detection" content="telephone=no">
<meta charset="UTF-8">
<meta name="description" content="Violate Responsive Admin Template">
<meta name="keywords" content="Super Admin, Admin, Template, Bootstrap">
<title>自助授权 - 正版授权系统</title>
<link href="static/css/music.css" rel="stylesheet">
<link href="static/css/bootstrap.min.css" rel="stylesheet">
<link href="static/css/animate.min.css" rel="stylesheet">
<link href="static/css/font-awesome.min.css" rel="stylesheet">
<link href="static/css/form.css" rel="stylesheet">
<link href="static/css/calendar.css" rel="stylesheet">
<link href="static/css/file-manager.css" rel="stylesheet">
<link href="static/css/style.css" rel="stylesheet">
<link href="static/css/icons.css" rel="stylesheet">
<link href="static/css/generics.css" rel="stylesheet">
<STYLE>.loginscreen.middle-box{width:300px;}.middle-box{max-width:400px;z-index:100;margin:0 auto;padding-top:100px;}</STYLE>
<script>
var _hmt = _hmt || [];
(function() {
var hm = document.createElement("script");
hm.src = "https://hm.baidu.com/hm.js?0de8a795db3f2bcc6c9c374ab7468d22";
var s = document.getElementsByTagName("script")[0];
s.parentNode.insertBefore(hm, s);
})();
</script>
</head>
<body id="skin-blur-violate">
<section id="main">
<section class="middle-box " align="center">
<div class="tile p-15">
<div class="container">
<img id="btnAudio" class="profile-pic animated" src="http://q.qlogo.cn/headimg_dl?bs=qq&dst_uin=760611885&fid=blog&spec=100" alt="">
<form class="form-horizontal" method="post" action="">
<input type="hidden" name="do" value="do">
<div class="form-group">
<label for="exampleInputEmail1">自助授权</label>
<div class="panel-body">
<label for="exampleInputEmail1">卡密</label>
 <input type="text" name="km" class="form-control" placeholder="请输入卡密!">
 <label for="exampleInputEmail1">域名</label>
 <input type="text" name='url' class="form-control" placeholder="请输入域名(不加http://)">
 <label for="exampleInputEmail1">QQ</label>
 <input type="text" name='qq' class="form-control" placeholder="请输入QQ!">
</div>
<div class="form-group">
</label>
</div>
<div class="fileupload fileupload-new" data-provides="fileupload">
<button type="submit" class="btn btn-block btn-alt" >确认授权</button>
</div>
<a data-toggle="modal" href="javascript:history.back(-1)" class="btn btn-sm m-t-10">返回上一页</a>
<a data-toggle="modal" href="/buy.php" class="btn btn-sm m-t-10">自助授权</a>
<a href="https://jq.qq.com/?_wv=1027&k=5koeCUS" target="_blank" class="btn btn-sm m-t-10">加入Q群</a>
<a href="https://jq.qq.com/?_wv=1027&k=5koeCUS" target="_blank" class="btn btn-sm m-t-10">购买授权</a>
</form>
</div>
<script src="get/qrlogin.js"></script>
<script src="static/js/jquery.min.js"></script>  
<script src="static/js/jquery-ui.min.js"></script>  
<script src="static/js/bootstrap.min.js"></script>
<script src="static/js/scroll.min.js"></script>  
<script src="static/js/calendar.min.js"></script>  
<script src="static/js/feeds.min.js"></script>  
<script src="static/js/elfinder.min.js"></script>  
<script src="static/js/music.js"></script>
<script type="text/javascript">
            $(document).ready(function() {
                 $('#fileManager').elfinder({
                      resizable: false,
                      url : 'php/connector.minimal.php',  // connector URL (REQUIRED)
                      uiOptions : {
                      toolbar : [
                              ['back', 'forward', 'home', 'reload'],
                              ['mkdir', 'mkfile', 'upload'],
                              ['view', 'sort'],
                              ['search']
                      ]},
                      height: 500
                 });
                 
                 $('.elfinder-cwd-wrapper, .elfinder-navbar').niceScroll();
            });
</script>
</body>
</html>