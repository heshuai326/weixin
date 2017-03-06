<?php
//接受用户信息，保存到数据库
$score = $_GET["score"];
$openid  = $_GET["openid"];
$nickname = $_GET["nickname"];
$headimgurl = $_GET["headimgurl"];

$con =  mysqli_connect("182.254.246.66","admin","1234")or die("数据库连接失败");
mysqli_select_db($con, "rank");
mysqli_query($con, "set names utf8");

$sql = "select * from rank where openid = {$openid}";
$result = mysqli_query($con, $sql);
if(mysqli_num_rows($result)>0){
	echo "已存在";
	$arr = mysqli_fetch_assoc($result);
	
}else {
	echo "不存在";
	$sql = "insert into rank values(null,{$openid},{$nickname},{$headimgurl},{$score})";
	$result = mysqli_query($con, $sql);	
}
