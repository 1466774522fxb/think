$('#addJournal').click(function () {
 $('#note_button').attr('temp',"add");
 $('#note_txt').val("");
 $('#myModalNote').modal('show');
});
$('#note_button').click(function(){
 var data=$('#note_form').serialize();
 var date=new Date();
 date=date.Format('MM-dd');
 if ($(this).attr('temp')=="add") {
      $.post('addNote',data+'&time='+date,function(data){
          if (data) {
             alert("信息提交成功！！");
           document.location.reload()
          }else{
             alert("信息提交失败！！");
          }
     });
    }else{
        var id=$(this).attr('Id');
        $.post('updateNote',data+'&time='+date+"&id="+id,function(data){
          if (data) {
             alert("信息更新成功！！");
           document.location.reload()
          }else{
             alert("信息更新失败！！");
          }
     });
    }
 
});
$('.removeJournal').click(function(){
    $('#delete_button').attr('Id',$(this).attr('id'));
    console.log($(this).attr('id'));
    $('#deleteModal').modal('show');
});
$('#delete_button').click(function(){
    var Id=$(this).attr('Id');
    $.post('deleteNote',{'Id':Id},function(data){
       if (data) {
       document.location.reload()
      }else{
         alert("信息提交失败！！");
         $('#deleteModal').modal('hide');
      }
    });
});
$('.updateJournal').click(function(){
   $('#note_button').attr('Id',$(this).attr('id'));
   $('#note_button').attr('temp',"update");
   var object=$(this).parent().prev("td").prev('td');
   var text=object.html();
   var Note_class=object.prev('td').html().trim();
   if (Note_class=="便签") {
       $('#option1').attr('selected',"selected");
   }else{
        $('#option2').attr('selected',"selected");
   }
   $('#note_txt').val(text);
   $('#myModalNote').modal('show');
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