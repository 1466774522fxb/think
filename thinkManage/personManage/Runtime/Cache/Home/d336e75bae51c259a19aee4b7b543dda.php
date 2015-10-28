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
	   
	   
	    <div id="title" class="collapse navbar-collapse navbar-responsive-collapse">
		  	<ul class="nav navbar-nav">
		  		<li  class="active"><a href="main?Id=<?php echo ($userId); ?>">主页</a></li>
		  		<li><a href="journal?Id=<?php echo ($userId); echo ($reate); ?>page=1">日志</a></li>
		  		<li><a href="photo?Id=<?php echo ($userId); echo ($reate); ?>page=1">相册</a></li>
		  		<li><a href="message?Id=<?php echo ($userId); ?>">留言板</a></li>
		  		<li><a href="person?Id=<?php echo ($userId); ?>">个人档</a></li>
		  		<li><a href="time?Id=<?php echo ($userId); echo ($reate); ?>page=1">时光轴</a></li>
		  		<li><a href="more?Id=<?php echo ($userId); ?>">更多</a></li>
		  	</ul>
	   </div>
	     <div id="banner">
		    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="4000">
   			  <!-- Indicators -->
   			   <ol class="carousel-indicators">
   			     <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
   			     <li data-target="#carousel-example-generic" data-slide-to="1"></li>
   			     <li data-target="#carousel-example-generic" data-slide-to="2"></li>
   			   </ol>
   			  <!--  Wrapper for slides -->
   			  <div class="carousel-inner" role="listbox">
   			    <div class="item active">
   			      <img src="//<?php echo HOME_IMG_URL;?>zanblog3.jpg"  alt="...">

   			    </div>
   			    <div class="item">
   			      <img src="//<?php echo HOME_IMG_URL;?>011.jpg"alt="...">

   			    </div>
   			        <div class="item">
   			      <img src="//<?php echo HOME_IMG_URL;?>03.jpg"  alt="...">

   			    </div>
   			  </div>
   			   <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev" >
   			    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
   			    <span class="sr-only">Previous</span>
   			  </a>
   			  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next" >
   			    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
   			    <span class="sr-only">Next</span>
   			  </a>
			  </div>
	   </div>
      <div id="self_info">
		  <div id="text" style="margin-left: 0px;">
			  	<h1 id="title_font" class="btn btn-info" disable="diable">个人简介</h1>
			  	<div class="info">
			  		<ul>
                  <?php if(is_array($personInfo)): $i = 0; $__LIST__ = $personInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="list-group-item">姓名：<?php echo ($vo["name"]); ?></li>
                  	<li class="list-group-item">拼音：<?php echo ($vo["pinyin"]); ?></li>
                  	<li class="list-group-item">性别：<?php echo ($vo["sex"]); ?></li>
                  	<li class="list-group-item">电话:  <?php echo ($vo["telephone"]); ?></li>
                  	<li class="list-group-item">QQ:    <?php echo ($vo["qq"]); ?></li>
                  	<li class="list-group-item">Email:<?php echo ($vo["email"]); ?></li>
                  	<li class="list-group-item">地址:<?php echo ($vo["address"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>	
			  		</ul>
			  		<input id="hidval" type="hidden" value="0"></input>
			  	</div>
		  </div>
		  <div id="text">
			  	<h1 id="title_font" class="btn btn-warning" disable="diable">个人爱好</h1>
			  	<div class="info">
			  		<ul>
                <?php if(is_array($person)): $i = 0; $__LIST__ = $person;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="list-group-item">明星：<?php echo ($vo["star"]); ?></li>
				  		<li class="list-group-item">音乐：<?php echo ($vo["music"]); ?></li>
				  		<li class="list-group-item">电影：<?php echo ($vo["film"]); ?></li>
				  		<li class="list-group-item">运动：<?php echo ($vo["sport"]); ?></li>
				  		<li class="list-group-item">游戏：<?php echo ($vo["game"]); ?></li>
				  		<li class="list-group-item">旅游：<?php echo ($vo["tour"]); ?></li>
				  		<li class="list-group-item">书籍：<?php echo ($vo["book"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
			  		</ul>
			  		<input id="hidval" type="hidden" value="0"></input>
			  	</div>
		  </div>
    </div>
     <div id="book">
     	  	 <h1 class="btn btn-danger">推荐书籍</h1>
     	  	  <div class="content" >
     	  	    <ul>
     	  	    <?php if(is_array($bookInfo)): $i = 0; $__LIST__ = $bookInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($i-1)%3==0): ?><li class="first" style="margin-left: -10px;">
   	  	  	    <?php else: ?>
   	  	  	     <li class="first"><?php endif; ?>
   	  	  	 	<div class="up"></div>
   	  	  	 	<div class="down"></div>
   	  	  	 	<div class="con"><?php echo ($vo["text"]); ?>
   	  	  	 	</div>
   	  	  	 	 <img src='//<?php echo HOME_UPLOADS_URL; echo ($vo["image"]); ?>' >
   	  	  	 	 <span><?php echo ($vo["book_title"]); ?></span>
   	  	  	 	<p>介绍：<?php echo ($vo["text"]); ?></p>
   	  	  	 	<p>作者：<?php echo ($vo["author"]); ?></P>
   	  	  	 	</li><?php endforeach; endif; else: echo "" ;endif; ?>
     	    	 <ul>
     	  	  </div>
     	   <div style="clear: both;"></div>
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

   <script type="text/javascript" src=" \\<?php echo HOME_JS_URL;?>mian.js"></script>

</body>
</html>