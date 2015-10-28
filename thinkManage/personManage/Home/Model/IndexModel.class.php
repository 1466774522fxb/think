<?php 
 namespace Home\Model;
 use Think\Model;
 /**
 * 
 */
 class IndexModel extends Model
 {
 	protected $trueTableName ='user1';
 	function selectInfo()
 	{   
 		
 		$info=$this->field('number,user1.userName as name,head_img')->join('person ON user1.id = person.number')->where('status=1')->select();
 		return $info;
 	}
 }

 ?>