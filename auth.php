<?php
require 'tool/http.php';

 $code = $_GET["code"];
 $appid = "wx1ba6b62b78195300";
 $appsecret = "f21154e19d411e436200445e4da7e5bc";
 
 $getTokenApi = "https://api.weixin.qq.com/sns/oauth2/access_token?appid={$appid}&secret={$appsecret}&code={$code}&grant_type=authorization_code ";
 $data =  httpGet($getTokenApi);
 $arr = json_decode($data,true);
 $access_token = $arr["access_token"];
   
 $userinfoApi = "https://api.weixin.qq.com/sns/userinfo?access_token={$access_token}&openid={$openid}&lang=zh_CN ";
 $dataUser = httpGet($userinfoApi);
?>
<!DOCTYPE html>
<html>
<header>
<title>我的游戏</title>
<style>
    #btn{

			width: 100px;
			height: 30px;
			background-color: oranged;
			border-radius: 10px;
			border:1px solid blue;
			text-align: center;
			line-height: 30px;
			display: block;
			margin: 0 auto; 
    }
</style>
</header>
<body>
    <a href="#" id="btn"></a>
</body>
<script src="./script/jquery.min.js"></script>
<script>
    var openid = "<?php echo $openid?>";
    var nickname = "<?php echo $nickname?>";
    var headimgurl = "<?php echo $headimgurl?>";
</script>
<script src="./script/main.js"></script>
</html>