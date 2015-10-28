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
		  	  
<p>当前位置：后台管理/个人中心</p>
<table id="person_info" class="table table-hover">
  <caption>个人信息</caption>
  <tr><td>姓名</td><td><?php echo ($username); ?></td></tr>
  <tr><td>拼音</td><td><?php echo ($pinyin); ?></td></tr>
  <tr><td>性别</td><td><?php echo ($sex); ?></td></tr>
  <tr><td>年龄</td><td><?php echo ($age); ?></td></tr>
  <tr><td>电话</td><td><?php echo ($phone); ?></td></tr>
  <tr><td>QQ</td><td><?php echo ($qq); ?></td></tr>
  <tr><td>Email</td><td><?php echo ($Email); ?></td></tr>
  <tr><td>Address</td><td><?php echo ($address); ?></td></tr>
</table>
<div id="person_update">
	<input id="person_button" class="btn btn-success" type="button" value="更新"></input>
</div>
 <div class=".container">
           <meta charset="utf-8">
	           <div class="modal fade" id="update_person" style="margin-top: 100px;" tabindex="-1"role="dialog"aria-labelledby="myModalLabel"aria-hidden="true">
	               <div class="modal-dialog">
	                     <div class="modal-content">
	                       <div class="modal-header">
	                          <button type="button"class="close"data-dismiss="modal"aria-hidden="true"> &times; </button>
	                          <h4 class="modal-title"id="myModalLabel">更新个人信息框</h4>
	                        </div>
	                        <div class="modal-body">
	                        <div id="personAdmin">
                            <form method="post"  enctype="multipart/form-data"  id="person_form">
                               <div class="input-group" >
							  <span class="input-group-addon" id="basic-addon1">姓名</span>
							  <input name="username" type="text" size="13" class="form-control" placeholder="Username" aria-describedby="basic-addon1" value="<?php echo ($username); ?>">
							</div>
                           <div class="input-group">
							  <span class="input-group-addon" id="basic-addon1">拼音</span>
							  <input name="pinyin"  type="text" class="form-control" placeholder="" aria-describedby="basic-addon1" value="<?php echo ($pinyin); ?>">
							</div>
							 <div class="input-group">
							  <span class="input-group-addon" id="basic-addon1">性别</span>
							  <select name="sex" class="form-control"  >
							  <option>男</option> 
							    <option>女</option>   
							    <option>请选择</option>  
							  
							  </select>

							</div>
							<div  class="input-group">
							  <span class="input-group-addon" id="basic-addon1">年龄</span>
							  <input name="age" id="age"  type="number" size="8" class="form-control"  placeholder="年龄" aria-describedby="basic-addon1" value="<?php echo ($age); ?>">
							</div>
							<div  class="input-group">
							  <span class="input-group-addon" id="basic-addon1">电话</span>
							  <input name="phone" id="inphone"  type="phone" size="8" class="form-control"  placeholder="电话号码" aria-describedby="basic-addon1" value="<?php echo ($phone); ?>">
							</div>
							<div class="input-group">
							  <span class="input-group-addon" id="basic-addon1"> Q Q </span>
							  <input name="QQ" type="number" class="form-control" placeholder="QQ" aria-describedby="basic-addon1" value="<?php echo ($qq); ?>">
							</div>
							<div  class="input-group">
							  <span class="input-group-addon" id="basic-addon1">Email</span>
							  <input name="email" type="email" class="form-control" placeholder="email @xxx.com" aria-describedby="basic-addon1" value="<?php echo ($Email); ?>">
							</div>
							<div class="input-group">
							  <span class="input-group-addon" id="basic-addon1">Address</span>
							  <input name="address" type="text" class="form-control" placeholder="address" aria-describedby="basic-addon1" value="<?php echo ($address); ?>">
							</div>   
	                     </form>
	                     </div>
	                        </div>
	                        <div class="modal-footer" style="clear: both;">
	                          <button type="button"class="btn btn-default"data-dismiss="modal">关闭 </button>
	                         <button id="update_button" type="button"class="btn btn-primary"> 提交</button>
	                        </div>
	                     </div>
	               </div>
	            </div>
	     </div>

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

	<script type="text/javascript" src="//<?php echo ADMIN_JS_URL;?>person.js"></script>

</html>