$('.removeJournal').click(function () {
    var time=$(this).parent().prev("td").html();
    $('#delete_button').attr('time',time);
	$('#deleteModal').modal('show');
});
$('#delete_button').click(function(){
	var time=$(this).attr('time');
	$.post('deleteJournal',{'time':time},function(data){
       if (data==1) {
       alert('信息删除成功！！');
       $('#deleteModal').modal('hide');
       document.location.reload();
	}else{
		alert('信息删除失败！！');
		$('#deleteModal').modal('hide');
	}
	});
});
$('#addJournal').click(function(){
	$("#journalLabel").html('添加日志');
	$('#addJournal_info').modal('show');
	$('#journal_button').attr('temp','add');
});
$('#journal_button').click(function(){
	var data=$('#jounal_info').serialize();
	var date=new Date();
    date=date.Format('yyyy-MM-dd hh:mm:ss');
    var temp=$('#journal_button').attr('temp');
    if (temp=="add") {
	    $.post('addJournal',data+"&time="+date,function(data){
	       if (data>0) {
	       alert('信息添加成功！！');
	       $('#addJournal_info').modal('hide');
	       document.location.reload()
		}else{
			alert('信息添加失败！！');
			$('#addJournal_info').modal('hide');
		 }
	    });
	}else{
		var id_time =$('#journal_button').attr('time');
	  $.post('updateJournal',data+"&time="+date+"&id_time="+id_time,function(data){
	      console.log(data);
	       if (data==1) {
	       alert('信息更新成功！！');
	       $('#addJournal_info').modal('hide');
	       document.location.reload()
		}else{
			alert('信息更新失败！！');
			$('#addJournal_info').modal('hide');
		 }
	    });
	}
});
$('.updateJournal').click(function(){
	$("#journalLabel").html('更新日志');
	$('#journal_button').attr('temp','update');
	var object=$(this).parent().prev("td");
    var time=object.html();
    var text=object.prev("td").html();
    console.log(text);
    var title=object.prev("td").prev('td').html();
    $('#journal_title').val(title);
    $('#journal_txt').val(text);
    console.log(time);
    $('#journal_button').attr('time',time);
	$('#addJournal_info').modal('show');
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