$('#login').click(function(){
         
        var data1=$('#login_from').serialize();
        console.log(data1);
        var num=$(this).attr('num');
         $.post("LoginInfo", data1, function(data){
          if (data.code==1) {
            console.log("dddddd");
             window.location.href=document.referrer;
          /*  location.href="/thinkManage/personManage/index.php/Home/Index/main?Id="+data.user_id;  */
          }else{
            alert('用户名或密码错误！！！');
          }
         	
       });
  	});
$('#return').click(function(){
  window.location.href=document.referrer;
});