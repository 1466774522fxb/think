$('#quit').click(function () {
	$('#quitModal').modal('show');
});
$('#aa_button').click(function(){
   	userId=$(this).attr('userid');
    window.location.href="/thinkManage/personManage/index.php/Home/Index/main?Id="+userId
});