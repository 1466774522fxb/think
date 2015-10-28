<?php 
namespace Home\Model;
use Think\Model;
/**
* 
*/
class UserModel extends Model
{
	protected $trueTableName ='user1';
	function selectInfo($id)
	{
		$info=$this->where('Id='.$id)->select();
		return $info;
	}
	function insertInfo($userName,$password){
		$data['userName']=$userName;
		$data['paswd']=$password;
		$data['status']=1;
		$code=$this->add($data);
		return $code;
	}
	function updateInfo($id,$paswd){
          $data['paswd']=$paswd;
          $code=$this->where('id='.$id)->save($data);
          return $code;
	}
	function selectUser($name){
       $info=$this->where('userName="'.$name.'"')->select();
       return $info;
	}
	function allInfo(){
		$info=$this->where('status=1')->select();
		return $info;
	}
	function updateUser($id,$paswd){
          $data['paswd']=$paswd;
          $data['status']=0;
          $code=$this->where('id='.$id)->save($data);
          return $code;
	}
    function deleteInfo($id){
        $code=$this->where('id='.$id)->delete();
        return $code;
    }
    function updateName($id,$userName){
    	$data['userName']=$userName;
    	$code=$this->where('id='.$id)->save($data);
    	return $code;
    }
	
}
 ?>