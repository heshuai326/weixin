<?php
require 'http.php';
require '../Db/Db.php';
require '../model/model.php';

//获取token的方法
/*查看最后一条的时间按和现在的时间进行比较
 * 如果没有超过时间就是查询出来的token
 * 如果超时就重新发一个http请求获取
 */
function  getToken(){
	$appid = "wx1ba6b62b78195300";
	$appsecret = "f21154e19d411e436200445e4da7e5bc";
	$db = new Db();
	$weixin = new Weixin();
	$weixin->setOpenid("$appid");
	$oldTime = $db->get_expires_in($weixin);
	echo "原先时间".$oldTime;
	$newTime = time();
	if($newTime -$oldTime>7100){
		//已经过期
		$getTokenUrl = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appid}&secret={$appsecret}";
		$data  = httpGet($getTokenUrl);
		$arr = json_decode($data,true);
		$token = $arr["access_token"];
		echo $token;
		$weixin->setAccess_token($token);
		$weixin->setExpires_in($newTime);
 		var_dump($weixin);
		$db->insert_access_token($weixin);	
		return $token;//return后面的代码将不执行
	}else{
		//没有过期
		return $db->get_access_token($weixin);
	}
}
getToken();

?>