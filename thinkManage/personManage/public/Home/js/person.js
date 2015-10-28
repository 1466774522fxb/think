 $(".alter").click(function(){

    });
    $(".head_update").click(function(){
    	$("#myHeadModal").modal("show");
    });
    var url;
    $(".head_img").click(function(){

    	$(this).css({border:"1px solid red"});
    	url= $(this).attr("src");
        newurl=url.substring(url.lastIndexOf('/')+1,url.length);
       $(".btn-primary").attr('img',newurl);
    });
    $("#alertButton").click(function(){
        newurl=$(this).attr('img');
            $.post('alert_Headimg',{'Imgurl':newurl},function(data){
                console.log(data);
             if (data==1) {
                alert("头像修改成功！！");
                $(".me_img").attr("src",url.substring(0,url.lastIndexOf('/')+1)+newurl);
                $(".head_img").css({border:"none"});
                $("#myHeadModal").modal("hide");
             }else{
               alert("头像修改失败！！");
             }
            });
            
            
        });
   
     $("#quitButton").click(function(){
      window.location="index.php";
     });
    