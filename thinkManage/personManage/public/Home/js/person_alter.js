$("#ater1Button").click(function () {
	var id=$(this).attr('useId');
	var data=$("#alter_form").serialize();
	$.post("alterPerson",data+"&id="+id,function(data){
        if (data==1) {
        	alert("提交成功！！");
        	document.location="person?Id="+id;
        }else{
        	alert("提交失败！！");
        }
	});
});