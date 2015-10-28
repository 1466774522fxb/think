<?php 
namespace Admin\Model;
use Think\Model;
 /**
 * 
 */
 class BookModel extends Model
 {
 	
 	protected $trueTableName ='books';
 	function selectBook($number)
 	{
 		$info=$this->where('person_num='.$number)->select();
 		return $info;
 	}
 	function addInfo($person_num,$title,$image,$text,$author){
        $data['person_num'] = $person_num;
        $data['book_title'] = $title;
        $data['image'] = $image;
        $data['text'] = $text;
        $data['author'] = $author;
        $code=$this->add($data);
        return $code;
 	}
 	function deleteInfo($Id){
 		$code=$this->where('Id='.$Id)->delete();
        return $code;
 	}
 	function updateInfo($Id,$title,$image,$text,$author){
        $data['book_title'] = $title;
        $data['image'] = $image;
        $data['text'] = $text;
        $data['author'] = $author;
       $code= $this->where('id='.$Id)->save($data); // 根据条件更新记录
       return $code;
 	}
    function deleteBook($id){
        $code=$this->where('person_num='.$id)->delete();
        return $code;
    }
 }
 ?>