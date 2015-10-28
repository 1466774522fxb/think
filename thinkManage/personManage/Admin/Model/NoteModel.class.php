<?php 
namespace Admin\Model;
use Think\Model;
/**
* 
*/
class NoteModel extends Model
{
	protected $trueTableName ='note';
	function selectNote($Id)
	{
		$info=$this->where('number='.$Id)->order('id desc')->select();
		return $info;
	}
	function addInfo($person_num,$class,$text,$time){
		$data['number'] = $person_num;
		$data['num'] = $class;
		$data['text'] = $text;
		$data['time'] = $time;
		$code=$this->add($data);
		return $code;
	}
	function deleteInfo($Id){
        $code=$this->where('Id='.$Id)->delete();
        return $code;
	}
	function updateInfo($Id,$class,$text,$time){
		$data['num'] = $class;
		$data['text'] = $text;
		$data['time'] = $time;
       $code=$this->where('Id='.$Id)->save($data);
       return $code;
	}
	function deleteNote($Id){
       $code=$this->where('number='.$Id)->delete();
        return $code;
	}
}

 ?>