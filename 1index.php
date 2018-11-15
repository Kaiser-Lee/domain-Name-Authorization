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
<!DOCTYPE html>
<head>
<meta name="baidu-site-verification" content="hE6VuDTDDZ" />
<meta name='zyiis_check_verify' content='8522ccc657813a5aa350dbc60e15ac37'>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
<meta name="format-detection" content="telephone=no">
<meta charset="UTF-8">
<meta name="description" content="Violate Responsive Admin Template">
<meta name="keywords" content="Super Admin, Admin, Template, Bootstrap">
<title>授权查询 - 云言卓越版</title>
 <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
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
<section class="middle-box " align="center">
<div class="tile p-15">
<div class="container">
<img id="btnAudio" class="profile-pic animated" src="http://q.qlogo.cn/headimg_dl?bs=qq&dst_uin=80743522&fid=blog&spec=100" alt="">
<form class="form-horizontal" name="myform1" method="post" action="cxjg.php" onsubmit="return CheckPost1();">
<input type="hidden" name="do" value="do">
<div class="form-group">
<section id="main">
<label for="exampleInputEmail1">请输入机器人QQ</label>
<input type="text" name="qq" class="form-control" id="inputPassword3" placeholder="机器人QQ号" autocomplete="off"/>
</div>
<div class="form-group">

<label for="exampleInputPassword1">
</label>
</div>
<p>云言</p>
<div class="fileupload fileupload-new" data-provides="fileupload">
<button type="Submit" href="#" class="btn btn-block btn-alt">查询</button>

<?php
$mod='blank';
include("api.inc.php");

if($url=$_GET['url']) {
	echo '<label><font color="Aqua">查询域名：</label>'.$url.'<br>';
	if(checkauth2($url)) {
		echo '查询结果：正版授权！</font>';
	}else{
		echo '查询结果：该网站未授权！';
	}
}
$DB->close();
?>
</div>
<a data-toggle="modal" href="/buy.php" class="btn btn-sm m-t-10">自助授权</a>
<a data-toggle="modal" href="/dlqq.php" class="btn btn-sm m-t-10">授权商查询</a>
<a href="https://jq.qq.com/?_wv=1027&k=5koeCUS" target="_blank" class="btn btn-sm m-t-10">购买授权</a>
<a data-toggle="modal" href="/get" class="btn btn-sm m-t-10">下载程序</a>
<a href="https://jq.qq.com/?_wv=1027&k=5koeCUS" target="_blank" class="btn btn-sm m-t-10">联系客服</a>
</form>
</div>

<iframe frameborder="no" border="0" marginwidth="0" marginheight="0" width=335 height=210 src="//music.163.com/outchain/player?type=0&id=982689732&auto=0&height=430"></iframe>

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