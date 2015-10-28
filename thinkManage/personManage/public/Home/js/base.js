 $('.dropdown-toggle').dropdown();
$('#registerButton').click(function () {
	$('#userName').val("");
	$('#pwd1').val("");
	$('#pwd2').val("");
	$('#captcha_img').attr('src',"verifyimg");
	$('#identifyCode').val("");
	$('#registerModel').modal('show');
});
$(function() {
	$("img").on('click',function () {
		var imgUrl=$(this).attr('src');
		var target = $(this).attr('target');
		$('.mainphoto').attr('src',imgUrl);
		$(target).modal('show');
	})
})
$('#submit').click(function(){
	if ($('#userName').val().trim()=="") {
		alert("用户名不能为空");
		return;
	}else if($('#pwd1').val().trim()==""||$('#pwd2').val().trim()==""){
		alert("密码不能为空");
		return;
	}else if($('#pwd1').val().trim()!=$('#pwd2').val().trim()){
		alert("两次密码不相等！！");
		return;
	}else if ($('#identifyCode').val().trim()=="") {
		alert("验证码不能为空！！");
		return;
	}else{
       data=$('#register_form').serialize();
       console.log(data);
	   $.post('registerInfo',data,function(data){
	   	console.log(data);
		  if (data==-1) {
             alert("验证码不正确！！");
             $('#captcha_img').attr('src',"verifyimg");
		  }else if (data==-2) {
           	alert('该用户名已注册过了！！');
           	$('#captcha_img').attr('src',"verifyimg");
          }else if (data>0) {
           	alert('信息已注册成功！！');
           	$('#registerModel').modal('hide');
          }else{
           	alert('信息已注册失败！！');
           	$('#registerModel').modal('hide');
           }
	  });
        
	}
	

  });
$("#logout").click(function(){
	$('#myModal').modal('show');
});
$('#logoutButton').click(function(){
	window.location.href="/thinkManage/personManage/index.php/Home/Manage/Login";
});	