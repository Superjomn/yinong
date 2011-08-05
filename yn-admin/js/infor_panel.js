$(function(){
	$('button').button();	
	$('td:even').css({
		 'font-weight':'bold',
		 'width':'100px'
	});
});
//正式程序
function value(name){
    return $.trim($(name).val());
}
$(function(){
    //样式初始化
    $('tr:odd').addClass('tr_even');
    //开始验证
	//添加账户
	$("#edit_save").click(function(){
        $.post("core/info_panel.php", {
            kind:'edit_user',
			user_id:$('[name=user_name]').attr('user_id'),
            user_name:value('[name=user_name]'),
            real_name:value("[name=real_name]"),
            sex:value('[name=sex]'),
            study_num:value("[name=study_num]"),
            xueyuan:value("[name=xueyuan]"),
            xiaoqu:value("[name=xiaoqu]"),
            connect:value('[name=connect]'),
            birthday:value("[name=birthday]"),
            email:value("[name=email]"),
            about_me:value("[name=about_me]"),
            new_pwd:value("[name=new_pwd]")
        },function(data,textStatus){
			  //alert($('[name=user_name]').attr('user_id'));
              //$("#core").text(data);
			  dlg('用户信息已经更新！');
        }) ;
    });//end submit

    //将数据进行修改
    $("#edit_submit").click(function(){
        $.post("core/info_panel.php", {
            kind:'new_user',
            user_name:value('[name=user_name]'),
            real_name:value("[name=real_name]"),
            sex:value('[name=sex]'),
            study_num:value("[name=study_num]"),
            xueyuan:value("[name=xueyuan]"),
            xiaoqu:value("[name=xiaoqu]"),
            connect:value('[name=connect]'),
            birthday:value("[name=birthday]"),
            email:value("[name=email]"),
            about_me:value("[name=about_me]"),
            new_pwd:value("[name=new_pwd]")
        },function(data,textStatus){
              $("#core").text(data);
        }) ;
    });//end submit
    
});