<?php 
namespace Home\Model;
use Think\Model;
/**
* 
*/
class CommentModel extends Model
{
	protected $trueTableName ='comment';
	function deleteInfo($id)
	{
		$code=$this->where('msgId='.$id)->delete();
		return $code;


	}
	function deleteComment($time){
		$code=$this->where('rely_time="'.$time.'"')->delete();
		return $code;
	}
	function addInfo($number,$msgid,$rely_text,$rely_time){
		$data['seed_person']=$number;
		$data['msgId']=$msgid;
        $data['rely_text']=$rely_text;
		$data['rely_time']=$rely_time;
		$code=$this->add($data);
		return $msgid;
	}
}

 ?>