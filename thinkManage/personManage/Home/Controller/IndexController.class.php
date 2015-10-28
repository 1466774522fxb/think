<?php
//前台控制器 
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){    //显示网站首页信息
      $index=new \Home\Model\IndexModel() ;
      $info=$index->selectInfo();
      $this->assign('info',$info);
      $this->display();
    }
    public function verifyimg() //显示验证码
    {
       $Verify =     new \Think\Verify();// 设置验证码字符为纯数字
       $Verify->codeSet = '0123456789';
       $Verify->entry();
    }
 /*   public function codeInfo(){  
         $code=$_POST['code'];
         $Verify =    new \Think\Verify();
         $inCode=$Verify->check($code,'');
         $this->ajaxReturn($inCode);
    }*/
    public function registerInfo(){  //判断注册信息是否成功
      $userName=$_POST['userName'];
      $pwd2=md5($_POST['pwd2']);
      $code=$_POST['id_Code'];
      $Verify =    new \Think\Verify();
      $inCode=$Verify->check($code,'');
      if (!$inCode) {
         $code=-1;
      }else{
        $user=new \Home\Model\UserModel();
         $info=$user->selectUser($userName);
         $count=count($info);
         if ($count==1) {
            $code=-2;
         }else{
          $code=$user->insertInfo($userName,$pwd2);
          if ($code>0) {
            $info=$user->selectUser($userName);
            foreach ($info as $key => $value) {
               $Id=$value['id'];
            }
             $person=new \Admin\Model\PersonModel();
             $person->insertInfo($Id);
             $personInfo=new \Home\Model\PersonInfoModel();
             $personInfo->insertInfo($Id);
          }
        }
      }
      $this->ajaxReturn($code);
    }
    public function main(){    // 个人网站首页信息
        $this->assign('reate',"&");
    	  $user=new \Home\Model\UserModel();
    	  $userInfo=$user->selectInfo($_GET['Id']);
    	  $this->assign('userInfo',$userInfo);
    	  $this->assign('userId',$_GET['Id']);
    	  $person=new \Admin\Model\PersonModel();
    	  $personInfo=$person->selectPerson($_GET['Id']);
    	  $this->assign('personInfo',$personInfo);
    	  $personInfo=new \Home\Model\PersonInfoModel();
    	  $selectInfo=$personInfo->selectInfo($_GET['Id']);
    	  $this->assign('person',$selectInfo);
    	  $book =new \Admin\Model\BookModel();
          $bookInfo=$book->selectBook($_GET['Id']);
         $this->assign('bookInfo',$bookInfo);
          if (!empty(session('name'))) {
          $this->assign('user',session('name'));
          $this->assign('user_id',session('user_Id'));
          }else{
            $this->assign('user',0);
          }
          session('location',$_GET['Id']);
          $user=new \Home\Model\UserModel();
          $userInfo=$user->selectInfo($_GET['Id']);
          foreach ($userInfo as $key => $value) {
             $name=$value['username'];
          }
          session('location',$_GET['Id']);
          session('local_name',$name);
          $this->assign('name',$name);
          $this->display();
    }
    public function journal(){      //显示个人日志信息
    	 $jouranl=new \Admin\Model\JournalModel();
    	 $total= count($jouranl->selectJournalInfo($_GET['Id']));
    	 $per =4;
    	 $page= new \Compoent\Page($total,$per);
    	 $sql="select * from journal where number=".$_GET['Id']." ".$page->limit;
    	 $info=$jouranl->query($sql);
    	 $pagelist=$page->fpage();
       $this->assign('info',$info);
       $pageSize=count($info);
       $this->assign('pageSize',$pageSize);
       $this->assign('pagelist',$pagelist);
       $this->assign('reate',"&");
       $this->assign('userId',$_GET['Id']);
       if (!empty(session('name'))) {
           $this->assign('user',session('name'));
           $this->assign('user_id',session('user_Id'));
        }else{
          $this->assign('user',0);
       }
       $this->assign('name',session('local_name'));
    	 $this->display();
    }
    public function photo(){  // 显示个人照片
    	$this->assign('reate',"&");
    	$value=session('number');
    	$this->assign('value',$value);
    	$photo=new \Home\Model\PhotoModel();
      $photoInfo=$photo->where('number='.$_GET['Id'])->select();
      $count=ceil(count($photoInfo)/8);
      $page=$_GET['page'];
    	$Info=$photo->selectInfo($_GET['Id'],$page);
    	$this->assign('info',$Info);
    	 $this->assign('userId',$_GET['Id']);
          if (!empty(session('name'))) {
          $this->assign('user',session('name'));
          $this->assign('user_id',session('user_Id'));
          }else{
            $this->assign('user',0);

          }
      if ($count==0) {
        $count=1;
      }
      $this->assign('countPhoto',$count);
      $this->assign('page',$page);
      $this->assign('name',session('local_name'));
    	$this->display();
    } 
    public function addPhoto(){  //添加图片
    	$photo=new \Home\Model\PhotoModel();
    	$code=$photo->addInfo($_POST['num'],$_POST['path']);
      $this->ajaxReturn($code);
    }
    public function photoAlter(){    //删除照片信息
      $photo=new \Home\Model\PhotoModel();
      $id=$_POST['num'];
      $code=$photo->deleteInfo($id);
      $this->ajaxReturn($code);
    }
    public function message(){  //显示个人留言信息
    	$message=new \Home\Model\MessageModel();
    	
    	$info=$message->selectInfo($_GET['Id']);
    	$count=$info->length;
      $this->assign('count',$count);
      $person=new \Admin\Model\PersonModel();
       $messageInfo=$person->field('message.Id,seed_id,head_img,msg_name,msg_text,msg_time,remark')
               ->join(' message on message.seed_id=person.number')
               ->where('message.number='.$_GET['Id'])->order('msg_time desc')
               ->select();
         $this->assign('messageInfo',$messageInfo);
         $i=1;
       foreach ($messageInfo as $key => $value) {
       	
       	 $comment=new \Home\Model\CommentModel();
        	$commtent[$i]=$comment->field('msgId,user1.username,name,head_img,rely_text,rely_time')
       	         ->join('person on comment.seed_person=person.number')
                 ->join('user1 on user1.id=person.number')
       	         ->where('msgId='.$value['id'])->select();
       	 $this->assign('comment'.$i,$commtent[$i]);
        

       	 $i++;
       }
      $this->assign('userId',$_GET['Id']);
      $this->assign('name',session('local_name'));
      $this->assign('reate',"&");
       if (!empty(session('name'))) {
          $this->assign('user',session('name'));
          $this->assign('user_id',session('user_Id'));
          }else{
            $this->assign('user',0);
          }
      $this->display();
    }
    public function addMessage(){  // 添加留言
         $id=$_POST['Id'];
         $name=$_POST['name'];
         $date=$_POST['date'];
         $text=$_POST['text'];
         $seed_id=session('user_Id');
         $message=new \Home\Model\MessageModel();
         $code=$message->addInfo($id,$name,$seed_id,$text,$date);
         $this->ajaxReturn($code);
    }
    public function deleteSay(){  //删除留言
       $msgId=$_POST['msgId'];
       $message=new \Home\Model\MessageModel();
       $msgCode=$message->deleteInfo($msgId);
       $comment=new \Home\Model\CommentModel();
       $comment->deleteInfo($msgId);
       $this->ajaxReturn($msgCode);
    }
      
    public function sayInfo(){ //添加回复信息
        $number= $_POST['number'];
        $time= $_POST['time'];
        $text= $_POST['text'];
        $seed_Id=session('user_Id');
        $comment=new \Home\Model\CommentModel();
        $code=$comment->addInfo($seed_Id,$number,$text,$time);
        $this->ajaxReturn($number);
    }    
    public function relyMsg(){  //删除回复信息
      $time=$_POST['time'];
      $comment=new \Home\Model\CommentModel();
      $code=$comment->deleteComment($time);
      $this->ajaxReturn($code);
    }
    public function alert_Headimg(){  //修改头像
        $url=$_POST['Imgurl'];
        $id=session('user_Id');
        $person=new \Admin\Model\PersonModel();
        $code=$person->updateImg($id,$url);
        $this->ajaxReturn($code);
    }
    public function person(){  //个人主要信息
       $person=new \Admin\Model\PersonModel();
       $info=$person->selectPerson($_GET['Id']);
       $this->assign('info',$info);
       $user=new \Home\Model\UserModel();
       $userName=$user->selectInfo($_GET['Id']);
       $this->assign('userName',$userName);
       $person_Info=new \Home\Model\PersonInfoModel();
       $person_val=$person_Info->selectInfo($_GET['Id']);
       $this->assign('person_val',$person_val);
       $this->assign('userId',$_GET['Id']);
       $this->assign('reate',"&");
       $jouranl=new \Admin\Model\JournalModel();
       $journalInfo=$jouranl->selectJournalInfo($_GET['Id']);
       $countJournal=count($journalInfo);
       $photo=new \Home\Model\PhotoModel();
       $photoInfo=$photo->photoInfo($_GET['Id']);
       $countPhoto=count($photoInfo);
       $message=new \Home\Model\MessageModel();
    	 $messageInfo=$message->selectInfo($_GET['Id']);
    	 $countMessage=count($messageInfo);
    	 $this->assign('countJournal',$countJournal);
    	 $this->assign('countPhoto',$countPhoto);
    	 $this->assign('countMessage',$countMessage);
    	 $this->assign('Id',$_GET['Id']);
       $this->assign('name',session('local_name'));
    	 $this->assign("not","未填写");
          if (!empty(session('name'))) {
          $this->assign('user',session('name'));
          $this->assign('user_id',session('user_Id'));
          }else{
            $this->assign('user',0);
          }
         $this->display();
    }
    public function time(){  //时光轴中信息
    	$time=new \Home\Model\TimeModel();
       $page=$_GET['page'];
       $noteSize=4;
       $memoSize=6;
       $total=count($time->where('num=1 and number='.$_GET['Id'])->select());
       $total=ceil($total/$memoSize);
       if ($total==0) {
          $total=1;
       }
    	$noteInfo=$time->selectInfo($_GET['Id'],0,$page,$noteSize);
      $memoInfo=$time->selectInfo($_GET['Id'],1,$page, $memoSize);
      $this->assign('noteInfo',$noteInfo);
      $this->assign('memoInfo',$memoInfo);
      $this->assign('userId',$_GET['Id']);
      $this->assign('page',$page);
      $this->assign('total',$total);
       $this->assign('name',session('local_name'));
      $this->assign('reate',"&");
       if (!empty(session('name'))) {
        $this->assign('user',session('name'));
       $this->assign('user_id',session('user_Id'));
        }else{
          $this->assign('user',0);
        }
    	$this->display();
    }
    public function more(){   //应用里面的信息
    	$this->assign('userId',$_GET['Id']);
      $this->assign('name',session('local_name'));
    	$this->assign('reate',"&");
     if (!empty(session('name'))) {
        $this->assign('user',session('name'));
        $this->assign('user_id',session('user_Id'));
      }else{
        $this->assign('user',0);
      }
    	$this->display();
    }
    public function person_alter(){   //显示个人资料
    	$this->assign('url_id',$_GET['Id']);
      $this->assign('name',session('local_name'));
    	$this->assign('reate',"&");
    	$person_info=new \Home\Model\PersonInfoModel();
    	$info=$person_info->selectInfo($_GET['Id']);
    	$this->assign('userId',$_GET['Id']);
    	$this->assign('info',$info);
      foreach ($info as $key => $value) {
          $birthday=$value['birthday'];
      }
      $this->assign('month',$month);
    	if (!empty(session('name'))) {
          $this->assign('user',session('name'));
          $this->assign('user_id',session('user_Id'));
          }else{
            $this->assign('user',0);
          }
    	$this->display();
    }
    public function alterPerson(){   //修改个人资料
    	$person_info=new \Home\Model\PersonInfoModel();
    	$date=$_POST['year']."-".$_POST['day'];
    	$info=$person_info->updateInfo($_POST['id'],$_POST['sex'],$date,$_POST['newAddress'],$_POST['marriage'],$_POST['blood'],$_POST['hometown'],$_POST['company'],$_POST['companyAddress'
    		],$_POST['address'],$_POST['star'],$_POST['music'],$_POST['film'],$_POST['game'],$_POST['digit'],$_POST['food'],$_POST['tour'],$_POST['book'],$_POST['other']);
    	 $this->ajaxReturn($info);
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
               $length=$info.length;
                //返回文件地址和名给JS作回调用
                $this->ajaxReturn($info);
            }
            else{
                $this->error($upload->getError());//获取失败信息
            }
        }
    }
}