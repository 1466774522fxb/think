<?php
namespace Home\Controller;
use Think\Controller;
/**
* 
*/
class ManageController extends Controller
{
	
	function Login()
	{
	  session('name',null); 
	  session('user_Id',null); 
	  $this->display();
	}
	function LoginInfo(){
		
		$username=$_POST['username'];
		$password=$_POST['password'];
		$password=md5($password);
		$login=new \Home\Model\LoginModel();
		$info=$login->selectInfo($username,$password);
		if ($info==null) {
			$data['code']=0;
			$this->ajaxReturn($data);
		}else{
			foreach ($info as $key => $value) {
				$data['username']  = $value['username'];
				$data['content'] = 'content';
				$data['user_id']=$value['id'];
				$data['code']=1;
				session('name',$value['username']); 
				session('user_Id',$value['id']); 
			}
			$this->ajaxReturn($data);
		}
		
	}
}