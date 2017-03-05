<?php
//第三方网页授权页面
/*两种授权模式:snsapi_base,静默模式；snsapi_userinfo,同意授权
 * 网页授权的流程：
 * 1.用户同意授权，获取code
 * 2.通过code换取晚饭也授权access_token
 * 3.刷新access_token(如果需要)
 * 4.拉取用户信息
 */
require 'http.php';
$code = $_GET["code"];
$appid = "wx1ba6b62b78195300";
$appsecret = "f21154e19d411e436200445e4da7e5bc";

$getAccessTokenUrl = "https://api.weixin.qq.com/sns/oauth2/access_token?appid={$appid}&secret={$appsecret}&code=${$code}&grant_type=authorization_code"; 
$data =  httpGet($getAccessTokenUrl);
$arr = json_decode($data,true);
$access_token = $arr["access_token"];

?>