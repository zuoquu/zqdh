<?php
/*********************************/
/*******Tune简易导航***************/
/*******作者:Tune(作曲)************/
/*******©版权所有，禁止用该程序商业化*/
/*******问题反馈QQ178484776********/
/*********************************/
$term="正在进入，1s后自动跳转";
include '../style/head.php';//顶部内容
include '../conn.php';
echo '<div class="background">';
$id = $_GET['id'];
$sql = mysql_query("SELECT * from tune_LINK where id='$id'");
if($row=mysql_fetch_array($sql)){
$outviews_sql = "UPDATE tune_LINK SET outviews = outviews+1 where id='$row[id]'";
mysql_query($outviews_sql);
 echo "<div class='title'>网站：".$row["longname"]." 一秒后自动跳转…</div>网址：".$row["url"]."<br/>介绍：".$row["instruction"]."<br/>进量：".$row["views"]." 出量：".$row["outviews"]." <a href='".$row["url"]."'>继续访问>></a>";
//自动跳转
header('refresh:1;url='.$row["url"].'');
//
include_once "../foot.php";
 }
echo '</div>';
?>