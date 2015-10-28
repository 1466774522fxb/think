<?php 
namespace Home\Model;
use Think\Model;
/**
* 
*/
class MessageModel extends Model{
	protected $trueTableName ='message';
	function selectInfo($Id)
	{
		$info=$this->where('number='.$Id)->select();
		return $info;
	}
	function deleteInfo($id){
		$code=$this->where('Id='.$id)->delete();
		return $code;
	}
	function addInfo($number,$msg_name,$seed_id,$msg_text,$time){
		$data['number']=$number;
		$data['msg_name']=$msg_name;
		$data['seed_id']=$seed_id;
		$data['msg_text']=$msg_text;
		$data['msg_time']=$time;
		$code=$this->add($data);
		return $code;
	}
}
 ?>