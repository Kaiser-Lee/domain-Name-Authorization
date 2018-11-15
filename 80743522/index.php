<?php
$mod='blank';
include("../api.inc.php");
$title='云言管理中心';
include './head.php';
if($islogin==1){}else exit("<script language='javascript'>window.location.href='./80743522/login.php';</script>");
?>
<?php
$sites=$DB->count("SELECT count(*) from auth_site WHERE 1");
$blocks=$DB->count("SELECT count(*) from auth_block WHERE 1");
?>
<div class="col-lg-8 col-md-12 col-lg-offset-2 text-center">
<div class="panel panel-info" draggable="true">
<div class="panel-heading font-bold">后台管理首页</div>
<div class="panel-body">
<table class="table table-bordered">
<tbody>
<tr height="25">
<td align="center"><font color="#808080"><b><span class="glyphicon"></span>服务器位置：</b></br>美国<?php echo $count?></font></td>
<td align="center"><font color="#808080"><b><i class="glyphicon"></i>现在时间：</b></br></span><?=$date?></font></td>
</tr>
<tr height="25">
<td align="center"><font color="#808080"><b><i class="glyphicon"></i>登录IP：</b></br><?=$udata['dlip']?></font></td>
<td align="center"><font color="#808080"><b><i class="glyphicon"></i>登录时间：</b></span></br><?=$udata['last']?></font></td>
</tr>
<tr height="25">
<td align="center"><font color="#808080"><b><span class="glyphicon"></span>账号权限：</b></br>获取密码权限=<?=$udata['per_db']?>  授权操作权限=<?=$udata['active']?></font></td>
<td align="center"><font color="#808080"><b><i class="glyphicon"></i>欢迎您管理员：</b></br></span><?=$udata['user']?></font></td>
<tr height="25">
<td align="center"><font color="#808080"><b><span class="glyphicon"></span>服务器软件：</b></br><?php echo $_SERVER['SERVER_SOFTWARE'] ?></font></td>
<td align="center"><font color="#808080"><b><i class="glyphicon"></i>您的QQ</b></br></span><?=$udata['dlqq']?></font></td>
</tr>
<tr height="25">
<td align="center"><a href="../" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-home"></i>网站首页</a></td>
<td align="center"><a href="./80743522/addqq.php" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-home"></i>添加授权</a></td>

<tr height="25">
<td align="center"><a href="./80743522/qqlist.php" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-globe"></i>授权列表</a></td>
<td align="center"><a href="./80743522/password.php" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-cog"></i>修改密码</a></td>
</tr>
<tr height="25">
<td align="center"><a href="./80743522/userlist.php" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-globe"></i>用户列表</a></td>
<td align="center"><a href="./80743522/adduser.php" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-cog"></i>添加用户</a></td>
</tr>
<tr height="25">
<td align="center"><a href="./80743522/log.php" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-globe"></i>操作记录</a></td>
<td align="center"><a href="./80743522/index.php" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-cog"></i>等待更新</a></td>
</tr>
</tbody>
</table>
      </div>
      
        </div>
    </div>
  </div>
<?php include './foot.php';?>
