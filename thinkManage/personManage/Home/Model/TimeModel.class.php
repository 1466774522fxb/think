<?php 
namespace Home\Model;
use Think\Model;
/**
* 
*/
class TimeModel extends Model
{
	protected $trueTableName ='note';
	function selectInfo($Id,$class,$page,$limit)
	{   if ($page==1) {
		$page-=1;
	    }else{
	    	$page=($page-1)*$limit;
	     }
		$info=$this->where('number='.$Id .' AND num='.$class )->limit($page,$limit)->order('time desc')->select();
		return $info;
	}

}

 ?>