<?php
/*********************************/
/*******Tune简易导航***************/
/*******作者:Tune(作曲)************/
/*******�版权所有，禁止用该程序商业化*/
/*******问题反馈QQ178484776********/
/*********************************/
ob_start();//打开缓冲
//$term="知了网址大全|身边的导航|WAP自助导航|最简单的导航";
include './admin/webconfig.php';
include "./style/head.php";//顶部内容
include './set/top.php';
include './set/bottom.php';
include './set/star.php';
include './set/link.php';
include './set/middle.php';
include './conn.php';
   $hot_sql = "SELECT * from tune_LINK where display=1 order by views desc limit 0,".$num_hot;
   $new_sql = "SELECT * from tune_LINK where display=1 order by id desc limit 0,".$num_new;
   $vlink_sql = "SELECT * from tune_LINK where display=1 order by vlink desc limit 0,".$num_vlink;
   $suiji_sql = "SELECT * from tune_LINK where display=1 order by rand() limit 0,".$num_suiji;


if($order == 0){
$cat_order="order by id desc";}
elseif($order == 1){$cat_order="order by views desc";}
elseif($order == 2){$cat_order="order by vlink desc";}
elseif($order == 3){$cat_order="order by rand()";}
//echo $cat_order;

   $cat_sql1 = "SELECT * from tune_LINK where display=1 and cat_id=1 ".$cat_order;//源码
   $cat_sql2 = "SELECT * from tune_LINK where display=1 and cat_id=2 ".$cat_order;//论坛
   $cat_sql3 = "SELECT * from tune_LINK where display=1 and cat_id=3 ".$cat_order;//美图
   $cat_sql4 = "SELECT * from tune_LINK where display=1 and cat_id=4 ".$cat_order;//文学
   $cat_sql5 = "SELECT * from tune_LINK where display=1 and cat_id=5 ".$cat_order;//挂机
   $cat_sql6 = "SELECT * from tune_LINK where display=1 and cat_id=6 ".$cat_order;//网盘
   $cat_sql7 = "SELECT * from tune_LINK where display=1 and cat_id=7 ".$cat_order;//导航
   $cat_sql8 = "SELECT * from tune_LINK where display=1 and cat_id=8 ".$cat_order;//博客
   $cat_sql9 = "SELECT * from tune_LINK where display=1 and cat_id=9 ".$cat_order;//其他

//随机sql select * from tablename order by rand() limit 4
echo '<div class="background">';

echo '<div class="top"><span class="left"><img src="'.$logo.'"/></span><span class="zqu"><iframe width="110" scrolling="no" height="25" frameborder="0" allowtransparency="true" src="http://i.tianqi.com/index.php?c=code&id=10&icon=2"></iframe></span></div>';

echo $backtop;
echo "<div class='title'><i></i>名站推荐:</div>" ;
echo $backstar;

if($backhot==1){
echo '<div class="title"><i></i>热门推荐:</div><div class="dh_bg">' ;
$i=1;
foreach($dbh->query($hot_sql) as $row){
 echo '<span class="dh_kz"><a href="/outlink-'.$row[id].'.html">'.$row["shortname"].'</a></span>';
if($i % 5 == 0)
echo "<br>";
$i++;
 }
echo '</div>';
}

echo $backmiddle;

if($backvlink==1){
echo '<div class="title"><i></i>动态友链：</div><div class="dh_bg">';
$o=1;
foreach($dbh->query($vlink_sql) as $row){
 echo '<span class="dh_kz"><a href="/outlink-'.$row[id].'.html">'.$row["shortname"].'</a></span>';
if($o % 5 == 0)
echo "<br>";
$o++;
 }
echo '</div>';
}


if($backsuiji==1){
echo '<div class="title"><i></i>随机推荐：</div><div class="dh_bg">';
$o=1;
foreach($dbh->query($suiji_sql) as $row){
 echo '<span class="dh_kz"><a href="/outlink-'.$row[id].'.html">'.$row["shortname"].'</a></span>';
if($o % 5 == 0)
echo "<br>";
$o++;
 }
echo '</div>';
}

echo '<div class="title"><i></i>分类推荐:</div><div class="dh_bg"><div class="dh_kz"><a style="background-color: #ff784f;color: #fff;" href="/cat-1.html">[源码]</a>';
foreach($dbh->query($cat_sql1) as $row){
 echo '<a href="/outlink-'.$row[id].'.html">'.$row["shortname"].'</a>';
 }
  echo '<div style="border-bottom:1px solid #CCC"></div>' ;
echo '</div><div class="dh_kz"><a style="background-color: #ff784f;color: #fff;" href="/cat-2.html">[论坛]</a>' ;
foreach($dbh->query($cat_sql2) as $row){
 echo '<a href="/outlink-'.$row[id].'.html">'.$row["shortname"].'</a>';
 }
  echo '<div style="border-bottom:1px solid #CCC"></div>' ;
echo '</div><div class="dh_kz"><a style="background-color: #ff784f;color: #fff;" href="/cat-3.html">[美图]</a>' ;
foreach($dbh->query($cat_sql3) as $row){
 echo '<a href="/outlink-'.$row[id].'.html">'.$row["shortname"].'</a>';
 }
 echo '<div style="border-bottom:1px solid #CCC"></div>' ;
echo '</div><div class="dh_kz"><a style="background-color: #ff784f;color: #fff;" href="/cat-4.html">[文学]</a>' ;
foreach($dbh->query($cat_sql4) as $row){
 echo '<a href="/outlink-'.$row[id].'.html">'.$row["shortname"].'</a>';
 }
/*
echo '</div><div class="dh_kz"><a href="/cat-5.html">[挂机]</a>' ;
while($row=mysql_fetch_array($cat_sql5)){
 echo '<a href="/outlink-'.$row[id].'.html">'.$row["shortname"].'</a>';
 }

echo '</div><div class="dh_kz"><a href="/cat-6.html">[网盘]</a>' ;
while($row=mysql_fetch_array($cat_sql6)){
 echo '<a href="/outlink-'.$row[id].'.html">'.$row["shortname"].'</a>';
 }
*/
 echo '<div style="border-bottom:1px solid #CCC"></div>' ;
echo '</div><div class="dh_kz"><a style="background-color: #ff784f;color: #fff;" href="/cat-7.html">[导航]</a>' ;
foreach($dbh->query($cat_sql7) as $row){
 echo '<a href="/outlink-'.$row[id].'.html">'.$row["shortname"].'</a>';
 }
 echo '<div style="border-bottom:1px solid #CCC"></div>' ;
echo '</div><div class="dh_kz"><a style="background-color: #ff784f;color: #fff;" href="/cat-8.html">[博客]</a>' ;
foreach($dbh->query($cat_sql8) as $row){
 echo '<a href="/outlink-'.$row[id].'.html">'.$row["shortname"].'</a>';
 }
 echo '<div style="border-bottom:1px solid #CCC"></div>' ;
echo '</div>
<div style="border-bottom:1px solid #CCC"></div>
<div class="dh_kz"><a style="background-color: #ff784f;color: #fff;" href="/cat-9.html">[其他]</a>' ;
foreach($dbh->query($cat_sql9) as $row){
 echo '<a href="/outlink-'.$row[id].'.html">'.$row["shortname"].'</a>';
 }

echo '</div></div>';


if($backnew==1){
echo '<div class="title"><i></i>最新加盟：</div><div class="dh_bg">';
$o=1;
foreach($dbh->query($new_sql) as $row){
 echo '<span class="dh_kz"><a href="/outlink-'.$row[id].'.html">'.$row["shortname"].'</a></span>';
if($o % 5 == 0)
echo "<br>";
$o++;
 }
echo '</div>';
}


echo '<div class="title"><i></i>兄弟联盟：</div>';
echo $backlink;
echo '<div class="title"><a href="/admin/admin.php">后台管理</a> <a href="/apply.html">申请加盟</a> <a href="/search.php">收录查询</a> <a href="http://zqblog.zl88.net/art-0-131-2.html">关与知了</a></div>';
echo $backbottom;//底部部内容
//希望手下留情留个小小版权
include_once "./foot.php";
echo '</div>';
include "./tongji.htm";
?>