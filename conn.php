<?php
/*if(!file_exists("config.php")){
header("Location:install.php");
}*/
require "config.php";
$conn=mysql_connect($db,$user,$dbpass);
if(!$conn){
exit('���ݿ�����ʧ�ܣ����������</br>����ǵ�һ��ʹ�ã�����ʣ�http://��վ��ַ/install.php���г���װ��');
}
mysql_select_db($dbname,$conn);
mysql_query("set names 'utf8'");
?>
