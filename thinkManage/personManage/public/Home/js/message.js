 $(".me").on("blur",function(){
         var temp=$(this);
          setTimeout(function(){
             temp.css({width:"200px",height:"25px"});
             $(".btn_group").css({ display:"none" });
         },300);
          
     });

     $(".me").bind("focus",function(){
        var index=$(".me").index($(this));
        if ($(this).attr('text')=="") {
               alert("请你先登录才能回复");
         }else{
        var object=$(".btn_group").eq(index);
         object.css({ display:"block" });
         $(this).css({width:"300px",height:"60px"});
       }
     }); 

     $(".answer").on("click",function(){
       var index= $(".answer").index($(this));
         if ($(this).attr('text')=="") {
               alert("请你先登录才能回复");
         }else{
            $(".btn_group").eq(index).css({ display:"block" });
           $(".me").eq(index).css({width:"300px",height:"60px"});
         }
        
     });
    
     $(".ok").on("click",function(){
        var  parent=$(this).parent().parent().parent();
        var  index=$(".ok").index($(this));
        var text = $(".me").eq(index).val();
        if(!(text=="")){
          var date=new Date();
          var time=date.Format("yyyy-MM-dd hh:mm:ss");
          var number=$(this).attr('num');
          var textarea=$(parent).find('.me');
          var value=textarea.val();
           console.log(number+time+value);
          $.post("sayInfo", {"number":number,"time":time,"text":value}, function(data){
              console.log(data);
              if (data>0) {
               window.location.reload();
              }else{
                alert("回复失败！！！");
              }
         });
        }
       
       $(".me").val("");
     });
     $(".rely_btn").on("click",function(){

         $(".me").val("");
         $(".me").css({ placeholder:"我也说一句"});
        $(".btn_group").css({ display:"none" });

     });

     
     //删除留言
     $('.delete1').click(function(){
        var msgId=$(this).attr('msgId');
        console.log(msgId);
      $.post("deleteSay",{'msgId':msgId}, function(data){
           console.log(data);
            if (data==1) {
                 alert('留言删除成功！！');
                 window.location.reload();
             }else{
                  alert('留言删除失败！！');
             }
             
        });
       
        
     });
     //给好友留言操作
     $(".leave_set").click(function(){
       var st=$('#couent').html();
       if (st!="") {
         $("#leave_ok").attr('name',st);
          $("#myMessageModal").modal("show");
        }else{
          alert('请你先登录再进行留言!!');
        }
     });
     $("#leave_ok").click(function(){
     var Id=$(this).attr('num');
     console.log(Id);
     var name=$(this).attr('name');
      var text=$('#say').val();
      var date=new Date();
      var time=date.Format("yyyy-MM-dd hh:mm:ss");
      console.log(name+" "+text+" "+time);
       $.post("addMessage",{'Id':Id,'name':name,'text':text,'date':time}, function(data){
        console.log(data);
            if (data<=0) {
              alert("留言已失败！！");
            }else{
              alert("留言已成功！！");
             window.location.reload();
            }
      });

    });

     //留言删除
      $(".relyDelete").click(function(){
        var index= $(".relyDelete").index($(this));
        var deletes=$(".relyDelete").eq(index).parent();
        var content= deletes.find('span').html();
        console.log(content);
        $.post("relyMsg",{'time':content},function(data){
          console.log(data);
          if (data==1) {
             alert("回复成功删除！！！");
             window.location.reload();
          }else{
             alert("回复删除失败！！！");
          }
              
        });
      
      });
     //
    Date.prototype.Format = function(fmt)   
    { //author: meizz   
      var o = {   
        "M+" : this.getMonth()+1,                 //月份   
        "d+" : this.getDate(),                    //日   
        "h+" : this.getHours(),                   //小时   
        "m+" : this.getMinutes(),                 //分   
        "s+" : this.getSeconds(),                 //秒   
        "q+" : Math.floor((this.getMonth()+3)/3), //季度   
        "S"  : this.getMilliseconds()             //毫秒   
      };   
      if(/(y+)/.test(fmt))   
        fmt=fmt.replace(RegExp.$1, (this.getFullYear()+"").substr(4 - RegExp.$1.length));   
      for(var k in o)   
        if(new RegExp("("+ k +")").test(fmt))   
      fmt = fmt.replace(RegExp.$1, (RegExp.$1.length==1) ? (o[k]) : (("00"+ o[k]).substr((""+ o[k]).length)));   
      return fmt;   
    }  
     $("#quitButton").click(function(){
       window.location="index.php";
    });
 