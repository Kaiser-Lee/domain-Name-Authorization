<?php
$mod='blank';
include("../api.inc.php");
$title='账号列表';
include './head.php';
if($islogin==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
include './nav.php';

?>


<section id="content">
<section class="vbox">
<section class="scrollable padder">
<ul class="breadcrumb no-border no-radius b-b b-light pull-in">
	<li><a href="#"><i class="fa fa-home"></i> <?php echo $title ?></a></li>
</ul>
<section class="panel panel-default">
              <header class="panel-heading font-bold"> 授权账号管理 </header>
              <div class="panel-body">
				
                  <div class="line line-dashed line-lg pull-in"></div>
                  <div class="form-group">
                   


    
<?php

$my=isset($_GET['my'])?$_GET['my']:null;

if($my=='del'){
echo '<div class="panel panel-default">
<div class="panel-heading"><h3 class="panel-title">删除账号</h3></div>
<div class="panel-body box">';
$user=$_GET['user'];
$sql=$DB->query("DELETE FROM `openvpn` WHERE iuser='$user'");
if($sql){echo '删除成功！';}
else{echo '删除失败！';}
echo '<hr/><a href="./qqlist.php">>>返回账号列表</a></div></div>';
}else
{
if(!empty($_GET['kw'])) {
	$sql=" `iuser`='{$_GET['kw']}'";
	$numrows=$DB->count("SELECT count(*) from `openvpn` WHERE{$sql}");
	$con='账号为 '.$_GET['kw'].' 的共有 <b>'.$numrows.'</b> 个账号';
}else{
	$numrows=$DB->count("SELECT count(*) from `openvpn` WHERE 1");
	$numrows2=$DB->count("SELECT count(*) from `openvpn` WHERE i=1");
	$sql=" 1";
	$con='平台共有 <b>'.$numrows.'</b> 个账号，状态正常的有<b>'.$numrows2.'</b> 个账号';
}
echo '<form action="qqlist.php" method="get" class="form-inline">
  <div class="form-group">
   
    <input type="text" class="form-control" name="kw" placeholder="账号">
  </div>
  <button type="submit" class="btn btn-primary">搜索</button>
  <a href="addqq.php" class="btn btn-success">添加账号</a>


</form>';




echo $con;
?>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead><tr><th><input type="checkbox" id="widuu" onclick="checkAll(this)"></th><th>机器人QQ</th><th>主人QQ</th><th>加群状态</th><th>添加时间</th><th>授权状态</th><th>备注</th><th>操作</th></tr></thead>
          <tbody>
<?php
$pagesize=30;
$pages=intval($numrows/$pagesize);
if ($numrows%$pagesize)
{
 $pages++;
 }
if (isset($_GET['page'])){
$page=intval($_GET['page']);
}
else{
$page=1;
}
$offset=$pagesize*($page - 1);
//$zt = array('0'=>'<font color=green>正常</font>','1'=>'<font color=red>密码错误</font>','2'=>'<font color=red>冻结</font>','3'=>'<font color=red>开启设备锁</font>');
$rs=$DB->query("SELECT * FROM `openvpn` WHERE{$sql} order by id desc limit $offset,$pagesize");
while($res = $DB->fetch($rs))
{ ?>
<tr>
<td><input type="checkbox" name="ids" value="<?=$res['id']?>" id="box"></td>

<td><?=$res['iuser']?></td>
<td><?=$res['pass']?></td>
<td><?=($res['irecv']?'已加群':'未加群')?></td>
<td><?=date("Y-m-d",$res['starttime'])?></td>
<td><?=($res['i']?'开通':'禁用')?></td>
<td><?=$res['notes']?></td>
<td><a class="btn btn-xs btn-success" href="./qset.php?user=<?=$res['id']?>">配置</a>&nbsp;<a href="./qqlist.php?my=del&user=<?=$res['iuser']?>" class="btn btn-xs btn-danger" onclick="if(!confirm('你确实要删除此授权吗？')){return false;}">删除</a></td>
</tr>

<?php }
?>
          </tbody>
        </table>
      </div>
<?php
echo'<ul class="pagination">';
$first=1;
$prev=$page-1;
$next=$page+1;
$last=$pages;
if ($page>1)
{
echo '<li><a href="qqlist.php?page='.$first.$link.'">首页</a></li>';
echo '<li><a href="qqlist.php?page='.$prev.$link.'">&laquo;</a></li>';
} else {
echo '<li class="disabled"><a>首页</a></li>';
echo '<li class="disabled"><a>&laquo;</a></li>';
}
for ($i=1;$i<$page;$i++)
echo '<li><a href="qqlist.php?page='.$i.$link.'">'.$i .'</a></li>';
echo '<li class="disabled"><a>'.$page.'</a></li>';
for ($i=$page+1;$i<=$pages;$i++)
echo '<li><a href="qqlist.php?page='.$i.$link.'">'.$i .'</a></li>';
echo '';
if ($page<$pages)
{
echo '<li><a href="qqlist.php?page='.$next.$link.'">&raquo;</a></li>';
echo '<li><a href="qqlist.php?page='.$last.$link.'">尾页</a></li>';
} else {
echo '<li class="disabled"><a>&raquo;</a></li>';
echo '<li class="disabled"><a>尾页</a></li>';
}
echo'</ul>';
#分页
}
?>
    </div>
  </div>
<script type="text/javascript">
    function del(){
      var str="";
      $("input[name='ids']").each(function(){ 
          if($(this).prop('checked')){
            str += $(this).val()+","
          }
      })
      $.post('delall.php?action=delall',{ids:str},function(data){
        alert(data);
        window.location.reload();
      });
      
    }
   function checkAll(obj){
      $("input[type='checkbox']").prop('checked', $(obj).prop('checked'));
  }

</script>

 
                  
              </div>
            </section>
</section>
</section>

<a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a></