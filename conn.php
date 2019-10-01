<?php
/*if(!file_exists("config.php")){
header("Location:install.php");
}*/
require "config.php";
$conn=mysql_connect($db,$user,$dbpass);
if(!$conn){
exit('数据库连接失败，请检查后重试</br>如果是第一次使用，请访问：http://网站地址/install.php进行程序安装。');
}
mysql_select_db($dbname,$conn);
mysql_query("set names 'utf8'");
?>
