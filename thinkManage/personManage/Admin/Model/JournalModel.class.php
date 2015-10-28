<?php 
namespace Admin\Model;
use Think\Model;
/**
* 
*/
class JournalModel extends model
{
	protected $trueTableName ='journal';
	function selectJournal($id,$start,$size)
	{

	 $info=$this->where('number='.$id)->limit($start,$size)->select();
	 return $info;
	}
	function selectJournalInfo($id)
	{

	 $info=$this->where('number='.$id)->select();
	 return $info;
	}
	function deleteInfo($time){
     $code=$this->where('time="'.$time.'"')->delete();
	 return $code;
	}
	function addInfo($number,$title,$text,$time){
		$data['number'] =$number ;
		$data['title'] = $title;
		$data['text'] = $text;
		$data['time'] = $time;
		$code=$this->add($data);
		return $code;
	}
	function deleteJournal($id){
        $code=$this->where('number='.$id)->delete();
        return $code;
	}
	function updateInfo($id_time,$title,$text,$time){
		$data['title'] = $title;
		$data['text'] = $text;
		$data['time'] = $time;
		$code=$this->where('time="'.$id_time.'"')->save($data); 
		return $code;
	}
}

 ?>