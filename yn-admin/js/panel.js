$(function(){
    //隐藏帮助栏的控制
    var is_help_down=false;
    //$("#hide_panel").css('width',$('#panel').width());
    $("#help").click(function(){
        if(!is_help_down){
            var hide_html=$("#help_hide_bar").html();
            $("#hide_panel").html(hide_html);
            $("#hide_panel").slideDown(1000);
            $("#help").css("background-color",'#000');
            is_help_down=true;
        }else{
            $("#hide_panel").slideUp(500);
             $("#help").css("background-color",'');
            is_help_down=false;
        }
    });
	$("#infor").click(function(){
        if(!is_help_down){
            var hide_html=$("#hide_infor_bar").html();
            $("#hide_panel").html(hide_html);
            $("#hide_panel").slideDown(1000);
            $("#infor").css("background-color",'#000');
            is_help_down=true;
        }else{
            $("#hide_panel").slideUp(500);
             $("#infor").css("background-color",'');
            is_help_down=false;
        }
    });
   

});