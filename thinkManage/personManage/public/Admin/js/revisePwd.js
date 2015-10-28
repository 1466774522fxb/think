$('#revise_button').click(function () {
		var data=$("#reviseForm").serialize();
		var userName=$('#userName').val().trim();
		var password=$('#password').val().trim();
		var newPassword=$('#newPassword').val().trim();
		var rePassword=$('#rePassword').val().trim();
		if (userName==""){
			alert("用户名不能为空！！");
			return;
		}else if (password==""||newPassword==""||rePassword=="") {
	        alert("密码不能为空！！");
			return;
		}else if (newPassword!=rePassword) {
			alert("两次密码不等！！");
			return;
		}else {
			$.post('checkPassword',data,function(data){
				console.log(data);
				if (data==3) {
					alert("原密码或用户名不正确！！");
				}else if(data==1){
					alert("密码修改成功！！");
				}else{
					alert("密码修改失败！！");
				}
			});
		}
});