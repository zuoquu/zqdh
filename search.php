<?php
//搜索文件文章
ob_start();//打开缓冲
date_default_timezone_set('Asia/Shanghai');//时区
$term="收录查询";
include 'conn.php';
include './style/head.php';

echo '<div class="background">';
if ( !isset($_POST['searchs'])){
echo '
<div class="title">站点搜索</div>
<form action="" method="post">
    <input type="text" name="searchs" value="输入简称或域名">

<input type="submit" value="查询">
</form>
  ©The Power by Tune
<a href="/index.php">首页</a>';
}else{
    $search = $_POST['searchs'];

$sql = mysql_query("select * from tune_LINK where shortname like '%$search%' or url like '%$search%' order by id desc");

if(mysql_num_rows($sql)<=0){
echo "搜索引擎搜不到了，换个关键字试试吧！";
}else{
echo "<div class='title'>查询信息</div>";
while($row=mysql_fetch_array($sql)){

if($row['cat_id']==1){$type="源码";
}elseif($row['cat_id']==2){$type="论坛";
}elseif($row['cat_id']==3){$type="美图";
}elseif($row['cat_id']==4){$type="文学";
}elseif($row['cat_id']==5){$type="挂机";
}elseif($row['cat_id']==6){$type="网盘";
}elseif($row['cat_id']==7){$type="导航";
}elseif($row['cat_id']==8){$type="博客";
}elseif($row['cat_id']==9){$type="其他";
}




echo '全称：'.$row['longname'].'<br>简称：'.$row['shortname'].'<br>分类：'.$type.'<br>网址：<a href="'.$row['url'].'">'.$row['url'].'</a><br>联系：'.$row['conversation'].'<br>介绍：'.$row['instruction'].'<br/><br/>';
}
//
echo '<br><a href="/index.php">返回首页</a> <a href="/search.php">返回查询</a>';
}
}
echo "</div>";

?>