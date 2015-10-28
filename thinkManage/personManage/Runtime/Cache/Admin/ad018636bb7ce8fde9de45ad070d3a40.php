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
		  	  
<p>当前位置：后台管理/日志</p>
<div id="journalInfo">
 <div class="form-group">
  <button id="addJournal" type="button" class="btn btn-info">添加日志</button>
	<table class="table table-bordered" style="table-layout:fixed;">
	<caption>日志信息</caption>
	<tbody>	
	<tr><th class="table_title">title</th><th class="table_text">text</th><th class="table_time">time</th></th><th class="table_time">operate</th></tr>
	<?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr><td class="table_title"><?php echo ($vo["title"]); ?></td><td class="table_text"><?php echo ($vo["text"]); ?></td><td class="table_time"><?php echo ($vo["time"]); ?></td><td class="table_time"><span class="removeJournal glyphicon glyphicon-remove"></span><span class="updateJournal glyphicon glyphicon-refresh"></span></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
   
	</tbody>
	</table>
 </div>
</div>
<div class="notefoot"><?php echo ($pagelist); ?></div>
 <div class="modal fade" id="deleteModal" style="margin-top: 100px;" tabindex="-1"role="dialog"aria-labelledby="myModalLabel"aria-hidden="true">
   <div class="modal-dialog">
         <div class="modal-content">
           <div class="modal-header">
              <button type="button"class="close"data-dismiss="modal"aria-hidden="true"> &times; </button>
              <h4 class="modal-title"id="myModalLabel">删除提示框</h4>
            </div>
            <div class="modal-body">
              你真的确定要删除该记录吗！！！
            </div>
            <div class="modal-footer" style="clear: both;">
              <button type="button"class="btn btn-default"data-dismiss="modal">关闭 </button>
              <button id="delete_button" type="button"class="btn btn-primary"> 确定</button>
            </div>
         </div>
   </div>
</div>

 <div class="modal fade" id="addJournal_info" style="margin-top: 100px;" tabindex="-1"role="dialog"aria-labelledby="myModalLabel"aria-hidden="true">
                 <div class="modal-dialog">
                       <div class="modal-content">
                         <div class="modal-header">
                            <button type="button"class="close"data-dismiss="modal"aria-hidden="true"> &times; </button>
                            <h4 class="modal-title" id="journalLabel">
                            日志
                            </h4>
                          </div>
                          <div class="modal-body">
                          <form id="jounal_info">
                            
                          <table>
                             <tr><td>标题 :</td><td><input id="journal_title" type="text" class="form-control" name="journalTitle"></input></td></tr>
                             <tr ><td >内容 :</td><td><textarea id="journal_txt" name="journal_text" class="form-control" ></textarea></td></tr>
                           </table>
                        </form>    
                        
                          </div>
                          <div class="modal-footer" style="clear: both;">
                            <button type="button"class="btn btn-default"data-dismiss="modal">关闭 </button>
                            <button id="journal_button" type="button"class="btn btn-primary"> 提交</button>
                          </div>
                       </div>
                 </div>
           </div>

<script type="text/javascript" src="//<?php echo JOURNEY_URL;?>jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="//<?php echo ADMIN_JS_URL;?>journal.js"></script>

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