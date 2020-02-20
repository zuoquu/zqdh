<?php
$term="安装向导";
include '../style/head.php';
echo '<div class="background">';
if(!isset($_POST['db'])){
echo '<form action="" method="post">
使用过程中如出现问题请联系178484776
安装第一步，填写信息<br>
数据库地址<br/>
<input type="text" name="db" value="localhost"/><br/>
数据库名<br/>
<input type="text" name="dbname"><br/>
用户名<br/>
<input type="text" name="user"/><br/>
密码<br/>
<input type="password" name="dbpass"/><br/>
<input type="submit" name="submit" value="安装">
</form>
该程序由戏小曲制作';
}

else{
$db = $_POST['db'];
$user = $_POST['user'];
$dbpass = $_POST['dbpass'];
$dbname = $_POST['dbname'];
//写入文件
    //定义收集的内容格式 
        $str = "<?php\r\n\$db=\"".$db."\";\r\n\$user=\"".$user."\";\r\n\$dbpass=\"".$dbpass."\";\r\n\$dbname=\"".$dbname."\";\r\n?>";
    //定义文件存放的位置 
    $compile_dir = "../config.php";
    //下面就是写入的PHP代码了
    $file = fopen($compile_dir, "w+"); 
    fwrite($file,$str); 
    fclose($file);
echo '数据链接已安装完成，请继续';

echo '<a href="/install/installsql.php?mode=link">点击安装数据</a>';
}
echo '</div>';
?>
