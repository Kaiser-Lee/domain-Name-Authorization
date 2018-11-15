<?php
$mod='blank';
include("../api.inc.php");
$title='配置操作';
include './head.php';
if($islogin==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
include './nav.php';
?>
    <div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
<?php
$user = daddslashes($_GET['user']);
if(!$user || !$row = $DB->get_row("select * from `openvpn` where id='$user' limit 1")){ exit("账号不存在!");}
if($_POST['type']=="update"){
echo '<div class="panel panel-default">
<div class="panel-heading"><h3 class="panel-title">修改信息结果</h3></div>
<div class="panel-body">';
$notes = daddslashes($_POST['notes']);
$fwqid = daddslashes($_POST['fwqid']);
$pass = daddslashes($_POST['pass']);
$paaa = daddslashes($_POST['paaa']);
$state = daddslashes($_POST['state']);
$irecv = daddslashes($_POST['irecv']);
	if($DB->query("update `openvpn` set `iuser`='$paaa',`pass`='$pass',`irecv`='$irecv',`i`='$state',`notes`='$notes' where id='$user'")){
		echo '修改成功！';
	}else{
		echo '修改失败！'.$DB->error();
	}
echo '<hr/><a href="./qqlist.php">>>返回账号列表</a></div></div>';
exit;
}
?>
<div class="panel panel-default">
        <div class="panel-heading"><h3 class="panel-title">机器人QQ:<?=$row['iuser']?> 配置</h3></div>
        <div class="panel-body">
          <form action="./qset.php?user=<?=$user?>" method="post" class="form-horizontal" role="form">
          <input type="hidden" name="type" value="update" />
		  <div class="input-group">
              <span class="input-group-addon">机器人QQ</span>
			  <input type="text" name="paaa" value="<?=$row['iuser']?>" class="form-control">
            </div><br/>
          	<div class="input-group">
              <span class="input-group-addon">主人QQ</span>
			  <input type="text" name="pass" value="<?=$row['pass']?>" class="form-control">
            </div><br/>
			 <div class="input-group">
              <span class="input-group-addon">加群状态</span>
			  <select name="irecv" class="form-control">
              	<option value="0">0_未加群</option>
				<option value="1" <?=$row['irecv']?"selected":''?>>1_已加群</option>
              </select>
            </div><br/>
            <div class="input-group">
              <span class="input-group-addon">授权状态</span>
			  <select name="state" class="form-control">
              	<option value="0">0_禁用</option>
				<option value="1" <?=$row['i']?"selected":''?>>1_开通</option>
              </select>
            </div><br/>
            <div class="input-group">
			  <span class="input-group-addon">备注</span>
              <input type="text" name="notes" value="<?=$row['notes']?>" class="form-control" />
            </div><br/>
            <div class="form-group">
              <div class="col-sm-12"><input type="submit" name="submit" value="修改" class="btn btn-primary form-control"/></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="../date