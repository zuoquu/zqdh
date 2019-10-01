<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title><?php ob_start();echo $term;date_default_timezone_set("Asia/Shanghai");?></title>
<style type="text/css"> 
<?php
/**
*方法1
**/
function check_wap(){
  // 先检查是否为wap代理，准确度高
  if(stristr($_SERVER['HTTP_VIA'],"wap")){
    return true;
  }
  // 检查浏览器是否接受 WML.
  elseif(strpos(strtoupper($_SERVER['HTTP_ACCEPT']),"VND.WAP.WML") > 0){
    return true;
  }
  //检查USER_AGENT
  elseif(preg_match('/(blackberry|configuration\/cldc|hp |hp-|htc |htc_|htc-|iemobile|kindle|midp|mmp|motorola|mobile|nokia|opera mini|opera |Googlebot-Mobile|YahooSeeker\/M1A1-R2D2|android|iphone|ipod|mobi|palm|palmos|pocket|portalmmm|ppc;|smartphone|sonyericsson|sqh|spv|symbian|treo|up.browser|up.link|vodafone|windows ce|xda |xda_)/i', $_SERVER['HTTP_USER_AGENT'])){
    return true;       
  }
  else{
    return false;  
  }
}

if(check_wap()){

include 'wapcss.css';

}else{

include 'webcss.css';
}

/**
*方法2
**/
/*$agent = strtolower($_SERVER['HTTP_USER_AGENT']);
$iphone = (strpos($agent, 'iphone')) ? true : false;
$ipad = (strpos($agent, 'ipad')) ? true : false;
$android = (strpos($agent, 'android')) ? true : false;
if($iphone || $ipad){
echo 'you phone is iPhone or iPad';
}else if($android){
include 'wapcss.css';
}else{
include 'webcss.css';
}*/            
?>
</style> 
</head></html>