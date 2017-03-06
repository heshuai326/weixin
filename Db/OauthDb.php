<?php
 class Oauth{
 	public  static  $link;
 	 function  __construct(){
 	 $db = new PDO('localhost','admin','1234');
 	 $createSql = <<<_END
 	 create table if not exists rank(
	  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
	  `openid` varchar(50) DEFAULT NULL,
	  `nickname` varchar(52) DEFAULT NULL,
	  `headimgurl` text,
	  `score` int(6) DEFAULT NULL,
	  PRIMARY KEY (`id`)
   ) ENGINE=InnoDB DEFAULT CHARSET=utf8
_END;
	 
   	 $db->query($sql);
 	  $this->link = $db;
 	}
  function __destruct(){
    $this->link = null;
  }
 }

?>