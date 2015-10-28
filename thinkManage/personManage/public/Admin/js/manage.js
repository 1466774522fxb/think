$('.removeJournal').click(function () {
    var id=$(this).parent().prev("td").prev("td").html();
    console.log(id);
    $('#delete_button').attr('id',id);
	$('#deletePerson').modal('show');
});
$('#delete_button').click(function(){
	var id=$(this).attr('id');
	console.log(id);
	$.post('deletePerson',{'id':id},function(data){
       if (data==1) {
        alert('信息删除成功！！');
        $('#deletePerson').modal('hide');
       document.location.reload();
	}else{
		alert('信息删除失败！！');
		$('#deletePerson').modal('hide');
	}
  });
});
$('.updateJournal').click(function () {
    var id=$(this).parent().prev("td").prev("td").html();
    $('#update_button').attr('id',id);
	$('#updatePerson').modal('show');
});
$('#update_button').click(function(){
  id=$(this).attr('id');
   data=$('#user_info').serialize();
   console.log(data);
    $.post('updateUser',data+"&id="+id,function(data){
       if (data==1) {
        alert('信息修改成功！！');
        $('#updatePerson').modal('hide');
        document.location.reload();
	}else{
		  alert('信息修改失败！！');
		 $('#deletePerson').modal('hide');
	}
  });
});