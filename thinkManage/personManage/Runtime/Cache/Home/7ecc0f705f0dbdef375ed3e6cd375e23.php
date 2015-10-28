<?php if (!defined('THINK_PATH')) exit();?>
<html>
<head>
	<title>个人网站</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8">
	<link rel="stylesheet" href="//<?php echo BOOTSTRAP_URL;?>css/bootstrap.min.css"> 
	<link rel="stylesheet" type="text/css" href="//<?php echo HOME_CSS_URL;?>style.css">
	<link rel="stylesheet" type="text/css" href="//<?php echo HOME_CSS_URL;?>index.css">
</head>
<body>
 <div id="header">
 <img src="//<?php echo HOME_IMG_URL;?>icon.png">
 </div>
  <div class=".container">
	           <div class="modal fade"id="myModal" style="margin-top: 100px;" tabindex="-1"role="dialog"aria-labelledby="myModalLabel"aria-hidden="true">
	               <div class="modal-dialog">
	                     <div class="modal-content">
	                       <div class="modal-header">
	                          <button type="button"class="close"data-dismiss="modal"aria-hidden="true"> &times; </button>
	                          <h4 class="modal-title"id="myModalLabel"> 消息对话框</h4>
	                        </div>
	                        <div class="modal-body">
	                           你确定要退出该系统吗？？？
	                        </div>
	                        <div class="modal-footer">
	                          <button type="button"class="btn btn-default"data-dismiss="modal">关闭 </button>
	                          <button id="logout" type="button"class="btn btn-primary"> 确定</button>
	                        </div>
	                     </div>
	               </div>
	            </div>
	      </div>  
   <div id="mainbody">
      <div id="bodyer">
	   <table id="main_person">
	        <caption>个人网站</caption>
	     <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($i == '4'): ?><tr><?php endif; ?>
	    	<td><img style="width:100px;height:100px;" src="//<?php echo HOME_IMG_URL; echo ($vo["head_img"]); ?>"><p><a href="Index/main?Id=<?php echo ($vo["number"]); ?>"><?php echo ($vo["name"]); ?></a></p></td><?php endforeach; endif; else: echo "" ;endif; ?>
 
	   </table>
	</div><!-- body; -->
	  
 </div><!-- mainbody -->

 <div id="footer">
   <ul>
   	  <li><a id="home" href="//<?php echo HOME_INDEX_URL;?>">网站首页</a></li>
   	  <li>网站活动</li>
   	  <li>免责声明</li>
   	  <li>意见反馈</li>
   	   <li>移动版</li>
   	   <li>移动应用</li>
   </ul>
   <p>©2015果壳网 京ICP备09043258号-2 京公网安备1101052730</p>

 </div>

 <script type="text/javascript" src="//<?php echo JOURNEY_URL;?>jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="//<?php echo BOOTSTRAP_URL;?>js/bootstrap.js"></script>
<script type="text/javascript" src=" \\<?php echo HOME_JS_URL;?>mian.js"></script>
 </script>
</body>

</html>