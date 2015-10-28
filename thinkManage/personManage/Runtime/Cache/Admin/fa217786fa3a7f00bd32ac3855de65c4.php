<?php if (!defined('THINK_PATH')) exit();?><html lang="en">
<head>
<title>后台管理</title>
	<meta http-equiv=content-type content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="//<?php echo ADMIN_CSS_URL;?>admin.css">
	<link rel="stylesheet" type="text/css" href="//<?php echo BOOTSTRAP_URL;?>css/bootstrap.css">
	
  <link rel="stylesheet" type="text/css" href="//<?php echo UPLOADIFY_URL;?>uploadify.css">

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
		  	  
<p>当前位置：后台管理/图书信息</p>
   <div id="bookInfo">
   <div class="form-group">
      <button id="addBook" type="button" class="btn btn-info">添加图书</button>
    	<table class="table table-bordered" style="table-layout:fixed;">
    	<caption>图书信息</caption>
    	<tbody>	
    	<tr><th class="table_title">Book_Name</th><th class="table_text">Image</th><th class="table_time">text</th></th><th class="table_time">author</th></th><th class="table_time">operate</th></tr>
    	<?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr><td class="table_title"><?php echo ($vo["book_title"]); ?></td><td class="table_text"><img src="//<?php echo HOME_UPLOADS_URL; echo ($vo["image"]); ?>"></td><td class="table_text"><?php echo ($vo["text"]); ?></td><td class="table_text"><?php echo ($vo["author"]); ?></td><td class="table_time"><span id="<?php echo ($vo["id"]); ?>" class="removeJournal glyphicon glyphicon-remove"></span><span id="<?php echo ($vo["id"]); ?>" class="updateJournal glyphicon glyphicon-refresh"></span></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
    	</tbody>
    	</table>
   <div class="modal fade"id="myModalBook" style="margin-top: 100px;" tabindex="-1"role="dialog"aria-labelledby="myModalLabel"aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
            <button type="button"class="close"data-dismiss="modal"aria-hidden="true"> &times; </button>
            <h4 class="modal-title"id="myModalLabel">
            添加图书信息
            </h4>
          </div>
          <div class="modal-body">
          <form id="book_form">
           <div class="add_title">
              <ul>
                <li>图书名称:</li>
                <li>作者:</li>
                <li style="height: 210px;">图书介绍:</li>
                <li>图书图片:</li>
              </ul>
           </div>
           <div class="add_text">
              <ul>
                <li><input id="bookName" class="form-control" type="text" name="bookName"></input></li>
                 
                <li><input id="bookAutor" class="form-control" type="text" name="bookAutor"></input ></li>
                 <li style="height: 210px;"><textarea id="bookText" name="bookText" ></textarea></li>
                 <li><input id="file_upload" name="file_upload" type="file" multiple="true" value="" /></li>
              </ul>
           </div>
           </div>
           <input id="image_path" name="image_path" type="hidden"></input>
          </form>
          <div class="modal-footer" style="clear: both;">
            <button type="button"class="btn btn-default"data-dismiss="modal">关闭 </button>
            <button id="book_button" type="button"class="btn btn-primary"> 确定</button>
          </div>
       </div>
     </div>
  </div>
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
 
</div>
</div>
 <div class="notefoot"><?php echo ($pagelist); ?></div>

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

  <script type="text/javascript" src="//<?php echo UPLOADIFY_URL;?>jquery.uploadify.js"></script>
  <script type="text/javascript" src="//<?php echo ADMIN_JS_URL;?>book.js"></script>
  <script type="text/javascript">
    var img = '';
    $('#file_upload').uploadify({
            'swf'      : '/thinkManage/personManage/Public/uploadify/uploadify.swf',
            'uploader' : 'uploadify',   //上传的方法
            'buttonText' : '缩略图上传',
            'onUploadSuccess' : function(file, data, response) { 
              var leg=data.length;
             data=data.substring(1,leg-1);
             $('#image_path').val(data);
          }
   });
  </script>

</html>