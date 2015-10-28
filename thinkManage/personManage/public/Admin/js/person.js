//个人信息更新事件
$('#person_button').click(function () {
	$('#update_person').modal('show');
});
//个人信息更新提交事件
$('#update_button').click(function(){
   var data=$('#person_form').serialize();
	$.post('upadatePerson',data,function(data){
		if (data==1) {
	       alert('信息更新成功！！');
	       $('#update_person').modal('hide');
	       document.location.reload()
		}else{
			alert('信息更新失败！！');

		}
	});

});