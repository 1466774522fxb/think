<?php 
//把目前tp模式由生产模式变为开发调试模式
define("APP_DEBUG",true);
header("content-type:text/html;charset=utf-8");
define("SITE_URL","localhost/thinkManage/");
define('JOURNEY_URL',SITE_URL.'personManage/public/journey/');//journey
define('Model_URL', SITE_URL.'Model/');
define('BOOTSTRAP_URL',SITE_URL.'personManage/public/bootstrap/');//bootstrap
define('UPLOADIFY_URL',SITE_URL.'personManage/public/uploadify/');//bootstrap
define("ADMIN_CSS_URL",SITE_URL."personManage/public/Admin/css/"); //Admin--css
define("ADMIN_IMG_URL",SITE_URL."personManage/public/Admin/img/"); //Admin--img
define("ADMIN_JS_URL",SITE_URL."personManage/public/Admin/js/"); //Admin--js
define("HOME_CSS_URL",SITE_URL."personManage/public/Home/css/"); //Home--css
define("HOME_IMG_URL",SITE_URL."personManage/public/Home/img/"); //Home--img
define("HOME_JS_URL",SITE_URL."personManage/public/Home/js/"); //Home--js
define("HOME_UPLOADS_URL",SITE_URL."personManage/public/uploads/"); //uploads--js
define("HOME_LOGIN_URL",SITE_URL."personManage/index.php/Home/Manage/Login"); //uploads--js
define("HOME_MAIN_URL",SITE_URL."personManage/index.php/Home/Index/"); //home url
define("HOME_ADMIN_URL",SITE_URL."personManage/index.php/Admin/Index/"); //home url
define("HOME_INDEX_URL",SITE_URL."personManage/index.php/Home/Index");// index--url

 //引入ThinkPHP核心程序
 include "../ThinkPHP/ThinkPHP.php";

 ?>