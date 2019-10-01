<?php
/*********************************/
/*******Tune简易导航***************/
/*******作者:Tune(作曲)************/
/*******©版权所有，禁止用该程序商业化*/
/*******问题反馈QQ178484776********/
/*********************************/
$term="友情链接申请";
include './style/head.php';//顶部内容
include './conn.php';
include './encrypt.php';
include './admin/freelink.php';
include './admin/webconfig.php';
   $new_sql = mysql_query("SELECT * from tune_LINK order by id desc limit 0,1");

if($row=mysql_fetch_array($new_sql)){$id=$row[id]+1;}

echo '<div class="background">';
if ( !isset($_POST['sname'])){
//预计回链地址，修改域名即可
echo 
'<div class="title">友联申请</div>
预计回链地址：'.$h_url.'/inlink-'.$id.'.html
<form action="" method="post">
    网站简称:<br/><input type="text" name="sname">*<br/>
    网站全称:<br/><input type="text" name="lname">*<br/>
    分类选择:<select name="cat_id">
<option value="">请选择</option>
<option value="1">源码</option>
<option value="2">论坛</option>
<option value="3">美图</option>
<option value="4">文学</option>
<option value="5">挂机</option>
<option value="6">网盘</option>
<option value="7">导航</option>
<option value="8">博客</option>
<option value="9">其他</option>
</select>
*
<br/>
    网站链接:<br/><input type="text" name="url" value="http://">*<br/>
    联系方式:<br/><input type="text" name="conversation"><br/>
    网站介绍:<br/><textarea name="instruction">这网站不错！</textarea>';
echo '<br/>
<input type="submit" value="确认申请">
</form>
  
 ｜<a href="/index.html">返回首页</a>';
}else{

if (empty($_POST['sname']) or empty($_POST['lname']) or empty($_POST['instruction']) or empty($_POST['cat_id'])){
echo "出错啦！每项不能留空澳！<a href='/apply.php'>返回申请</a>";
}else{

   $sn = $_POST['sname'];
   $ln = $_POST['lname'];
   $cat_id = $_POST['cat_id'];
   $url = $_POST['url'];
   $con = $_POST['conversation'];
   $in = $_POST['instruction'];
   if($freelink == 0){$display = 0;
}elseif($freelink == 1){$display = 1;}
//审核
   $views = 0;
   $outviews = 1;
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

   $sql="insert into tune_LINK(shortname,longname,cat_id,url,conversation,instruction,display,views,outviews)values('$sn','$ln','$cat_id','$url','$con','$in','$display','$views','$outviews')";
if(mysql_query($sql)){
//下面是回链地址，修改域名即可
echo '<div class="title">回链地址</div>申请成功，请等待审核<br/>回链地址：'.$h_url.'/inlink-'.$id.'.html<br>';
echo $jianjie;
echo '<br><a href="/apply.html">返回申请</a> <a href="/index.html">返回首页</a>';
}
else{
echo '申请失败，不能为空<br/>'.mysql_error();
}
}//是否为空
}
include_once "./foot.php";
echo '</div>';
?>