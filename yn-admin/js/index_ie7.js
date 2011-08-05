$(function(){
   //menu的一些初始化
  //控制板的弹出菜单
  var is_control_down=false;
  
  //菜单动作 iframe重定向
  $('.cdx').click(function(){
      var value=$(this).attr('name');
     // alert(value);
      var url='include.php?kind='+value;
      $('#barmid').attr('src',url);
      //alert(url);
  })

});


