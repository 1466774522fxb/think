<?php if (!defined('THINK_PATH')) exit();?>
<html>
<head>
	<title>个人网站</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8">
	<link rel="stylesheet" href="//<?php echo BOOTSTRAP_URL;?>css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="//<?php echo HOME_CSS_URL;?>style.css">
	
   <link rel="stylesheet" type="text/css" href="//<?php echo HOME_CSS_URL;?>message.css">
 
    
</head>
<body>
 <div id="header">
 <img src="//<?php echo HOME_IMG_URL;?>icon.png">
     <div id="largeTitle"><?php echo ($name); ?>网站</div>
  <div id="per_login">
	  <ul id="log_div">
	  <?php if( $user == '0' ): ?><li><a id="loginButton" href="//<?php echo HOME_LOGIN_URL;?>" class="btn btn-info" >登录</a></li>
		   <li id="register"><input id="registerButton" type="button" class="btn btn-info" disable="diable" value="注册"></input></li>
	 <?php else: ?>
		   <li><div class="dropdown">
		  <a class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
		    <?php echo ($user); ?>
		    <b class="caret"></b>
		  </a>
		  <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
			   <li role="presentation"><a role="menuitem" tabindex="-1" href="//<?php echo HOME_MAIN_URL;?>main?Id=<?php echo ($user_id); ?>">我的主页</a></li>
			   <li role="presentation"><a role="menuitem" tabindex="-1" href="//<?php echo HOME_ADMIN_URL;?>person">个人设置</a></li>
			   <li id="logout" role="presentation"><a role="menuitem" tabindex="-1" >注销</a></li>
		  </ul>
	     </div></li>
	     <li id="register"><input id="registerButton" type="button" class="btn btn-info" disable="diable" value="注册"></input></li><?php endif; ?>
      </ul>
  </div>
 
</div>
  <div class=".container">
               <div class="modal fade" id="registerModel" style="margin-top: 100px;" tabindex="-1"role="dialog"aria-labelledby="myModalLabel"aria-hidden="true">
	               <div class="modal-dialog">
	                     <div class="modal-content">
	                       <div class="modal-header">
	                          <button type="button"class="close"data-dismiss="modal"aria-hidden="true"> &times; </button>
	                          <h4 class="modal-title"id="myModalLabel">注册窗口</h4>
	                        </div>
	                       
	                        <div class="modal-body">
	                         <form id="register_form">
	                          <table id="register_table">
	                          	<tr><td>用户名:</td><td><input id="userName" class="form-control" type="text" name="userName"></input></td></tr>
	                          	<tr><td>密码:</td><td><input id="pwd1" class="form-control" type="password" maxlength="8" name="pwd1"></input></td></tr>
	                          	<tr><td>确认密码:</td><td><input id="pwd2" class="form-control" type="password" maxlength="8" name="pwd2"></input></td></tr>
	                          	<tr><td>验证码:</td><td><img src="<?php echo U('index/verifyimg');?>" id="captcha_img" style="border: 1px solid #000" > <a  href="javascript:void(0)" onclick="document.getElementById('captcha_img').src='<?php echo U('index/verifyimg');?>'">换一个？</a><input id="identifyCode" class="form-control" type="text" maxlength="5" name="id_Code" ></input></td></tr>
	                          </table>
	                        </form>
	                        </div>
	                       
	                        <div class="modal-footer">
	                          <button type="button"class="btn btn-default"data-dismiss="modal">关闭 </button>
	                          <button id="submit" type="button" class="btn btn-primary"> 提交</button>
	                        </div>
	                     </div>

	               </div>
	            </div>
	      </div>  

   <div class="modal fade"id="myModal" style="margin-top: 100px; " tabindex="-1"role="dialog"aria-labelledby="myModalLabel"aria-hidden="true">
       <div class="modal-dialog">
             <div class="modal-content">
               <div class="modal-header">
                  <button type="button"class="close"data-dismiss="modal"aria-hidden="true"> &times; </button>
                  <h4 class="modal-title"id="myModalLabel"> 消息对话框</h4>
                </div>
                <div class="modal-body">
                   你确定要退出吗？？？
                </div>
                <div class="modal-footer">
                  <button type="button"class="btn btn-default"data-dismiss="modal">关闭 </button>
                  <button id="logoutButton" type="button"class="btn btn-primary"> 确定</button>
                </div>
             </div>
       </div>
    </div>
</div>  
 <div id="mainbody">
     <div id="bodyer">
	   
	   
  <div id="title" class="collapse navbar-collapse navbar-responsive-collapse">
    <ul class="nav navbar-nav">
      <li ><a  href="main?Id=<?php echo ($userId); ?>">主页</a></li>
      <li><a href="journal?Id=<?php echo ($userId); echo ($reate); ?>page=1">日志</a></li>
      <li><a href="photo?Id=<?php echo ($userId); echo ($reate); ?>page=1">相册</a></li>
      <li  class="active"><a href="message?Id=<?php echo ($userId); ?>">留言板</a></li>
      <li><a href="person?Id=<?php echo ($userId); ?>">个人档</a></li>
      <li><a href="time?Id=<?php echo ($userId); echo ($reate); ?>page=1">时光轴</a></li>
      <li><a href="more?Id=<?php echo ($userId); ?>">更多</a></li>
    </ul>
 </div>
 <div class=".container">    
   <div class="modal fade" id="myMessageModal" style="margin-top: 100px;" tabindex="-1"role="dialog"aria-labelledby="myModalLabel"aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header" >
            <button type="button"class="close"data-dismiss="modal"aria-hidden="true"> &times; </button>
            <h4 class="modal-title"id="myModalLabel"> 留言窗口</h4>
          </div>
          <div class="modal-body">
           <textarea id="say"  placeholder="请留下你想说的话。。。。。"></textarea>';
         </div>
          <div class="modal-footer">
            <button type="button"class="btn btn-default"data-dismiss="modal">关闭 </button>
            <button id="leave_ok" num="<?php echo ($userId); ?>" name="<?php echo ($user); ?>" type="button" class="btn btn-primary"> 确定</button>   
          </div>
       </div>
     </div>
    </div>
  </div>  
   <div class="message">
      <span class="leave">留言板</span>
      <div class="message_line"></div>
      <div class="message_title">
          <span class="leave_word">留言<?php echo ($count); ?></span>
          <?php if( !($user == '0') ): if( !($user_id == $userId) ): ?><span class="leave_set"><a>给好友留言</a></span><?php endif; endif; ?>  
      </div>
     <?php if(is_array($messageInfo)): $i = 0; $__LIST__ = $messageInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="msg">
          <div class="left_head"><img src='//<?php echo HOME_UPLOADS_URL; echo ($vo["head_img"]); ?>'></div>
          <div class="right_text">
            <p><a href="//<?php echo HOME_MAIN_URL;?>main?Id=<?php echo ($vo["seed_id"]); ?>"><?php echo ($vo["msg_name"]); ?></a> <span ><?php echo ($vo["remark"]); ?></span></p>
            <p class="p_text"><?php echo ($vo["msg_text"]); ?></p>
            <p class="p_foot"><span><?php echo ($vo["msg_time"]); ?></span>
             <?php if( !($user == '0') ): if($user_id == $userId ): ?><a class="delete1" msgId=<?php echo ($vo["id"]); ?>>删除</a>
                    <?php if(!($vo["seed_id"] == $user_id)): ?><a class="answer" text="<?php echo ($user_id); ?>">回复</a><?php endif; ?>
                 <?php else: ?>
                    <?php if(!($vo["seed_id"] == $user_id)): ?><a class="answer" text="<?php echo ($user_id); ?>">回复</a><?php endif; endif; ?>
              <?php else: ?><a class="answer" text="<?php echo ($user_id); ?>">回复</a><?php endif; ?>
           </p>
           <?php $comment="comment".$i ?>
           <?php if(is_array($$comment)): foreach($$comment as $key=>$va): ?><div  class=huifu><img src='//<?php echo HOME_UPLOADS_URL; echo ($va["head_img"]); ?>' ><div class=rely_text><p class="relySay"><span><a><?php echo ($va["username"]); ?></a>   </span><span><?php echo ($va["rely_text"]); ?></span></p>
                  <p class="relyTime"><span><?php echo ($va["rely_time"]); ?></span> 
                   <?php if( !($user == '0') ): if($userId == $user_id): ?><a class="relyDelete">删除</a><?php endif; endif; ?>
                 </p>
               </div>
             </div><?php endforeach; endif; ?>
              <?php if( !($user == '0') ): if(!($vo["seed_id"] == $user_id)): ?><div class="rely">
                   <textarea class="me" text="<?php echo ($user_id); ?>" placeholder ="我也说一句"></textarea> 
                   <div class="btn_group">
                         <span><button class ="ok" num='<?php echo ($vo["id"]); ?>' >确定</button><button  class="rely_btn">取消</button></span> 
                        </div>
                      </div><?php endif; endif; ?>
           </div>
          <div class="clear_float"></div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div> 

	</div><!-- body; -->
	  
 </div><!-- mainbody -->
 <div id="footer">
   <ul>
   	  <li><a id="homePage" href="//<?php echo HOME_INDEX_URL;?>">网站首页</a></li>
   	  <li>网站活动</li>
   	  <li>免责声明</li>
   	  <li>意见反馈</li>
   	  <li>移动版</li>
   	  <li>移动应用</li>
   </ul>
   <p>©2015个人网 京ICP备09043258号-2 京公网安备1101052730 访问量：1000</p>
 </div>

<script type="text/javascript" src="//<?php echo JOURNEY_URL;?>jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="//<?php echo BOOTSTRAP_URL;?>js/bootstrap.js"></script>
<script type="text/javascript" src=" //<?php echo HOME_JS_URL;?>base.js"></script>

  <script type="text/javascript" src="//<?php echo HOME_JS_URL;?>message.js"></script>

</body>
</html>