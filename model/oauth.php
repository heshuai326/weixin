<?php
class Oauth{
	private  $access_token;
	private  $expire_in;
	private  $refresh_token;
	private  $openid;
	private  $time;
	function  getAccess_token(){
		return  $this->access_token;
	}
	function  setAccess_token($access_token){
		$this->access_token = $access_token;
	}
	function getExpire_in(){
		return $this->expire_in;
	}
	function  setExpire_in($expires_in){
		$this->expire_in = $expires_in;
	}
	function getRefresh_token(){
		return  $this->refresh_token;
	}
	function  setRefresh_token($refresh_token){
		$this->refresh_token = $refresh_token; 
	}
	function getOpenid(){
		return  $this->openid;
	}
	function  setOpenid($openid){
		$this->openid = $openid;
	}
	function  getTime(){
		return  $this->time;
	}
	function  setTime($time){
		$this->time = $time;
	}
}
?>