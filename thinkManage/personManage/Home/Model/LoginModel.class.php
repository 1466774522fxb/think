<?php
namespace Home\Model;
use Think\Model;
/**
* 
*/
class LoginModel extends model
{
	protected $trueTableName ='user1';
	function selectInfo($userName,$password)
	{   
		$info=$this->where('userName="'.$userName.'" AND paswd="'.$password.'"')->select();
		return $info;
	}
}