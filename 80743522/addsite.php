<?php
/**
 * 添加站点
**/
$mod='blank';
include("../api.inc.php");
$title='添加站点';
include './head.php';
if($islogin==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
?>
<div class="col-lg-8 col-md-12 col-lg-offset-2 text-center">
<div class="panel panel-info" draggable="true">
<?php
/*if($udata['per_db']==0) {
	showmsg('您的账号没有权限使用此功能',3);
	exit;
}*/
if(isset($_POST['qq']) && isset($_POST['iuser'])){
$qq=daddslashes($_POST['qq']);
$iuser=daddslashes($_POST['iuser']);
$row=$DB->get_row("SELECT * FROM openvpn WHERE pass='{$qq}' limit 1");
if($row=='')exit("<script language='javascript'>alert('授权平台不存在该QQ！');history.go(-1);</script>");

$iuser_arr=explode(',',$iuser);
$re='';
foreach($iuser_arr as $val) {
	$row1=$DB->get_row("SELECT * FROM openvpn WHERE iuser='{$val}' limit 1");
	if($row1!='')continue;
	$sql="insert into `openvpn` (`pass`,`iuser`,`date`,`authcode`,`active`,`sign`) values ('".$qq."','".trim($val)."','".$date."','".$row['authcode']."','1','".$row['sign']."')";
	$DB->query($sql);
	$re.=$val.',';
}
if($re){
$city=get_ip_city($clientip);
$DB->query("insert into `auth_log` (`pass`,`type`,`date`,`city`,`data`) values ('".$user."','添加站点','".$date."','".$city."','".$qq."|".$re."')");
exit("<script language='javascript'>alert('{$re}添加成功！');history.go(-1);</script>");
}else
exit("<script language='javascript'>alert('添加失败，可能域名已存在！');history.go(-1);</script>");
} ?>
      <div class="panel-heading font-bold">添加站点（已购买者）</div>
        <div class="panel-body">
        <div class="panel-body">
          <form action="./addsite.php" method="post" class="form-horizontal" role="form">
            <div class="input-group">
              <span class="input-group-addon">ＱＱ</span>
              <input type="text" name="qq" value="<?=@$_POST['qq']?>" class="form-control" placeholder="购买授权的QQ" autocomplete="off" required/>
            </div><br/>
            <div class="input-group">
              <span class="input-group-addon">域名</span>
              <input type="text" name="iuser" value="<?=@$_POST['iuser']?>" class="form-control" placeholder="" autocomplete="off" required/>
            </div><br/>
            <div class="form-group">
              <div class="col-sm-12"><input type="submit" value="添加" class="btn btn-primary form-control"/></div>
            </div>
          </form>
        </div>
        <div class="panel-footer">
          <span class="glyphicon glyphicon-info-sign"></span> 添多个域名请用英文逗号 , 隔开！
        </div>
      </div>
    </div>
  </div>
<?php include './foot.php';?>