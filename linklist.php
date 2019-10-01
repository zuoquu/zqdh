<?php
/*********************************/
/*******Tune简易导航***************/
/*******作者:Tune(作曲)************/
/*******©版权所有，禁止用该程序商业化*/
/*******问题反馈QQ178484776********/
/*********************************/
ob_start();//打开缓冲
$cid = $_GET['cid'];
if($cid==1){$term="更多源码网址推荐";
}elseif($cid==2){$term="更多论坛网址推荐";
}elseif($cid==3){$term="更多美图网址推荐";
}elseif($cid==4){$term="更多文学网址推荐";
}elseif($cid==5){$term="更多挂机网址推荐";
}elseif($cid==6){$term="更多网盘网址推荐";
}elseif($cid==7){$term="更多导航网址推荐";
}elseif($cid==8){$term="更多博客网址推荐";
}elseif($cid==9){$term="更多其他网址推荐";
}
include "./style/head.php";//顶部内容
include './conn.php';
echo '<div class="background">';
echo '<div class="title">'.$term.'</div>';
include './admin/webconfig.php';


$page = isset($_GET['page'])?intval($_GET['page']):1;
$num=$ts;
$total=mysql_num_rows(mysql_query("select * from tune_LINK where display = 1 and cat_id = $cid"));
$pagenum=ceil($total/$num);
If($page>$pagenum || $page == 0){
       echo "Error : Can Not Found The page .";
}
$offset=($page-1)*$num;

//顺序设置
if($moreorder == 0){
$cat_order="order by id desc";}
elseif($moreorder == 1){$cat_order="order by views desc";}
elseif($moreorder == 2){$cat_order="order by vlink desc";}
elseif($moreorder == 3){$cat_order="order by rand()";}
elseif($moreorder == 4){$cat_order="order by id";}

   if($cid==1){$cat_sql = mysql_query("SELECT * from tune_LINK where display=1 and cat_id=1 $cat_order limit $offset,$num");//源码
}
   elseif($cid==2){$cat_sql = mysql_query("SELECT * from tune_LINK where display=1 and cat_id=2 $cat_order limit $offset,$num");//论坛
}
   elseif($cid==3){
   $cat_sql = mysql_query("SELECT * from tune_LINK where display=1 and cat_id=3 $cat_order limit $offset,$num");//美图
   }
   elseif($cid==4){$cat_sql = mysql_query("SELECT * from tune_LINK where display=1 and cat_id=4 $cat_order limit $offset,$num");//文学
   }
   elseif($cid==5){$cat_sql = mysql_query("SELECT * from tune_LINK where display=1 and cat_id=5 $cat_order limit $offset,$num");//破解
   }
   elseif($cid==6){$cat_sql = mysql_query("SELECT * from tune_LINK where display=1 and cat_id=6 $cat_order limit $offset,$num");//下载
   }
   elseif($cid==7){$cat_sql = mysql_query("SELECT * from tune_LINK where display=1 and cat_id=7 $cat_order limit $offset,$num");//导航
   }
   elseif($cid==8){$cat_sql = mysql_query("SELECT * from tune_LINK where display=1 and cat_id=8 $cat_order limit $offset,$num");//其他
}
   elseif($cid==9){$cat_sql = mysql_query("SELECT * from tune_LINK where display=1 and cat_id=9 $cat_order limit $offset,$num");//其他
}
while($row=mysql_fetch_array($cat_sql)){
 echo '<a href="/outlink-'.$row[id].'.html">'.$row['longname'].'</a><br>';
 }

echo '<hr><a href="/linklist-'.$cid.'-1.html">首页 </a> ';
$prev=$page-1;
if($page!=1){
echo '<a href="/linklist-'.$cid.'-'.$prev.'.html"> 上页 </a> ';}
if($page < $pagenum){
$next=$page+1;
echo $page.'/'.$pagenum;
echo ' <a href="/linklist-'.$cid.'-'.$next.'.html">下页 </a> ';}
echo '<a href="/linklist-'.$cid.'-'.$pagenum.'.html">尾页</a> ';
include_once "./foot.php";
echo '</div>';
?>