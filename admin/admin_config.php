<?php
/*********************************/
/*******Tune简易导航***************/
/*******作者:Tune(作曲)************/
/*******©版权所有，禁止用该程序商业化*/
/*******问题反馈QQ178484776********/
/*********************************/
ob_start();//打开缓冲
$term="管理后台";
include '../style/head.php';//顶部内容
include './pass.php';
include './webconfig.php';
session_start();
if($pass==$_SESSION['pass']){
//管理文件top


if(!isset($_POST['hot'])){echo '

<form action="" method="post">



<div class="title"><i></i>显示开关配置</div>

热门推荐:0关闭 1打开<br>
<input type="text" name="hot" value="'.$backhot.'"><br/>
动态友联:0关闭 1打开<br>
<input type="text" name="vlink" value="'.$backvlink.'"><br/>
随机推荐:0关闭 1打开<br>
<input type="text" name="suiji" value="'.$backsuiji.'"><br/>
最新加盟:0关闭 1打开<br>
<input type="text" name="new" value="'.$backnew.'"><br/>

<div class="title"><i></i>网站信息配置</div>
网站名称:<br>
<input type="text" name="term" value="'.$term.'"><br/>
网站地址:需带有http://<br>
<input type="text" name="h_url" value="'.$h_url.'"><br/>
logo地址:需带有http://<br>
<input type="text" name="logo" value="'.$logo.'"><br/>
网站介绍:自定义<br>
<input type="text" name="jianjie" value="'.$jianjie.'"><br/>


<div class="title"><i></i>网站顺序条数</div>

分类条数:自定义<br>
<input type="text" name="ts" value="'.$ts.'"><br/>
分类顺序:0最新 1热门 2动态 3随机<br>
<input type="text" name="order" value="'.$order.'"><br/>
更多顺序:0最新 1热门 2动态 3随机 4顺序<br>
<input type="text" name="moreorder" value="'.$moreorder.'"><br/>
热门条数:5的倍数<br>
<input type="text" name="num_hot" value="'.$num_hot.'"><br/>
动态条数:5的倍数<br>
<input type="text" name="num_vlink" value="'.$num_vlink.'"><br/>
随机条数:5的倍数<br>
<input type="text" name="num_suiji" value="'.$num_suiji.'"><br/>
最新条数:5的倍数<br>
<input type="text" name="num_new" value="'.$num_new.'"><br/>
<br>

    <input type="submit" value="保存设置">



</form>


';
}else{

$hot = $_POST['hot'];
$vlink = $_POST['vlink'];
$suiji = $_POST['suiji'];
$new = $_POST['new'];

$term = $_POST['term'];
$h_url = $_POST['h_url'];
$logo = $_POST['logo'];
$jianjie = $_POST['jianjie'];

$ts = $_POST['ts'];
$order = $_POST['order'];
$moreorder = $_POST['moreorder'];
$num_hot = $_POST['num_hot'];
$num_vlink = $_POST['num_vlink'];
$num_suiji = $_POST['num_suiji'];
$num_new = $_POST['num_new'];

$str = "<?php\r\n/*前台显示配置*/

\r\n\$backhot=\"".$hot."\";
\r\n\$backvlink=\"".$vlink."\";
\r\n\$backsuiji=\"".$suiji."\";
\r\n\$backnew=\"".$new."\";
\r\n

/*网站信息配置*/

\r\n\$term=\"".$term."\";
\r\n\$h_url=\"".$h_url."\";
\r\n\$logo=\"".$logo."\";
\r\n\$jianjie=\"".$jianjie."\";
\r\n

/*网站顺序条数*/

\r\n\$ts=\"".$ts."\";
\r\n\$order=\"".$order."\";
\r\n\$moreorder=\"".$moreorder."\";
\r\n\$num_hot=\"".$num_hot."\";
\r\n\$num_vlink=\"".$num_vlink."\";
\r\n\$num_suiji=\"".$num_suiji."\";
\r\n\$num_new=\"".$num_new."\";


\r\n?>";
    //定义文件存放的位置 
    $compile_dir = "webconfig.php";
    //下面就是写入的PHP代码了
    $file = fopen($compile_dir, "w+"); 
    fwrite($file,$str); 
    fclose($file);
echo '<br/>设置成功 <a href="/admin/admin_config.php">返回前页</a>';
}


echo '<div class="top"><a href="/admin/admin.php">返回后台</a>/<a href="/index.php">返回首页</a><br>©2015~2016 <a href="http://zqblog.zl88.net">Tune</a>导航<div>';

//管理文件bottom
}else{
echo '访问超时！';
}
?>