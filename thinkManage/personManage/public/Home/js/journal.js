function change(id ,id_body){
	    	var value=$(id).attr("class");
	    	var value1="list glyphicon glyphicon-chevron-down";
	    	var value2="list glyphicon glyphicon-chevron-up";
	    	if(value==value1){
	           	$(id_body).slideDown(500,function(){
	 					$(id).html("收缩");
	 					$(id).attr("class",value2);
	 				});
	    	}else{
	    		 	$(id_body).slideUp(500,function(){
	 					$(id).html("展开");
	 					$(id).attr("class",value1);
	 				});
	 	    }
    	 }
    	
 	$(".list").bind("click",function(){

 		change($(this) ,$(this).parent().next());
 		
 	});

 	$(".up_move").click(function(){
 		var index=$(".panel").index($(this).parent().parent());
 		var temp = $(".panel").eq(index-1);
 		var upIndex=$(".up_move").index($(this));
 		size=$(this).attr('size')-1;
 		if (upIndex==1) {
           $(".up_move").eq(upIndex-1).css("display","");
 		   $(this).css("display","none");
 		}
 		if (upIndex==size) {
 			console.log("aaaaaa");
           $(".down_move").eq(upIndex).css("display","");
 		   $(".down_move").eq(upIndex-1).css("display","none");
 		}
 		
 		var dert=$(this).parent().parent();
 		temp.before(dert);
 	});
 	$(".down_move").click(function(){
 		var index=$(".panel").index($(this).parent().parent());
 		var temp = $(".panel").eq(index+1);
 		var downIndex=$(".down_move").index($(this));
 		size=$(this).attr('size')-2;
 		if (downIndex==0) {
           $(".up_move").eq(downIndex).css("display","");
           $(".up_move").eq(downIndex+1).css("display","none");
 		   $(this).css("display","");
 		}
 		 if(downIndex==size){
 			$(this).css("display","none");
 			 $(".down_move").eq(downIndex+1).css("display","");
 		}
 		  var dert=$(this).parent().parent();
 		   temp.after(dert);

 	});
  $("#quitButton").click(function(){
     window.location="index.php";
  });
 