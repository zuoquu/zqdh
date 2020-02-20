<?php
/*********************************/
/*******Tune简易导航***************/
/*******作者:Tune(作曲)************/
/*******©版权所有，禁止用该程序商业化*/
/*******问题反馈QQ178484776********/
/*********************************/
ob_start();//打开缓冲
$term="管理后台";
include '../conn.php';
include '../style/head.php';//顶部内容
include './pass.php';
$password = $_POST['pass'];
$mode = $_GET['mode'];
$id = $_GET['id'];
session_start();
if($pass==$_SESSION['pass']){
//管理文件top
echo '待审链接<hr>ps:最新一条待审链接。设置为不能删除<br>';
$newsql = "SELECT * from tune_LINK order by id desc limit 0,1";
if($row=$dbh->query($newsql)->fetch()){
$newid=$row["id"];
}


$sql = "SELECT * from tune_LINK where display=0";
foreach($dbh->query($sql) as $row){
echo $row["shortname"]." ".$row["id"]." ".$row["url"]." <a href='/admin/admin_link.php?mode=del&id=".$row[id]."'>删</a> <a href='/admin/admin_link.php?mode=find&id=".$row[id]."'>审</a><br>";
}
echo '<hr>已申链接<hr>短称 id 进量 网址<br>';
$ysql = "SELECT * from tune_LINK where display=1 order by id desc";
foreach($dbh->query($ysql) as $row){
echo "
<font color=#ff0000;>"
.$row["shortname"].
"</font> ".$row["id"]." ".$row["views"]." ".$row["url"]."<br> 【<a href='/admin/admin_link.php?mode=del&id=".$row[id]."'>删除</a>】 【<a href='/admin/admin_modify.php?mode=modify&id=".$row[id]."'>修改</a>】 【<a href=".$row["url"].">访问</a>】<br><br>";
}

echo '<hr><a href="/admin/admin_link.php?mode=alldel">删除所有申请</a>';
if($mode == "find"){
$sql = "UPDATE tune_LINK SET display = 1 where id='$id'";
if($dbh->query($sql)){echo "审核通过<br><a href='/admin/admin_link.php'>返回后台</a> <a href='/index.php'>返回首页</a>";}
}elseif($mode == "del"){    
$delsql="DELETE FROM tune_LINK WHERE id='$id'";
if($id!=$newid){
$dbh->query($delsql);}else{$dbh->query($delsql);   $sql="insert into tune_LINK(shortname,longname,cat_id,url,conversation,instruction,display,views,outviews)values('记录','记录',' ','http://dh.zl88.net',' ',' ','$display','0','0')";
$dbh->query($sql);}

echo '->删除成功！<br><a href="/admin/admin.php">返回后台</a> <a href="/index.php">返回首页</a>';


}elseif($mode == "alldel"){
$alldelsql="DELETE FROM tune_LINK WHERE display=0";
if($dbh->query($alldelsql)){
   $sql="insert into tune_LINK(shortname,longname,cat_id,url,conversation,instruction,display,views,outviews)values('记录','记录',' ','http://dh.zl88.net',' ',' ','$display','0','0')";
$dbh->query($sql);


echo '->删除成功！<br><a href="/admin/admin_link.php">返回前页</a>';

}
}

echo '<div class="top"><a href="/admin/admin.php">返回后台</a>/<a href="/index.php">返回首页</a><br>©2015~2016 <a href="http://zuoquu.com">Tune</a>导航<div>';

//管理文件bottom
}else{
echo '访问超时！';
}
?>