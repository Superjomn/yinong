$(function(){
	 //小部件样式控制
    $("#summarize table td:even").each(function(){
        $(this).css({
            'color':'blue',
            'font-weight':'bold'
        });
    });
    //按钮控制
    $('button').button();		   
});
//求购信息
$(function(){
              //草稿
              $("#draft_save") .click(function(){
              $.post("core/qiugou.php",{
                      status:'draft',
                      name:$("[name=qiugou]").val(),
                      description:$("[name=miaoshu]").val(),
                      tag:$("[name=biaoqian]").val(),
                      sort:$("[name=leibie]").val()
             },function(data,textStatus){
                //alert(data);
				dlg('求购信息应保存至草稿箱！');
             });
			  
             });
			  
			  
             //发布
             $("#submit") .click(function(){
              $.post("core/qiugou.php",{
                        status:'on',
                       name:$("[name=qiugou]").val(),
                      description:$("[name=miaoshu]").val(),
                      tag:$("[name=biaoqian]").val(),
                      sort:$("[name=leibie]").val()
             },function(data,textStatus){
                //alert(data);
				dlg('求购信息已经发布！');
             });
           });
           //修改信息
           $("#edit_save") .click(function(){
              $.post("core/qiugou_edit.php",{
                      status:'on',
                      id:$("[name=lookfor_id]").val(),
                      userid:$("[name=userid]").val(),
                      username:$('[name=username]').val(),
                      name:$("[name=qiugou]").val(),
                      description:$("[name=miaoshu]").val(),
                      tag:$("[name=biaoqian]").val(),
                      sort:$("[name=leibie]").val()
             },function(data,textStatus){
                //alert(data);
				dlg('求购信息已更改！');
             });
           });
		   //
});
