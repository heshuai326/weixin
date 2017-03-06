<?php
 class Db{
 	public  static  $link;
 	 function  __construct(){
 	 $con =  mysqli_connect("182.254.246.66","admin","1234")or die("数据库连接失败");
 	  mysqli_select_db($con,"userinfo");
 	  mysqli_query($con, "set names utf8");
 	  $createSql = <<<_END
 	  create table if not exists oauth(
 	  	id int auto_increment primary key,
 	  	access_token varchar(255) not null,
 	  	expires_in int not null,
 	  	refresh_token varchar(255),
 	  	openid varchar(32) not null,
 	  	time int not null)
_END;
 	 $result =  mysqli_query($con, $createSql);
 	  if($result){
 	  	echo "创建成功";
 	  }else {
 	  	
 	  }
 	   $this->link = $con;
 	}
 	public function  insert_access_token($oauth){
 	 	$insertSql = "insert into weixin values(null,'{$oauth->getAccess_token()}','{$oauth->getExpires_in()}','{$oauth->getRefresh_token()}',{$oauth->getOpenid()}','{$oauth->getTime()}')";
 		echo  $insertSql;
 		$result = mysqli_query($this->link,$insertSql);
 	}
 	public function  get_access_token($oauth){
 		$getSql = "select access_token from weixin where openid = '{$oauth->getOpenid()}'";
 		echo $getSql;
 		$result = mysqli_query( $this->link,$getSql);
 		$row = mysqli_fetch_array($result);
//  		print_r($row["access_token"]);
 		return  $row["access_token"];
 	}
 	public function  get_expires_in($oauth){
 		$getSql = "select expires_in from oauth where openid = '{$oauth->getOpenid()}' order by id desc limit 1";
 		echo $getSql;
 		$result = mysqli_query( $this->link,$getSql);
 		$row = mysqli_fetch_array($result);
 		return  $row["expires_in"];
 	}
 	public function  get_Time($oauth){
 		$getSql = "select time from oauth where openid = '{$oauth->getTime()}' order by id desc limit 1";
 		echo $getSql;
 		$result = mysqli_query( $this->link,$getSql);
 		$row = mysqli_fetch_array($result);
 		return  $row["time"];
 	}
  function __destruct(){
    mysqli_close($this->link);
  }
 }

?>