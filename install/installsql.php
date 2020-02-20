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

if($dbh->query($create)){
echo "数据创建成功；<br/>";
echo '<a href="/index.php">返回首页</a>';
}else{
exit("安装失败，请重新尝试安装<br/>";
}
}
?>
