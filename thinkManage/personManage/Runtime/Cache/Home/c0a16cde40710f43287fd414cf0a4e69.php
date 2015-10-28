<?php if (!defined('THINK_PATH')) exit();?>
<html>
<head>
	<title>个人网站</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8">
	<link rel="stylesheet" href="//<?php echo BOOTSTRAP_URL;?>css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="//<?php echo HOME_CSS_URL;?>style.css">
	
    
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
	   
	   
     <link rel="stylesheet" type="text/css" href="//<?php echo UPLOADIFY_URL;?>uploadify.css">
     <link rel="stylesheet" type="text/css" href="//<?php echo HOME_CSS_URL;?>person.css">
    <div id="title" class="collapse navbar-collapse navbar-responsive-collapse">
	  	<ul class="nav navbar-nav">
	  		<li><a  href="main?Id=<?php echo ($userId); ?>">主页</a></li>
	  		<li><a href="journal?Id=<?php echo ($userId); echo ($reate); ?>page=1">日志</a></li>
	  		<li><a href="photo?Id=<?php echo ($userId); echo ($reate); ?>page=1">相册</a></li>
	  		<li><a href="message?Id=<?php echo ($userId); ?>">留言板</a></li>
	  		<li   class="active"><a href="person.php?Id=<?php echo ($userId); ?>">个人档</a></li>
	  		<li><a href="time?Id=<?php echo ($userId); echo ($reate); ?>page=1">时光轴</a></li>
	  		<li><a href="more?Id=<?php echo ($userId); ?>">更多</a></li>
	  	</ul>
     </div>
	    <div class=".container">
       <div class="modal fade"id="myHeadModal" style="margin-top: 100px;" tabindex="-1"role="dialog"aria-labelledby="myModalLabel"aria-hidden="true">
           <div class="modal-dialog">
                 <div class="modal-content">
                   <div class="modal-header">
                      <button type="button"class="close"data-dismiss="modal"aria-hidden="true"> &times; </button>
                      <h4 class="modal-title"id="myModalLabel"> 修改头像对话框</h4>
                    </div>
                    <div class="modal-body">
                       <img class="head_img" src="//<?php echo HOME_UPLOADS_URL;?>head2.png">
                       <img class="head_img"   src="//<?php echo HOME_UPLOADS_URL;?>head4.png">
                       <img class="head_img" src="//<?php echo HOME_UPLOADS_URL;?>head5.png">
                       <div style="float: right;">
                     	  <input style="float: left;display:inline-block;" id="file_upload" Idvalue="<?php echo ($userId); ?>" name="file_upload" type="file" multiple="true" value="" />
                     	</div>
                    </div>
                    <div class="modal-footer">
                      <button type="button"class="btn btn-default"data-dismiss="modal">关闭 </button>
                      <button id="alertButton" type="button"class="btn btn-primary"> 确定</button>
                    </div>
                 </div>
              </div>
           </div>
	   </div>  
	   <div class="person">
	     <h4 class="person_title">
	     	个人档
	     </h4>
	     <div class="profile">
	     	<div class="head">
	     	
	     	  <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><img class="me_img" src="//<?php echo HOME_UPLOADS_URL; echo ($vo["head_img"]); ?>"><?php endforeach; endif; else: echo "" ;endif; ?>
	     	  <?php if(!($user == '0' ) ): if($user_id == $userId ): ?><a  style="cursor:hand" class="head_update">修改头像</a><?php endif; endif; ?>
              <div class="dails">
	     	  <ul>
	     		<li id="journalCount" style="border-left: none;"><h4><a href="journal?Id=<?php echo ($Id); ?>"><?php echo ($countJournal); ?></a></h4><h5>日志</h5></li>
	     		<li ><h4><a href="photo?Id=<?php echo ($Id); echo ($reate); ?>page=1"><?php echo ($countPhoto); ?></a></h4><h5>照片</h5></li>
	     	
	     		<li><h4><a href="message?Id=<?php echo ($Id); ?>"><?php echo ($countMessage); ?></a></h4><h5>留言</h5></li>
	     		</ul>
	     		</div>
	     		<div class="line"></div>
	     	</div>
	     	<div class="profile_dailes">
	     	  
              <?php if(is_array($userName)): $i = 0; $__LIST__ = $userName;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><h4 class="name"><?php echo ($vo["userName"]); ?></h4><?php endforeach; endif; else: echo "" ;endif; ?>
	     		<div class="profile_photo">
	     			<ul>
	     				<li style="margin-left: 0;"><img src="//<?php echo HOME_UPLOADS_URL;?>profile1.png"></li>
	     				<li><img class="person_img" src="//<?php echo HOME_UPLOADS_URL;?>profile2.png"></li>
	     				<li><img class="person_img" src="//<?php echo HOME_UPLOADS_URL;?>profile3.png"></li>
	     				<li><img class="person_img" src="//<?php echo HOME_UPLOADS_URL;?>profile4.png"></li>
	     			</ul>
	     		</div>
	     		<div class="profile_data">
	     			<ul class="nav nav-tabs">
					  <li><a href="#home" data-toggle="tab" class="dailBorder" style="border: 1px solid #CAE5EF">个人资料</a></li>
					  <li><a href="#profile" data-toggle="tab"  class="dailBorder" style="border: 1px solid #CAE5EF">个人兴趣</a></li>	
					   <?php if( !($user == '0') ): if( $user_id == $userId ): ?><li class="alter" style="float: right;"><a href="person_alter?Id=<?php echo ($userId); ?>">修改</a></li><?php endif; endif; ?>
                    	 
					</ul>
					<div class="tab-content">
					  <div class="tab-pane active" id="home">
					   <div class="left_profile">
					    <div> </div>
					   	 <p>基本资料</p>
					   	 <div class="left_line"></div>
					   	  <ul>
					   	 	<li>政治面貌:</li>
					   	 	<li>年龄:</li>
					   	 	<li>生日:</li>
					   	 	<li>现居地:</li>
					   	 	<li>婚姻状况:</li>
					   	 	<li>血型:</li>
					   	 	<li>故乡:</li>
					   	 	<li>公司名称:</li>
					   	 	<li>公司所在地:</li>
					   	 	<li>详细地址:</li>
					   	 </ul>
					   </div>
					   <?php if(is_array($person_val)): $i = 0; $__LIST__ = $person_val;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="right_profile">
						   	   <ul>
						   	  
						   	  <li>
						   	   <?php if( $vo["politics"] == '' ): echo ($not); ?>
                                <?php else: echo ($vo["politics"]); endif; ?>
						   	  </li>
						   	  <li>
						   	     <?php if( $vo["age"] == '' ): echo ($not); ?>
                                <?php else: echo ($vo["age"]); endif; ?>
						   	  </li>
						   	  <li>
						   	    <?php if( $vo["birthday"] == '' ): echo ($not); ?>
                                <?php else: echo ($vo["birthday"]); endif; ?>
						   	   </li>
						      <li> 
                                <?php if( $vo["newAddress"] == '' ): echo ($not); ?>
                                <?php else: echo ($vo["newAddress"]); endif; ?>
						      </li>
						   	  <li> 
						   	    <?php if( $vo["marriage"] == '' ): echo ($not); ?>
                                <?php else: echo ($vo["marriage"]); endif; ?>
						   	  </li>
						   	  <li> 
						   	     <?php if( $vo["blood"] == '' ): echo ($not); ?>
                                <?php else: echo ($vo["blood"]); endif; ?>
						   	  </li>
						      <li> 
						        <?php if( $vo["hometown"] == '' ): echo ($not); ?>
                                <?php else: echo ($vo["hometown"]); endif; ?>
						      </li>
						      <li> 
                                 <?php if( $vo["company"] == '' ): echo ($not); ?>
                                <?php else: echo ($vo["company"]); endif; ?>
						      </li>
						      <li> 
                                 <?php if( $vo["companyaddress"] == '' ): echo ($not); ?>
                                <?php else: echo ($vo["companyaddress"]); endif; ?>
						      </li> 
						      <li> 
						         <?php if( $vo["address"] == '' ): echo ($not); ?>
                                <?php else: echo ($vo["address"]); endif; ?>
						     </li> 			  
						   	</ul>
						  </div>
                         </div>
					     <div class="tab-pane" id="profile">
					  	 <div class="left_profile">
					   	 <p>基本资料</p>
					   	 <div class="left_line"></div>
					   	  <ul>
					   	 	<li>明星:</li>
					   	 	<li>音乐:</li>
					   	 	<li>运动:</li>
					   	 	<li>影视:</li>
					   	 	<li>游戏:</li>
					   	 	<li>数码:</li>
					   	 	<li>美食:</li>
					   	 	<li>旅游:</li>
					   	 	<li>书籍:</li>
					   	 	<li>其他:</li>
					   	 	
					   	 </ul>
					   </div>
					    <div class="right_profile">
					       <ul>
					       <li>
					         <?php if( $vo["star"] == '' ): echo ($not); ?>
                                <?php else: echo ($vo["star"]); endif; ?>
					       </li> 	
					       <li>
                             <?php if( $vo["music"] == '' ): echo ($not); ?>
                                <?php else: echo ($vo["music"]); endif; ?>
					       </li> 
					       <li>
					          <?php if( $vo["sport"] == '' ): echo ($not); ?>
                                <?php else: echo ($vo["sport"]); endif; ?>
					       </li> 
					       <li>
                              <?php if( $vo["film"] == '' ): echo ($not); ?>
                                <?php else: echo ($vo["film"]); endif; ?>
					       </li> 
					       <li>
                              <?php if( $vo["game"] == '' ): echo ($not); ?>
                                <?php else: echo ($vo["game"]); endif; ?>
					      </li> 
					       <li>
					           <?php if( $vo["digit"] == '' ): echo ($not); ?>
                                <?php else: echo ($vo["digit"]); endif; ?>
					       </li>  
					       <li>
					            <?php if( $vo["food"] == '' ): echo ($not); ?>
                                <?php else: echo ($vo["food"]); endif; ?>
					       </li> 
					       <li>
					          <?php if( $vo["tour"] == '' ): echo ($not); ?>
                                <?php else: echo ($vo["tour"]); endif; ?>
					       </li> 
					       <li>
					           <?php if( $vo["book"] == '' ): echo ($not); ?>
                                <?php else: echo ($vo["book"]); endif; ?>
					       </li> 
					       <li>
					           <?php if( $vo["other"] == '' ): echo ($not); ?>
                                <?php else: echo ($vo["other"]); endif; ?>
					       </li> 
					   	
					   	</ul>
					  </div>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
	     		</div>
	     	</div>
	     </div>
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

  <script type="text/javascript" src="//<?php echo UPLOADIFY_URL;?>jquery.uploadify.js"></script>
  <script type="text/javascript" src=" //<?php echo HOME_JS_URL;?>person.js"></script>
  <script type="text/javascript">
  	 var id=$("#file_upload").attr("Idvalue");
	  var img = '';
		$('#file_upload').uploadify({
	        	'swf'      : '/thinkManage/personManage/Public/uploadify/uploadify.swf',
	        	'uploader' : 'uploadify',   //上传的方法
	        	'buttonText' : '缩略图上传',
	        	'onUploadSuccess' : function(file, data, response) { 
	        	var leg=data.length;
	        	 data=data.substring(1,leg-1);
	        	 $.post("alert_Headimg",{"num":id,"Imgurl":data},function(data){
                        if (data==1) {
                        	alert("照片上传成功！！");
                        	window.location.reload();
                        }else{
                        	alert("照片上传失败！！");
                        }
	        	 })
        	}
    	});
  </script>

</body>
</html>