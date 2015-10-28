<?php 
 namespace Home\Model;
 use Think\Model;
 /**
 * 
 */
 class PhotoModel extends Model
 {
 	protected $trueTableName ='photo';
 	function photoInfo($Id){
       $info=$this->where('number='.$Id)->select();
       return $info;
 	}
 	function selectInfo($id,$count)
 	{   if ($count==1) {
 		$count-=1;
 	    }else{
 	    	$count=($count-1)*8;
 	    }
 		
 		$info=$this->where('number='.$id)->limit($count,8)->select();
 		return $info;
 	}
 	function addInfo($id,$path){
         $data['number'] = $id;
         $data['photo_url'] = $path;
         $code=$this->add($data);
         return $code;
 	}
 	function deleteInfo($id){
         $code=$this->where('id='.$id)->delete();
         return $code;
 	}
 	function deletePhoto($id){
        $code=$this->where('number='.$id)->delete();
        return $code;
 	}
 }

 ?>