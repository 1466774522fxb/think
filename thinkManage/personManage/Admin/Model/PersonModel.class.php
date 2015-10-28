<?php
/**
* 
*/
namespace Admin\Model;
use Think\Model;

class PersonModel extends Model
{
	protected $trueTableName ='person';
	function selectPerson($id){
		$info=$this->where('number='.$id)->select();
		return $info;
	}
	function upadate($id,$name,$pinyin,$sex,$age,$telephone,$qq,$email,$address)
	{
		$data['name'] = $name;
		$data['pinyin'] = $pinyin;
		$data['sex'] = $sex;
		$data['age'] = $age;
		$data['telephone'] = $telephone;
		$data['qq'] = $qq;
		$data['email'] =$email;
		$data['address'] =$address;
		$code=$this->where('number='.$id)->save($data); // 根据条件更新记录
	
		return $code;
	}
	function updateImg($Id,$url){
		$this->head_img=$url;
		$code=$this->where('number='.$Id)->save(); // 根据条件更新记录 
		return $code;
	}
	function insertInfo($Id){
		$data['number']=$Id;
		$data['head_img']="moren.jpg";
		$code=$this->add($data);
		return $code;
	}
}