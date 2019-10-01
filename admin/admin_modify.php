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
include '../encrypt.php';
include './pass.php';
$password = $_POST['pass'];
$mode = $_GET['mode'];
$id = $_GET['id'];
session_start();
if($pass==$_SESSION['pass']){
//管理文件top

if($mode == 'modify'){
   $sql = mysql_query("SELECT * from tune_LINK where id = '$id'");
  if($row=mysql_fetch_array($sql)){

if ( !isset($_POST['sname'])){
echo '
<form action="" method="post">
    网站简称:<br/><input type="text" name="sname" value="'.$row["shortname"].'"><br/>
    网站全称:<br/><input type="text" name="lname" value="'.$row["longname"].'"><br/>
    分类选择:<br><input type="text" name="cat_id" value="'.$row["cat_id"].'">
<br/>
    网站链接:<br/><input type="text" name="url" value="'.$row["url"].'"><br/>
    联系方式:<br/><input type="text" name="conversation" value="'.$row["conversation"].'"><br/>
    网站介绍:<br/><textarea name="instruction">'.$row["instruction"].'</textarea>

<br/>
    出量修改:<br/><input type="text" name="outviews" value="'.$row["outviews"].'"><br/>
    入量修改:<br/><input type="text" name="views" value="'.$row["views"].'"><br/>
    审核修改:<br/><input type="text" name="display" value="'.$row["display"].'"><br/>
';


echo '<input type="submit" value="确认修改">
</form>
<br>
  ©The Power by Tune
<a href="/index.php">首页</a>';
}else{


   $sn = $_POST['sname'];
   $ln = $_POST['lname'];
   $cat_id = $_POST['cat_id'];
   $url = $_POST['url'];
   $con = $_POST['conversation'];
   $in = $_POST['instruction'];
   
   $views = $_POST['views'];
;
   $outviews = $_POST['outviews'];
;
   $display = $_POST['display'];
;
   //屏蔽字符
    $sn = sql_encode($sn);
    $sn = filters_all($sn);
    $ln = sql_encode($ln);
    $ln = filters_all($ln);
    $url = sql_encode($url);
    $url = filters_all($url);
    $con = sql_encode($con);
    $con = filters_all($con);
    $in = sql_encode($in);
    $in = filters_all($in);

 
$x_sql="UPDATE tune_LINK SET shortname='$sn',longname='$ln',cat_id='$cat_id',url='$url',conversation='$con',instruction='$in',views='$views',outviews='$outviews',display='$display' WHERE id = '$id'";


if(mysql_query($x_sql)){
echo '->修改成功！<br/><a href="/admin/admin_link.php">返回链接管理</a> ';
}
}
}
}


echo '<div class="top"><a href="/admin/admin.php">返回后台</a>/<a href="/index.php">返回首页</a><br>©2015~2016 <a href="http://zqblog.zl88.net">Tune</a>导航<div>';


//管理文件bottom
}else{
echo '访问超时！';
}
?>