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
                alert(data);
             });
			  
             });
			  
			  
             //发布
             $("#submit") .click(function(){
              $.post("core/qiugou.php",{
					 //驳回后变为 待审核
                        status:'hold',
                       name:$("[name=qiugou]").val(),
                      description:$("[name=miaoshu]").val(),
                      tag:$("[name=biaoqian]").val(),
                      sort:$("[name=leibie]").val()
             },function(data,textStatus){
                alert(data);
             });
           });
           //修改信息
           $("#edit_save") .click(function(){
              $.post("core/qiugou_edit.php",{
                      status:'hold',
                      id:$("[name=lookfor_id]").val(),
                      userid:$("[name=userid]").val(),
                      username:$('[name=username]').val(),
                      name:$("[name=qiugou]").val(),
                      description:$("[name=miaoshu]").val(),
                      tag:$("[name=biaoqian]").val(),
                      sort:$("[name=leibie]").val()
             },function(data,textStatus){
                alert(data);
             });
           });
		   //
});
