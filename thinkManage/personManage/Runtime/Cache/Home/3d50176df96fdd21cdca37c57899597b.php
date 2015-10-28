<?php if (!defined('THINK_PATH')) exit();?>
<html>
<head>
	<title>个人网站</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8">
	<link rel="stylesheet" href="//<?php echo BOOTSTRAP_URL;?>css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="//<?php echo HOME_CSS_URL;?>style.css">
	
	<link rel="stylesheet" type="text/css" href="//<?php echo HOME_CSS_URL;?>person_alter.css">

    
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
		  		<li ><a  href="main?Id=<?php echo ($url_id); ?>">主页</a></li>
		  		<li ><a href="journal?Id=<?php echo ($url_id); echo ($reate); ?>page=1">日志</a></li>
		  		<li ><a href="photo?Id=<?php echo ($url_id); echo ($reate); ?>page=1">相册</a></li>
		  		<li ><a href="message?Id=<?php echo ($url_id); ?>">留言板</a></li>
		  		<li class="active"><a href="person?Id=<?php echo ($url_id); ?>">个人档</a></li>
		  		<li><a href="time?Id=<?php echo ($url_id); echo ($reate); ?>page=1">时光轴</a></li>
		  		<li><a href="more?Id=<?php echo ($url_id); ?>">更多</a></li>
		  	</ul>
	   </div>
	   <div id="alterInfo">
		      
		        <table  class="alter_table" width="100%">

		        	<caption style="text-align: center;">修改信息</caption>   
		        	<?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><form id="alter_form">
		        	<tr><td>政治面貌：</td><td>
		        	 <?php if($vo["politics"] == '党员'): ?><select name="sex"><option >团员</option><option selected="selected">党员</option><option>群众</option></select>
		        	 <?php elseif($vo["politics"] == '群众'): ?> <select name="sex"><option >团员</option><option selected="selected">党员</option><option>群众</option></select>
		        	  <?php else: ?><select name="sex"><option >团员</option><option >党员</option><option>群众</option></select><?php endif; ?>
		        	 </td>
		        	
		        	<td>明星：</td><td><input type="text" name="star" value=<?php echo ($vo["star"]); ?>></input></td></tr>
		        	<tr><td>生日：</td><td> 
						<select id="birthday" date="<?php echo ($vo["birthday"]); ?>" name="year" class="sel_month" rel="1"> </select> 月 
						<select id="day" name="day" class="sel_day" rel="1"> </select> 日 
                       </td><td>音乐：</td><td><input type="text" name="music" value=<?php echo ($vo["music"]); ?>></input></td></tr>
		        	<tr><td>现居地:</td><td><input type="text" name="newAddress" value=<?php echo ($vo["newaddress"]); ?>></input></td><td>影视：</td><td><input type="text" name="film" value=<?php echo ($vo["film"]); ?>></input></td></tr>
                    <tr><td>婚姻状况: </td><td><select name="marriage">
                    <?php if($vo["marriage"] == '已婚'): ?><option>否</option><option selected="selected">已婚</option>
                     <?php else: ?>
                          <option>否</option><option>已婚</option><?php endif; ?>
                    </select></td><td>游戏：</td><td><input type="text" name="game" value=<?php echo ($vo["game"]); ?>></input></td></tr>
		        	<tr><td>血型: </td><td><select name="blood">
		        	<?php if($vo["blood"] == 'B' ): ?><option>A</option><option selected="selected">B</option><option>O</option><option>其它</option>
		        		<?php elseif($vo["blood"] == 'O' ): ?><option>A</option><option >B</option><option selected="selected">O</option><option>其它</option>
		        		<?php elseif($vo["blood"] == '其它' ): ?><option>A</option><option >B</option><option>O</option><option selected="selected">其它</option>
		        		<?php else: ?><option>A</option><option>B</option><option>O</option><option>其它</option><?php endif; ?>
		        	
		        	</select>
		        	</td><td>数码：</td><td><input type="text" name="digit" value=<?php echo ($vi["digit"]); ?>></input></td></tr>
		        	<tr><td>故乡: </td><td><input type="text" name="hometown" value=<?php echo ($vo["hometown"]); ?>></input></td><td>美食：</td><td><input type="text" name="food" value=<?php echo ($vo["food"]); ?>></input></td></tr>
		        	<tr><td>公司名称: </td><td><input type="text" name="company" value=<?php echo ($vo["company"]); ?>></input></td><td>旅游：</td><td><input type="text" name="tour" value=<?php echo ($vo["tour"]); ?>></input></td></tr>
		        	<tr><td>公司所在地: </td><td><input type="text" name="companyAddress" value=<?php echo ($vo["companyaddress"]); ?>></input></td><td>书籍：</td><td><input type="text" name="book" value=<?php echo ($vo["book"]); ?>></input></td></tr>
		        	<tr><td>详细地址: </td><td><input type="text" name="address" value=<?php echo ($vo["address"]); ?>></input></td><td>其他：</td><td><input type="text" name="other" value=<?php echo ($vo["other"]); ?>></input></td></tr> </form>
		        	<tr ><td><input type="reset"></input></td><td><button id="ater1Button" useId="<?php echo ($userId); ?>" >提交</button></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
		        </table>  
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

	<script type="text/javascript" src="//<?php echo HOME_JS_URL;?>person_alter.js"></script>
   <script type="text/javascript" src="//<?php echo HOME_JS_URL;?>birthday.js"></script>
   <script >  
	 var date=$("#birthday").attr('date');
	  month=date.substring(0,date.lastIndexOf('-'));
	  day=date.substring(date.lastIndexOf('-')+1,date.length);
	  $("#birthday").attr('rel',month);
	  $("#day").attr('rel',day);
	 $(function () {
	 		$.ms_DatePicker({
	 	            YearSelector: ".sel_year",
	 	            MonthSelector: ".sel_month",
	 	            DaySelector: ".sel_day"
	 	    });
	 		$.ms_DatePicker();
	 }); 
</script> 

</body>
</html>