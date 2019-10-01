<?php
/*********************************/
/*******Tune简易导航***************/
/*******作者:Tune(作曲)************/
/*******©版权所有，禁止用该程序商业化*/
/*********************************/
$term="正在进入，1s后自动跳转";
include '../style/head.php';//顶部内容
include '../conn.php';
include '../set/especially.php';
include '../admin/webconfig.php';
date_default_timezone_set("Asia/Shanghai"); 
$id = $_GET['id'];
$inviews_sql = "UPDATE tune_LINK SET views = views+1 where id='$id'";
mysql_query($inviews_sql);
$date = time();
$vlink_sql = "UPDATE tune_LINK SET vlink = '$date' where id='$id'";
mysql_query($vlink_sql);
//改成自己的网站
//$url = "http://dh.zl88.net";
header('refresh:1;url='.$h_url.'');
echo'正在进入…<br>';

echo $backespecially;
?>