<?php
 class Db{
 	public  static  $link;
 	 function  __construct(){
 	 $con =  mysqli_connect("182.254.246.66","admin","1234")or die("数据库连接失败");
 	  mysqli_select_db($con,"userinfo");
 	  mysqli_query($con, "set names utf8");
 	  $createSql = <<<_END
 	  create table if not exists weixin(
 	  	id int auto_increment primary key,
 	  	access_token varchar(255) not null,
 	  	expires_in int not null,
 	  	openid varchar(32) not null)
_END;
 	 $result =  mysqli_query($con, $createSql);
 	  if($result){
 	  	echo "创建成功";
 	  }else {
 	  	
 	  }
 	   $this->link = $con;
 	}
 	public function  insert_access_token($weixin){
 	 	$insertSql = "insert into weixin values(null,'{$weixin->getAccess_token()}','{$weixin->getExpires_in()}','{$weixin->getOpenid()}')";
 		echo  $insertSql;
 		$result = mysqli_query($this->link,$insertSql);
 	}
 	public function  get_access_token($weixin){
 		$getSql = "select access_token from weixin where openid = '{$weixin->getOpenid()}'";
 		echo $getSql;
 		$result = mysqli_query( $this->link,$getSql);
 		$row = mysqli_fetch_array($result);
//  		print_r($row["access_token"]);
 		return  $row["access_token"];
 	}
 	public function  get_expires_in($weixin){
 		$getSql = "select expires_in from weixin where openid = '{$weixin->getOpenid()}' order by id desc limit 1";
 		echo $getSql;
 		$result = mysqli_query( $this->link,$getSql);
 		$row = mysqli_fetch_array($result);
 		return  $row["expires_in"];
 	}
  function __destruct(){
    mysqli_close($this->link);
  }
 }

?>