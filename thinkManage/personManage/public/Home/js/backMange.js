 $(".updatePerson").click(function(){
    $("#myModalLabel").html('添加个人信息对话框');
     $("#myModal").modal("show");
     var parent=$(this).parent().parent();
     var condition=($(parent).children("td:first-child")[0]).innerText;
      $('#add_button').attr('condition',condition);
       console.log( condition);
     $.post('person_info.php?status=update&form=person',{'num':condition},function(data){ 
       console.log(data.message);
        $("#person_name").val(data.name);
        $("#person_pinyin").val(data.pinyin);
        $("#sex").val(data.sex);
        $("#age").val(data.age);
        $("#phone").val(data.telephone);
        $("#QQ").val(data.QQ);
        $("#email").val(data.email);
        $("#address").val(data.address);
        $('#add_button').attr('btn',"update");
     });
	});
  $("#add_button").click(function(){
    var data = $("#person_info").serialize();
    console.log(data);
    $.post("person_info.php?status=add&form=person", data, function(data){
      if(data.code==1){
        alert('信息修改成功！！！');
         window.location.reload();
      }else{
        alert('信息修改失败！！！');
      }
      
     });
  });

$('.addBook').click(function(){
   $("#myModalBook").modal('show');
   $('#book_button').attr('btn',"add");
   $('#book_button').attr('condition',"");
  });
  $('#book_button').click(function(){
    var data=$('#book_form').serialize();
    data=data+'&btn='+$(this).attr('btn')+'&condition='+$(this).attr('condition');
    $.post('person_info.php?status=add&form=books',data,function(data){
      console.log(data.message);
      if(data.code==0){
        alert('数据上传失败！！！');
      }else if(data.code==1){
        alert('数据上传成功！！！');
        window.location.reload();
      }
    });
  });

  $('.deleteBook').click(function(){
     $("#myModal1 ").modal('show');
     var index=$('.deleteBook').index($(this));
     var parent=$('.deleteBook').eq(index).parent().parent();
     var condition=($(parent).children("td:first-child")[0]).innerText;
     $('#delete_button').attr('delete',condition);
     $('#delete_button').attr('form','book');
});
 $('.updateBook').click(function(){
     $("#myModalBook").modal('show');
     var index=$('.updateBook').index($(this));
     var parent=$('.updateBook').eq(index).parent().parent();
     var condition=($(parent).children("td:first-child")[0]).innerText;
      $('#book_button').attr('condition',condition);
       console.log(" ccccccccc"+condition);
     $.post('person_info.php?status=update&form=books',{'num':condition},function(data){
        $("#bookName").val(data.book_title);
        $("#bookAutor").val(data.author);
        console.log(data.text);
        $("#bookText").val(data.text);
        $('#book_button').attr('btn',"update");
     });

});
 //日志添加删除与更新
$('.addJournal').click(function(){
   $("#myModalJournal").modal('show');
   $('#journal_button').attr('btn',"add");
   $('#journal_button').attr('condition',"");
  });


$('#journal_button').click(function(){
  var data=$('#jounal_form').serialize();
  var time=new Date();
  time=time.Format('yyyy-MM-dd hh:mm:ss');

  data=data+'&time='+time+'&btn='+$(this).attr('btn')+'&condition='+$(this).attr('condition');
  $.post('person_info.php?status=add&form=journal',data,function(data){
       if (data.code==0) {
           alert('数据提交失败！！！'+data.message);
        } else{
          alert('数据提交成功！！！');
           window.location.reload();
        }
  });
    
});

$('.deleteJournal').click(function(){
     $("#myModal1 ").modal('show');
     var index=$('.deleteJournal').index($(this));
     var parent=$('.deleteJournal').eq(index).parent().parent();
     var condition=($(parent).children("td:first-child")[0]).innerText;
     $('#delete_button').attr('delete',condition);
     $('#delete_button').attr('form','journal');
});
$('.updateJournal').click(function(){
     $("#myModalJournal").modal('show');
     var index=$('.updateJournal').index($(this));
     var parent=$('.updateJournal').eq(index).parent().parent();
     var condition=($(parent).children("td:first-child")[0]).innerText;
      $('#journal_button').attr('condition',condition);
     $.post('person_info.php?status=update&form=journal',{'num':condition},function(data){
       
        $("#journal_title").val(data.title);
       $("#journal_txt").val(data.text);
       $('#journal_button').attr('btn',"update");
     });

});

//笔记与便签操作
$('.addNote').click(function(){
  $('#myModalNote').modal('show');
  $('#note_button').attr('btn',"add");
   $('#note_button').attr('condition',"");
});
 $('#note_button').click(function(){
    var data=$('#note_form').serialize();
    var time=new Date();
    time=time.Format('MM-dd');
    data=data+'&time='+time+'&btn='+$(this).attr('btn')+'&condition='+$(this).attr('condition');
    console.log(data);
    $.post('person_info.php?status=add&form=note',data,function(data){
    console.log(data.code);
       if (data.code==0) {
           alert('数据提交失败！！！'+data.message);
        } else{
          alert('数据提交成功！！！');
           window.location.reload();
        }
  });
 });
$('.deleteNote').click(function(){
     $("#myModal1 ").modal('show');
     var index=$('.deleteNote').index($(this));
     var parent=$('.deleteNote').eq(index).parent().parent();
     var condition=($(parent).children("td:first-child")[0]).innerText;
     $('#delete_button').attr('delete',condition);
      $('#delete_button').attr('form','note');
});



$(".delete").click(function(){
     var index=$('.delete').index($(this));
     var parent=$('.delete').eq(index).parent().parent();
     var condition=($(parent).children("td:first-child")[0]).innerText;
     $('#delete_button').attr('delete',condition);
     $("#myModal1").modal("show");
   });
$('.updateNote').click(function(){
     $("#myModalNote").modal('show');
     
     var index=$('.updateNote').index($(this));
     var parent=$('.updateNote').eq(index).parent().parent();
     var condition=($(parent).children("td:first-child")[0]).innerText;
     $('#note_button').attr('condition',condition);
     $.post('person_info.php?status=update&form=note',{'num':condition},function(data){
      console.log('---'+data.num);
      if (data.num==0) {
        $("#note_class").val('笔记');
      }else{
        $("#note_class").val('便签');
      }
        
        $("#note_txt").val(data.text);
        $('#note_button').attr('btn',"update");
     });

});



  $(".update").click(function(){
    $("#myModalLabel").html('更新个人信息');
      $("#myModal").modal("show");
      
        console.log("----"+$("#myModalLabel").html());
  });

//书籍删除增加和更新
 



  $('#delete_button').click(function(){
    var condition=$('#delete_button').attr('delete');
    var form=$('#delete_button').attr('form');
    $.post("person_info.php?status=delete&form="+form, {"num":condition}, function(data){
      console.log(data.code);
      if(data.code==1){
        $("#myModal1").modal("hide");
        window.location.reload();
      }else{
           alert('删除失败！！！');
           $("#myModal1").modal("hide");
        }
     });
  });

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