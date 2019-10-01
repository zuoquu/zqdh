<?php
/*********************************/
/*******Tune简易导航***************/
/*******作者:Tune(作曲)************/
/*******©版权所有，禁止用该程序商业化*/
/*******问题反馈QQ178484776********/
/*********************************/
ob_start();//打开缓冲
$term="管理后台";
include '../set/top.php';
include '../set/bottom.php';
include '../set/star.php';
include '../set/link.php';
include '../set/middle.php';
include '../set/especially.php';
include '../style/head.php';//顶部内容
include './pass.php';
$mode = $_GET['mode'];
session_start();
if($pass==$_SESSION['pass']){

//管理文件top

echo '

<div class="title"><i></i>网站后台设置</div>



<a href="/admin/admin.php?mode=password">后台密码修改</a><br>
<a href="/admin/admin_config.php">网站后台配置</a><br>
<a href="/admin/admin_link.php">链接审核管理</a>
<br>
<a href="/admin/admin.php?mode=freelink">免审开关设置</a>




<div class="title"><i></i>网站前台排版</div>


<a href="/admin/admin.php?mode=top">顶部文件修改</a>
<br>
<a href="/admin/admin.php?mode=bottom">底部版权修改</a>
<br>
<a href="/admin/admin.php?mode=middle">中间内容修改</a>
<br>
<a href="/admin/admin.php?mode=star">名站推荐修改</a>
<br>
<a href="/admin/admin.php?mode=link">兄弟联盟修改</a>
<br>
<a href="/admin/admin.php?mode=especially">特别推荐修改</a>
<br>
';
if($mode == 'password'){
/*pass文件写入*/
if(!isset($_POST['passs'])){echo '
<form action="" method="post">
    修改密码:<br/><input type="text" name="passs">
    <input type="submit" value="确认">
</form>';
}else{
$passs = $_POST['passs'];
$str = "<?php\r\n/*后台密码文件*/\r\n\$pass=\"".$passs."\";\r\n?>";
    //定义文件存放的位置 
    $compile_dir = "pass.php";
    //下面就是写入的PHP代码了
    $file = fopen($compile_dir, "w+"); 
    fwrite($file,$str); 
    fclose($file);
echo '<br/>修改成功 <a href="/index.php">返回首页</a>';
}
}
/*pass结束*/
elseif($mode == 'freelink'){
/*freelink文件写入*/
if(!isset($_POST['freelink'])){echo '
ps:防止别人刷链接，最好不要开启免审。<br>
<form action="" method="post">
    <select name="freelink">
<option value="0">关闭免审</option>
<option value="1">开启免审</option>
    </select>
    <input type="submit" value="确认">
</form>';
}else{
$freelink = $_POST['freelink'];
$str = "<?php\r\n/*免审文件记录*/\r\n\$freelink=\"".$freelink."\";\r\n?>";
    //定义文件存放的位置 
    $compile_dir = "freelink.php";
    //下面就是写入的PHP代码了
    $file = fopen($compile_dir, "w+"); 
    fwrite($file,$str); 
    fclose($file);
echo '<br/>设置成功 <a href="/index.php">返回首页</a>';
}
/*freelink结束*/
}
elseif($mode == 'top'){
//top文件写入

if(!isset($_POST['top'])){echo '
<form action="" method="post">
    顶部内容:<br/><textarea name="top">'.$backtop.'</textarea>
    <input type="submit" value="确认">
</form><br>ps:引号只能使用单引号';
}else{
$top = $_POST['top'];
$str = '<?php
$backtop="'.$top.'";
?>';
    //定义文件存放的位置 
    $compile_dir = "../set/top.php";
    //下面就是写入的PHP代码了
    $file = fopen($compile_dir, "w+"); 
    fwrite($file,$str); 
    fclose($file);
echo '<br/>修改成功 <a href="/index.php">返回首页</a>';


}
//top文件写入结束
}
elseif($mode == 'bottom'){
//bottom文件写入

if(!isset($_POST['bottom'])){echo '
<form action="" method="post">
    底部内容:<br/><textarea name="bottom">'.$backbottom.'</textarea>
    <input type="submit" value="确认">
</form><br>ps:引号只能使用单引号';
}else{
$bottom = $_POST['bottom'];
$str = '<?php
$backbottom="'.$bottom.'";
?>';
    //定义文件存放的位置 
    $compile_dir = "../set/bottom.php";
    //下面就是写入的PHP代码了
    $file = fopen($compile_dir, "w+"); 
    fwrite($file,$str); 
    fclose($file);
echo '<br/>修改成功 <a href="/index.php">返回首页</a>';


}
//bottom文件写入结束
}elseif($mode == 'star'){
//名站文件写入

if(!isset($_POST['star'])){echo '
<form action="" method="post">
    名站内容:<br/><textarea name="star">'.$backstar.'</textarea>
    <input type="submit" value="确认">
</form><br>ps:引号只能使用单引号';
}else{
$star = $_POST['star'];
$str = '<?php
$backstar="'.$star.'";
?>';
    //定义文件存放的位置 
    $compile_dir = "../set/star.php";
    //下面就是写入的PHP代码了
    $file = fopen($compile_dir, "w+"); 
    fwrite($file,$str); 
    fclose($file);
echo '<br/>修改成功 <a href="/index.php">返回首页</a>';
}
//名站写入结束
}
elseif($mode == 'link'){
//友联文件写入

if(!isset($_POST['link'])){echo '
<form action="" method="post">
    脸萌内容:<br/><textarea name="link">'.$backlink.'</textarea>
    <input type="submit" value="确认">
</form><br>ps:引号只能使用单引号';
}else{
$link = $_POST['link'];
$str = '<?php
$backlink="'.$link.'";
?>';
    //定义文件存放的位置 
    $compile_dir = "../set/link.php";
    //下面就是写入的PHP代码了
    $file = fopen($compile_dir, "w+"); 
    fwrite($file,$str); 
    fclose($file);
echo '<br/>修改成功 <a href="/index.php">返回首页</a>';
}
//友联写入结束
}
elseif($mode == 'middle'){
//中间内容写入

if(!isset($_POST['middle'])){echo '
<form action="" method="post">
    中部内容:<br/><textarea name="middle">'.$backmiddle.'</textarea>
    <input type="submit" value="确认">
</form><br>ps:引号只能使用单引号';
}else{
$middle = $_POST['middle'];
$str = '<?php
$backmiddle="'.$middle.'";
?>';
    //定义文件存放的位置 
    $compile_dir = "../set/middle.php";
    //下面就是写入的PHP代码了
    $file = fopen($compile_dir, "w+"); 
    fwrite($file,$str); 
    fclose($file);
echo '<br/>修改成功 <a href="/index.php">返回首页</a>';
}
//中间写入结束
}
elseif($mode == 'especially'){
//特别推荐文件写入

if(!isset($_POST['especially'])){echo '
<form action="" method="post">
    特别推荐:<br/><textarea name="especially">'.$backespecially.'</textarea>
    <input type="submit" value="确认">
</form><br>ps:引号只能使用单引号';
}else{
$especially = $_POST['especially'];
$str = '<?php
$backespecially="'.$especially.'";
?>';
    //定义文件存放的位置 
    $compile_dir = "../set/especially.php";
    //下面就是写入的PHP代码了
    $file = fopen($compile_dir, "w+"); 
    fwrite($file,$str); 
    fclose($file);
echo '<br/>修改成功 <a href="/index.php">返回首页</a>';
}
//特别推荐写入结束
}




//管理文件bottom
}else{
echo '
<form action="" method="post">
    管理密码:<br/><input type="text" name="pass">
    <input type="submit" value="确认">
</form>';
session_start();
$_SESSION['pass'] = $_POST['pass'];
}

echo '<div class="top"><a href="/admin/admin.php">返回后台</a>/<a href="/index.php">返回首页</a><div>';

include_once "../foot.php";
?>