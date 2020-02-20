<?php
$db_ms='mysql';
require "config.php";
$dbh=$db_ms.':host='.$db.';'.'dbname='.$dbname;
function conn($dbh,$user,$dbpass){
    static $conn = null;
    if ($conn === null) {
        $conn = new PDO($dbh,$user,$dbpass);
        $conn->query('set names utf8');
        $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); 
        
    }
    return $conn;
}
$dbh=conn($dbh,$user,$dbpass);
?>
