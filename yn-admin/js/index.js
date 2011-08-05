$(function(){
   //menu的一些初始化
  //控制板的弹出菜单

  var is_control_down=false;
  
  $('#a_control_panel').click(function(){
      if(!is_control_down){
          $('#bar_control').slideDown(500);
          is_control_down=true;
      }else{
          $('#bar_control').slideUp(500);
          is_control_down=false;
      }
  });
  //宝贝的弹出菜单
  var is_sonny_down=false;
  $('#a_sonny').click(function(){
      if(!is_sonny_down){
          $('#bar_sonny').slideDown(500);
          is_sonny_down=true;
      }else{
          $('#bar_sonny').slideUp(500);
          is_sonny_down=false;
      }
  });
  //求购信息的弹出菜单
  var is_lookfor_down=false;
  $('#a_lookfor').click(function(){
      if(!is_lookfor_down){
          $('#bar_lookfor').slideDown(500);
          is_lookfor_down=true;
      }else{
          $('#bar_lookfor').slideUp(500);
          is_lookfor_down=false;
      }
  });
  //留言的弹出菜单
  var is_comment_down=false;
  $('#a_leave_word').click(function(){
      if(!is_comment_down){
          $('#bar_leaveword').slideDown(500);
          is_comment_down=true;
      }else{
          $('#bar_leaveword').slideUp(500);
          is_comment_down=false;
      }
  });
  //资料的弹出菜单
  var is_infor_down=false;
  $('#a_information').click(function(){
      if(!is_infor_down){
          $('#bar_information').slideDown(500);
          is_infor_down=true;
      }else{
          $('#bar_information').slideUp(500);
          is_infor_down=false;
      }
  });
  //设置的弹出菜单
  var is_set_down=false;
  $('#a_set').click(function(){
      if(!is_set_down){
          $('#bar_set').slideDown(500);
          is_set_down=true;
      }else{
          $('#bar_set').slideUp(500);
          is_set_down=false;
      }
  });
  //菜单动作 iframe重定向
  $('.cdx').click(function(){
      var value=$(this).attr('name');
     // alert(value);
      var url='include.php?kind='+value;
      $('#barmid').attr('src',url);
      //alert(url);
  });

  
  
});


