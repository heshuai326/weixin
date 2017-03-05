<?php
//测试吧类
require '../Db/Db.php';
require '../model/model.php';
// require 'getToken.php';
$db = new Db();
$weixin = new  Weixin();
$weixin->setId("1");
$weixin->setAccess_token(12313);
$weixin->setExpires_in(1012);
$weixin->setOpenid("wx1ba6b62b78195300");
// $db->insert_access_token($weixin);
$result =  $db->get_access_token($weixin);
// $result  =  $db->get_expires_in($weixin);
// var_dump($result);
// getToken();
?>