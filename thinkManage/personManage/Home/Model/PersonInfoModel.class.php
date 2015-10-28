<?php  
 namespace Home\Model;
 use Think\Model;
 /**
 * 
 */
 class PersonInfoModel extends Model
 {
 	protected $trueTableName ='person_info';
 	function selectInfo($id)
 	{
 		$info=$this->where('number='.$id)->select();
        return $info;
 	}
 	function updateInfo($id,$politics,$birthday,$newAddress,$marriage,$blood,$hometown,$company,$companyAddress,$address,$star,$music,$film,$game,$digit,$food,$tour,$book,$other)
 	{
 		$data['politics']=$politics;
 		$data['birthday']=$birthday;
 		$data['marriage']=$marriage;
        $data['newaddress']=$newAddress;
        $data['blood']=$blood;
        $data['hometown']=$hometown;
        $data['company']=$company;
        $data['companyAddress']=$companyAddress;
        $data['address']=$address;
        $data['star']=$star;
        $data['music']=$music;
        $data['film']=$film;
        $data['game']=$game;
        $data['digit']=$digit;
        $data['food']=$food;
        $data['tour']=$tour;
        $data['book']=$book;
        $data['other']=$other;
 		$info=$this->where('number='.$id)->save($data);
        return $info;
 	}
    function insertInfo($id){
             $data['number']=$id;
             $code= $this->add($data);
             return $code;
    }
    function deleteInfo($id){
            $code=$this->where('number='.$id)->delete();
            return $code;
    }
 }

?>