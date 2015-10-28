$('.deletes').click(function(){
	 var img_id = $(this).prev("img").attr('imgId');
   var id=$(this).parent();
  $.post("photoAlter",{'num':img_id},function(data){
    	if (data==1) {
    		alert('图片删除成功！！');
    		 id.remove();
    	}else{
    		
    	}
  });
});
$("#upPage").click(function(){
 $page=$(this).attr('pageSize');
 $id=$(this).attr('userId');
 $page--;
  location.href="/thinkManage/personManage/index.php/Home/Index/photo?Id="+$id+"&page="+$page; 
});
$("#downPage").click(function(){
 $page=$(this).attr('pageSize');
 $id=$(this).attr('userId');
 $page++;
  location.href="/thinkManage/personManage/index.php/Home/Index/photo?Id="+$id+"&page="+$page; 
});
 
   