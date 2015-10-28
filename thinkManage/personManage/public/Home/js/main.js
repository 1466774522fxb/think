/*下拉，弹回操作*/
window.onload=function(){
  console.log("aaaaaaaaaaaaaaa"); 
  $(".info").slideUp(0,function(){
        })
}
 	var wh=$(window).height();

	$(window).scroll(function(){
	var s=$(window).scrollTop();
	if(s>250){
		$(".info").slideDown(500,function(){
 				})
		
	}else{
		$(".info").slideUp(500,function(){
 				})
	}
	if(s>500){
      
    $(".content").fadeIn(1000,function(){});
    }else{
  	  $(".content").fadeOut(1000,function(){});
    }
    if(s>750){
       $(".content1").fadeIn(1000,function(){});
    }else{
  	  $(".content1").fadeOut(1000,function(){});
    }
   });

  /* 淡入淡出*/
  $("#quitButton").click(function(){
     $("#myModal").modal("show");
  });
  $("#logout").click(function(){
      $("#myModal").modal("hide");
      window.location="index.php";
      
  });
   $('#loginButton').click(function () {
     var url=window.location.href;
     $.post('log.php',{'url':url},function(data){

     });
   });