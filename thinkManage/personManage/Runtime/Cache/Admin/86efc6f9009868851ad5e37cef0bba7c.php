<?php if (!defined('THINK_PATH')) exit();?><html lang="en">
<head>
<title>后台管理</title>
	<meta http-equiv=content-type content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="//<?php echo ADMIN_CSS_URL;?>admin.css">
	<link rel="stylesheet" type="text/css" href="//<?php echo BOOTSTRAP_URL;?>css/bootstrap.css">
	
</head>
<body>
	  <div class="header">
	  	<h1 id="back_title">后台管理</h1>
	  </div>
	  <div id="bodyer">
		  	<div id="left">
			  	<ul class="list-group">
				  <li class="list-group-item"><a href="person">个人中心</a></li>
				  <li class="list-group-item"><a href="journal">日志管理</a></li>
				  <li class="list-group-item"><a href="book">图书管理</a></li>
				  <li class="list-group-item"><a href="note">笔记/便签管理</a></li>
				  <?php if($userNum == 1): ?><li class="list-group-item"><a href="manage">高级管理</a></li><?php endif; ?>
			      <li class="list-group-item"><a href="revisePwd">修改密码</a></li>
			      <li id="quit" class="list-group-item">退出</li>
				</ul>
		  </div>
		  <div id="center">
		  	  
	      </div>
          <div class="modal fade" id="quitModal" style="margin-top: 100px;" tabindex="-1"role="dialog"aria-labelledby="myModalLabel"aria-hidden="true">
             <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header">
                        <button type="button"class="close"data-dismiss="modal"aria-hidden="true"> &times; </button>
                        <h4 class="modal-title"id="myModalLabel">系统提示框</h4>
                      </div>
                      <div class="modal-body">
                        你真的确定要退出！！！
                      </div>
                      <div class="modal-footer" style="clear: both;">
                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭 </button>
                        <button id="aa_button" userId='<?php echo ($useId); ?>' type="button" class="btn btn-primary"> 确定</button>
                      </div>
                   </div>
             </div>
          </div>
	  </div>
</body> 
<script type="text/javascript" src="//<?php echo JOURNEY_URL;?>jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="//<?php echo BOOTSTRAP_URL;?>js/bootstrap.js"></script>
<script type="text/javascript" src="//<?php echo ADMIN_JS_URL;?>quit.js"></script>
	

</html>