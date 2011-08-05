$(function() {
		//滑动条初始化
		$("#slider-range-max").slider({
			range: "max",
			min: 1,
			max: 10,
			value: 2,
			slide: function(event, ui) {
				$("#amount").val(ui.value+'成新');
			}
		});
		$("#amount").val($("#slider-range-max").slider("value")+'成新');
		//按钮初始化
		$('button').button();
                //加入图片dialog
                $('#image_select').dialog({
                    height:700,
                    width:1000
                }).dialog('close');
   //hide框的初始化
   
});

//图片添加初始化
$(function(){
    //左视图
    $('#left_bn').click(function(){
        $('#image_select').dialog('open');
        $('#img').val('left');
        
    });//end click
    $('#fron_bn').click(function(){
        $('#image_select').dialog('open');
        $('#img').val('fron');

    });//end click
    $('#top_bn').click(function(){
        $('#image_select').dialog('open');
        $('#img').val('top');

    });//end click
    $('#back_bn').click(function(){
        $('#image_select').dialog('open');
        $('#img').val('back');

    });//end click
    /*
     * 上传的小图会留在 session left中
     * 通过 确认按钮 通过post 从服务器端取回地址，显示出来
     */
    $('#bn_submit').click(function(){
        $('#image_select').dialog('close');
        $.post('core/img_select.php',{

        },function(data,textStatus){
           //alert($('#img').val());
           //alert(data);
           if($('#img').val()=='left'){
               var str="<img src='"+data+"'>";
               $("#img_left_show").html(str);
           }
           if($('#img').val()=='fron'){
               var str="<img src='"+data+"'>";
               $("#img_fron_show").html(str);
           }
           if($('#img').val()=='top'){
               var str="<img src='"+data+"'>";
               $("#img_top_show").html(str);
           }
           if($('#img').val()=='back'){
               var str="<img src='"+data+"'>";
               $("#img_back_show").html(str);
           }

        });//end post
    });//end click
    $('#bn_false').click(function(){
        $('#image_select').dialog('close');
    })
});//end start

//开始上传
$(function(){
    //储存为草稿
    $("#drop").click(function(){
        //alert('drop');
    });
    $("#draft").click(function(){
        var send_content=$('#bgcode').val();
        var right_content=send_content.replace(new RegExp("\"","g"),"^");
        alert('hello');
        $.post("core/belly_edit.php", {
            kind:'edit',
			//开始有编辑附加的程序
			id:$('[name=good_id]').val(),
			owner:$('[name=owner]').val(),
			ownerid:$('[name=ownerid]').val(),
			//附加程序段结束
            name:$('[name=name]').val(),
            leftimg:$("#img_left_show img").attr('src'),
            fronimg:$("#img_fron_show img").attr('src'),
            topimg:$("#img_top_show img").attr('src'),
            backimg:$("#img_back_show img").attr('src'),
            description:right_content,
            exchangefor:$('[name=exchangefor]').val(),
            miaoshu:$("[name=miaoshu]").val(),
            price:$("[name=price]").val(),
            sort:$('[name=sort]').val(),
            tag:$('[name=tag]').val(),
            old:$("#amount").val(),
            sendto:$('[name=sendto]').val()
        },function(data,textStatus){
            //alert($('[name=good_id]').val());
			//alert(data);
            //$("#try").text(data);
			dlg('信息已保存至草稿箱！');
        });//end post
    });//end click
});//end start

 function make(num){
        if(num==1){
            $("#hide_1").css('display', 'none');
            $("#hide_2").css('display','none');
            $('#hide_3').css('display','none');
        }
        if(num==2){
            $("#hide_1").css( 'display','' );
            $("#hide_2").css('display','');
            $('#hide_3').css('display','none');
        }
        if(num==3){
            $("#hide_1").css('display', 'none');
            $("#hide_2").css('display','none');
            $('#hide_3').css('display','');
        }

    }

