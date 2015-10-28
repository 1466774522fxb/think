$('#addBook').click(function () {
	$('#bookName').val("");
	$('#bookAutor').val("");
	$('#bookText').val("");
	$('#image_path').val("bookImg.jpg");
  $('#myModalBook').modal('show');
  $('#book_button').attr('temp',"add");
});
$('#book_button').click(function(){
	console.log("--"+$(this).attr('Id'));
  var data= $('#book_form').serialize();
  if ($(this).attr('temp')=="add") {
	  $.post('addBook',data,function(data){
	  	if (data) {
	  		alert("信息提交成功！！");
	  		document.location.reload();
	  	}else{
	        alert("信息失败！！");
	  		 $('#myModalBook').modal('hide');
	  	}
	    
	  });
 }else{
 	
 	var Id=$(this).attr('Id');
 	console.log(Id);
 	$.post('updateBook',data+"&Id="+Id,function(data){
 		console.log(data);
        if (data) {
        	alert("信息更新成功！！");
	  		document.location.reload();
        }else{
	        alert("信息失败！！");
	  		 $('#myModalBook').modal('hide');
	  	}
 	});
 }
});

$('.removeJournal').click(function(){
	var Id=$(this).attr('id');

	$('#delete_button').attr('Id',Id);
	$('#deleteModal').modal('show');

});
$('.updateJournal').click(function(){
	var Id=$(this).attr('id');
	$('#book_button').attr('Id',Id);
	
	$('#book_button').attr('temp',"update");
	var object=$(this).parent().prev("td");
	$('#bookName').val(object.prev('td').prev('td').prev('td').html());
	$('#bookAutor').val(object.html());
	$('#bookText').val(object.prev('td').html());
	Img_url=object.prev('td').prev('td').find("img").attr('src');
	img_url=Img_url.substring(Img_url.lastIndexOf('/')+1,Img_url.length);
	$('#image_path').val(img_url);
	$('#myModalBook').modal('show');

});
$('#delete_button').click(function(){
   var num=$(this).attr('Id');
   $.post('deleteBook',{'Id':num},function(data){
     if(data){
     	document.location.reload();
     }else{
     	alert('信息删除！！');
     	$('#deleteModal').modal('hide');
     }
   });
});