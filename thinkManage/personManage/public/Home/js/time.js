$(window).scroll( function() { 
  	  var top=$(window).scrollTop();
  	  console.log("top"+top)
  	  var  height=$("body").height;
  	  var window_height = $(window).height();
  	  if ($(".notes").offset.top)

  	  console.log($(window).height());
  	  if(top==100){
  	  	  $(".notes").css({background:"white"});
  	  	$(".notes").eq(1).css({background:"black"});
  	  }
  	  if(top==200){
  	       $(".notes").css({background:"white"});
          $(".notes").eq(2).css({background:"black"});
           $(".notebook").css({background:"white"});
          $(".notebook").eq(1).css({background:"black"});
  	  }
  	 if(top==300){
  	       $(".notes").css({background:"white"});
          $(".notes").eq(3).css({background:"black"});
  	  }
  	  if(top==500){
  	       $(".notes").css({background:"white"});
          $(".notes").eq(3).css({background:"black"});
           $(".notebook").css({background:"white"});
          $(".notebook").eq(2).css({background:"black"});
  	  }
  	   if(top==600){
  	       $(".notes").css({background:"white"});
          $(".notes").eq(4).css({background:"black"});
         
  	  }
  	   if(top>600){
  	       $(".notes").css({background:"white"});
          $(".notes").eq(5).css({background:"black"});
          $(".notebook").css({background:"white"});
          $(".notebook").eq(3).css({background:"black"});
  	  }
  	 } );
   $(".notes").popover('show');
    $(".notebook").popover('show');
  $('#timeUp').click(function(){
    page=$(this).attr('page');
    id=$(this).attr('userId');
    page--;
    location.href="/thinkManage/personManage/index.php/Home/Index/time?Id="+id+"&page="+page; 
     
  });
  $('#timeDown').click(function(){
    console.log("ddddddddddd");
    page=$(this).attr('page');
    id=$(this).attr('userId');
    page++;
    location.href="/thinkManage/personManage/index.php/Home/Index/time?Id="+id+"&page="+page; 
  });