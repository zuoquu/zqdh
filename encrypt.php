<?php
/*
*sql语句过滤
*/
function sql_encode($str)
{
    if(empty($str)) return "";
    $str=trim($str);

    $str=str_replace("_","\_",$str);
    $str=str_replace("%","\%",$str);
    $str=str_replace(chr(39),"&#39;",$str);
    $str=str_replace("'","''",$str);
    $str=str_replace("select","sel&#101;ct",$str);
    $str=str_replace("join","jo&#105;n",$str);
    $str=str_replace("union","un&#105;on",$str);
    $str=str_replace("where","wh&#101;re",$str);
    $str=str_replace("insert","ins&#101;rt",$str);
    $str=str_replace("delete","del&#101;te",$str);
    $str=str_replace("update","up&#100;ate",$str);
    $str=str_replace("like","lik&#101;",$str);
    //$str=str_replace("drop","dro&#112;",$str);
    $str=str_replace("create","cr&#101;ate",$str);
    $str=str_replace("modify","mod&#105;fy",$str);
    $str=str_replace("rename","ren&#097;me",$str);
    $str=str_replace("alter","alt&#101;r",$str);
    $str=str_replace("cast","ca&#115;",$str);
    return $str;
}

/*
*取消sql语句过滤
*/
function sql_decode($str)
{
    if(empty($str)) return "";

    $str=str_replace("&#39;",chr(39),$str);
    $str=str_replace("''","'",$str);
    $str=str_replace("sel&#101;ct","select",$str);
    $str=str_replace("jo&#105;n","join",$str);
    $str=str_replace("un&#105;on","union",$str);
    $str=str_replace("wh&#101;re","where",$str);
    $str=str_replace("ins&#101;rt","insert",$str);
    $str=str_replace("del&#101;te","delete",$str);
    $str=str_replace("up&#100;ate","update",$str);
    $str=str_replace("lik&#101;","like",$str);
    $str=str_replace("dro&#112;","drop",$str);
    $str=str_replace("cr&#101;ate","create",$str);
    $str=str_replace("mod&#105;fy","modify",$str);
    $str=str_replace("ren&#097;me","rename",$str);
    $str=str_replace("alt&#101;r","alter",$str);
    $str=str_replace("ca&#115;","cast",$str);
    return $str;
}

/*
*过滤所有html标签
*/
function filters_all($text)
{
    $text = trim($text);
    $allow = "<br/> <br> <hr/> <hr> <a> <img> <b> <i> <u> <s> <strike>";
    //$text = str_replace("'","",$text);
    $text = strip_tags($text, $allow);
    $text = stripslashes($text);
    return $text;
}

/*
*自动替换提交数据中的空格和换行
*/
function html_replace($str) {
	$str = str_replace(" ","&nbsp;",$str);
	$str = str_replace("\r\n","<br>",$str);
	
	return $str;
}

// stripslashes($text); php过滤
//htmlspecialchars($text); html转义
//截取文章
function sub_str($text,$length)
{
for   ($i=0;$i <$length;$i++)
{
$chr = substr($text,$i,1);
if   (ord($chr)   >   0x80)//字符是中文
{
$length++;    //是中文的话长度就增加
$i++;
}
}
$str   =   substr($text,   0,   $length);  
return   $str;
}
//检测访问wap

?>