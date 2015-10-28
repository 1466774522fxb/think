<?php 
//后台控制器
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller{
    function person(){      //显示个人信息
        $person=new \Admin\Model\PersonModel() ;
        $info=$person->where('number='.session('user_Id'))->select();
        foreach ($info as $key => $value) {
           $this -> assign('username',$value['name']);
           $this -> assign('pinyin',$value['pinyin']);
           $this -> assign('sex',$value['sex']);
           $this -> assign('age',$value['age']);
           $this -> assign('phone',$value['telephone']);
           $this -> assign('qq',$value['qq']);
           $this -> assign('Email',$value['email']);
           $this -> assign('address',$value['address']);
        }
        $this->assign('useId', session('location'));
        $this->assign('userNum',session('user_Id'));
      	$this->display();
    }
    function upadatePerson(){    //更新个人信息
        $person=new \Admin\Model\PersonModel() ;
        $temp=$person->upadate(session('user_Id'),$_POST['username'],$_POST['pinyin'],$_POST['sex'],$_POST['age'],$_POST['phone'],$_POST['QQ'],$_POST['email'],$_POST['address']);
        $this->ajaxReturn($temp);
    }
    function journal(){     //显示日志信息
         $jouranl=new \Admin\Model\JournalModel();
         $total=count($jouranl->selectJournal(session("user_Id")));
         $per =8;
         $page= new \Compoent\Page($total,$per);
         $sql="select * from journal where number=".session('user_Id')." ".$page->limit;
         $info=$jouranl->query($sql);
         $pagelist=$page->fpage();
         $this->assign('info',$info);
         $this->assign('pagelist',$pagelist);
         $this->assign('useId', session('location'));
         $this->assign('userNum',session('user_Id'));
         $this->display();
    }
    function deleteJournal(){       //删除日志信息
         $jouranl=new \Admin\Model\JournalModel();
         $code=$jouranl->deleteInfo($_POST['time']);
         $this->ajaxReturn($code);
    }
    function addJournal(){    //添加日志信息
      $jouranl=new \Admin\Model\JournalModel();
      $code=$jouranl->addInfo(session('user_Id'),$_POST['journalTitle'],$_POST['journal_text'],$_POST['time']);
      $this->ajaxReturn($code);
    }
    function updateJournal(){  //更新日志信息
       $jouranl=new \Admin\Model\JournalModel();
       $code=$jouranl->updateInfo($_POST['id_time'],$_POST['journalTitle'],$_POST['journal_text'],$_POST['time']);
       $this->ajaxReturn($code);
    }
    function book(){           //显示图书信息
      $book =new \Admin\Model\BookModel();
      $total=count($book->selectBook(session('user_Id')));
      $per =6;
      $page= new \Compoent\Page($total,$per);
      $sql="select * from books where person_num=".session('user_Id')." ".$page->limit;
      $info=$book->query($sql);
      $pagelist=$page->fpage();
      $this->assign('pagelist',$pagelist);
      $this->assign('info',$info);
      $this->assign('useId', session('location'));
      $this->assign('userNum',session('user_Id'));
      $this->display();
    }
    function addBook(){      //添加图书信息
      $book =new \Admin\Model\BookModel();
      $code=$book->addInfo(session('user_Id'),$_POST['bookName'],$_POST['image_path'],$_POST['bookText'],$_POST['bookAutor']);
      $this->ajaxReturn($code);

    }
    function deleteBook(){   //删除图书信息
      $book =new \Admin\Model\BookModel();
      $code=$book->deleteInfo($_POST['Id']);
      $this->ajaxReturn($code);

    }
    function updateBook(){    //更新图书信息
      $book =new \Admin\Model\BookModel();
      $code=$book->updateInfo($_POST['Id'],$_POST['bookName'],$_POST['image_path'],$_POST['bookText'],$_POST['bookAutor']);
      $this->ajaxReturn($code);
    }
    function note(){        //显示笔记和便签信息
      $note=new \Admin\Model\NoteModel();
      $total=count($note->selectNote(session('user_Id')));
      $per =8;
      $page= new \Compoent\Page($total,$per);
      $sql="select * from note where number=".session('user_Id')." ".$page->limit;
      $info=$note->query($sql);
      $pagelist=$page->fpage();
      $this->assign('info',$info);
      $this->assign('pagelist',$pagelist);
      $this->assign('useId', session('location'));
      $this->assign('userNum',session('user_Id'));
      $this->display();
    }
    function addNote(){     //添加笔记和便签信息
      $note=new \Admin\Model\NoteModel();
      $class=$_POST['noteTitle'];
      if ($class=='便签') {
         $class=1;
       } else{
         $class=0;
       }
      $code=$note->addInfo(session('user_Id'),$class,$_POST['note_text'],$_POST['time']);
      $this->ajaxReturn($code);
    }
    function  deleteNote(){     // 删除笔记和便签
      $note =new \Admin\Model\NoteModel();
      $code=$note->deleteInfo($_POST['Id']);
      $this->ajaxReturn($code);
    }
    function updateNote(){  //更新笔记和便签
      $note =new \Admin\Model\NoteModel();
       $class=$_POST['noteTitle'];
       if ($class=='便签') {
         $class=1;
       } else{
         $class=0;
       }
      $code=$note->updateInfo($_POST['id'],$class,$_POST['note_text'],$_POST['time']);
      $this->ajaxReturn($code);
    }

  function revisePwd(){    //修改密码
    $this->assign('useId', session('location'));
    $this->assign('userNum',session('user_Id'));
    $this->display();
  }
  function checkPassword(){   //修改密码
    $userName=$_POST['userName'];
    $password=md5($_POST['password']);
    $newPassword=$_POST['newPassword'];
    $rePassword=md5($_POST['rePassword']);
    $user=new \Home\Model\UserModel();
    $info=$user->selectInfo(session('user_Id'));

    foreach ($info as $key => $value) {
         $id=$value['id'];
         if (($value['paswd']!=$password)||($userName!=$value['username'])) {
            $code=3;
         }else{
             $code=$user->updateInfo($id,$rePassword);
          }
        }
    $this->ajaxReturn($code);
   
  }
  public function manage(){  //高级管理信息
    $user=new \Home\Model\UserModel();
    $info=$user->allInfo();
    $this->assign('info',$info);
    $this->assign('useId', session('location'));
    $this->assign('userNum',session('user_Id'));
    $this->display();
  }
  public function deletePerson(){  //删除人员信息
      $id=$_POST['id'];
      $user=new \Home\Model\UserModel();
      $time=time();
      $time=md5($time);
      $code=$user->updateUser($id,$time);
      $book=new \Admin\Model\BookModel();
      $book->deleteBook($id);
      $journal=new \Admin\Model\JournalModel();
      $journal->deleteJournal($id);
      $note=new \Admin\Model\NoteModel();
      $note->deleteNote($id);
      $photo=new \Home\Model\PhotoModel();
      $photo->deletePhoto($id);
      $person_info=new \Home\Model\PersonInfoModel();
      $person_info->deleteInfo($id);
      $this->ajaxReturn( $code);
  }
  public function updateUser(){  //更新用户信息
     $id=$_POST['id'];
     $user=new \Home\Model\UserModel();
     $value=$_POST['userNamePsd'];
     $info=$_POST['userSelect'];
     if ($info=='密码') {
      $value=md5($value);
       $code=$user->updateInfo($id,$value);
     }else{
       $code=$user->updateName($id,$value);
     }
     $this->ajaxReturn($code);
  }

  //图像上传
  public function uploadify(){
       if (!empty($_FILES)) {
          //图片上传设置
          $config = array(  
              'maxSize'    =>    3145728,
              'rootPath'   =>    './Public',
              'savePath'   =>    '/uploads/',  
              'saveName'   =>    array('uniqid',''),
              'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),  
              'autoSub'    =>    false,  
              'subName'    =>    array('date','Ymd'),
          );
          $upload = new \Think\Upload($config);// 实例化上传类
          $images = $upload->upload();
          //判断是否有图
          if($images){
           
              $info=$images['Filedata']['savename'];
              //返回文件地址和名给JS作回调用
              $this->ajaxReturn($info);
          }
          else{
              $this->error($upload->getError());//获取失败信息
          }
      }
  }
}
 ?>