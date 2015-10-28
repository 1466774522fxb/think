<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <link rel="stylesheet" href="//<?php echo BOOTSTRAP_URL;?>css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="//<?php echo HOME_CSS_URL;?>log.css">
	<title>登录页面</title>
</head>
<body style="background-image: url('//<?php echo HOME_IMG_URL;?>login.png');">
  
  <div class="log"  >
  <form id="login_from" >
  <table id="login_tab" style="width: 400px;margin: 0 auto;text-align: center;">
    <caption style="text-align: center; font-size: 40;">登录窗口</caption>
    <tr><td  colspan="2" id="close" ><span  id="return" style="cursor:pointer" style="padding-left: 20px;" class="glyphicon glyphicon-remove"></span></td></tr>
   <tr id="loginBox"><td>用户名:</td><td style="text-align: center;"><input  class="form-control" type="text" name="username"></input></td>
   <tr><td>密   码:</td><td><input  class="form-control" type="password" name="password"></input></td>
      <tr id="logButton"><td colspan="2"><input class="btn btn-default"  type="reset" step="2"></input><input id="login"  type="button" class="btn btn-primary" value="登录"></input></td>'

  </table>
  </form>
  
         
  </div>
   <script src="//<?php echo JOURNEY_URL;?>jquery-1.11.3.min.js" type="text/javascript"></script>
   <script type="text/javascript" src="//<?php echo BOOTSTRAP_URL;?>js/bootstrap.min.js"></script>
  <script type="text/javascript" src="//<?php echo HOME_JS_URL;?>log.js">
  </script>
</body>
</html>