<?php
//封装的一个微信数据对象
class  Weixin{
	private $id;
	private $access_token;
	private $expires_in;
	private $openid;
	private function  getId(){
		return  $this->id;
	}
	public  function  setId($id){
		$this->id=$id;
	}
	public  function  getAccess_token(){
		return $this->access_token;
	}
	public  function  setAccess_token($access_token){
		$this->access_token = $access_token;
	}
	public  function  getExpires_in(){
		return  $this->expires_in;
	}
	public  function  setExpires_in($expires_in){
		$this->expires_in = $expires_in;
	}
	public  function  getOpenid(){
		return  $this->openid;
	}
	public  function  setOpenid($openid){
		$this->openid = $openid;
	}
		
}
?>