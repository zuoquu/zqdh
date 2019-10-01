<?php
include '../conn.php';
include '../style/head.php';
$mode = $_GET['mode'];
if($mode == 'link'){
$create="create table tune_LINK (
id mediumint(8) unsigned NOT NULL auto_increment,
shortname char(15),
longname char(15),
cat_id int(5),
url char(200),
conversation int(40),
instruction varchar(250),
display int(5),
views int(8),
outviews int(8),
vlink int(40),
PRIMARY KEY  (id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;";

if(mysql_query($create)){
echo "数据创建成功；<br/>温馨提示:务必返回首页进入后台修改密码和配置网站数据，首次安装密码为空。安装完成后务必删除install文件夹，防止数据被修改<br/>";
echo '<a href="/index.php">返回首页</a>';
}else{
exit("安装失败，请重新尝试安装<br/>".mysql_error());
}
}
?>
