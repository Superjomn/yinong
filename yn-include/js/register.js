 function CheckEmail(email){
    var pattern = /^([a-zA-Z0-9._-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-])+/;
    flag = pattern.test(email);
    if(!flag){
      return false;
     }
     return (true);
}
function value(name){
    return $.trim($(name).val());
}


$(function(){
    //样式初
    $("#datepicker").datepicker({
        defaultDate:'2000-02-27',
        minDate: '-480M -10D',
        maxDate: '+1M +10D',
        changeMonth: true,
	changeYear: true,
        dateFormat:'yy-mm-dd'
    });
    //生日picker
    var check=false;
    $("[name=user_name]").blur(function(){
       //var value=$('[name=name]').val();
       //alert(value);
       if($.trim($('[name=user_name]').val()).length==0){
           $("#user_name").html("请输入用户名").addClass('alert');
           check=false;
       }else{
           //若用户名已经填写，则传输到服务器进行处理
           $.post("yn-include/sign.php",{
               kind: 'check',
               name: $.trim($('[name=user_name]').val())
           },function(data,textStatus){
             if(data=='notexit'){
                 $('#user_name').html("用户名可以使用").removeClass('alert');
                 check=true;
             }
             else{
                 if(data=='exit'){
                    $('#user_name').html("用户名已存在").addClass('alert');
                    check=false;
                 }
                else
                    alert("sign.php 检测用户名模块出错！\n请联系管理员");
             }
           });//end post
       }
   });//end name
   //-----------------------------------用户名验证完毕---------------------------
   $('[name=real_name]').blur(function(){
      if($.trim($('[name=real_name]').val()).length==0){
           $("#real_name").html("请输入真实姓名").addClass('alert');
            check=false;
       }else
           {
                if($.trim($('[name=real_name]').val()).length>6||$.trim($('[name=real_name]').val()).length<2){
                    $("#real_name").html("2--6个字符").addClass('alert');
                     check=false;
                 }else{
                     $("#real_name").html(" &nbsp;").removeClass('alert');
                     check=true;
                 }
           }
   });//end relname
  //-----------------------------------真实姓名验证完毕--------------------------
  $('[name=study_num]').blur(function(){
    if($.trim($('[name=study_num]').val()).length==0){
           $("#study_num").html("请输入学号").addClass('alert');
           check=false;
    }else{
        if($.trim($('[name=study_num]').val()).length!=10){
           $("#study_num").html("格式错误").addClass('alert');
           check=false;
        }else{
           $("#study_num").html("&nbsp;").removeClass('alert');
           check=true;
        }
    }
});//end studynum
//------------------------------------学号验证完毕-------------------------------
$('[name=email]').blur(function(){
       if($.trim($('[name=email]').val()).length==0){
           $("#email").html("请输入邮箱地址").addClass('alert');
            check=false;
       }
       else
           {
               $.post("yn-include/sign.php",{
               kind: 'email',
               email: $.trim($('[name=email]').val())
                 },function(data,textStatus){
                 if(data=='notexit'){
                 $('#email').html("邮箱可以使用").removeClass('alert');
                 check=true;
                 }
                  else{
                 if(data=='exit'){
                    $('#email').html("邮箱已存在").addClass('alert');
                    check=false;
                     }
                   else
                    alert("sign.php 检测用户名模块出错！\n请联系管理员");
                  }
                  });//end post
               //开始对输入地址检测
               var email_check=CheckEmail($('[name=email]').val());
               if(email_check){
                   $("#email").html("&nbsp;").removeClass('alert');
                   check=true;
               }else{
                   $("#email").html("地址格式错误").addClass('alert');
                   check=false;
               }

           }
   });//end email
   //--------------------------------邮箱验证完毕--------------------------------
   $("[name=new_pwd]").blur(function(){
    if($.trim($('[name=new_pwd]').val()).length==0){
        $("#new_pwd").html("请输入密码").addClass('alert');
        check=false;
    }else
        {
            if($.trim($('[name=new_pwd]').val()).length<6||$.trim($('[name=new_pwd]').val()).length>10){
               $("#new_pwd").html("6到10个字符").addClass('alert');
               check=false;
            }else{
                $("#new_pwd").html("&nbsp;").removeClass('alert');
                check=true;
            }
        }
});

$('[name=re_pwd]').blur(function(){
    if($.trim($('[name=re_pwd]').val()).length==0){
        $("#re_pwd").html("请输入密码").addClass('alert');
        check=false;
    }else
        {
            if($.trim($('[name=re_pwd]').val()).length<6||$.trim($('[name=re_pwd]').val()).length>10){
               $("#re_pwd").html("6到10个字符").addClass('alert');
               check[4]=false;
            }else{
                if($.trim($("[name=new_pwd]").val())!=$.trim($('[name=re_pwd]').val())){
                    $("#re_pwd").html("密码不一致").addClass('alert');
                    check=false;
                }else{
                    $("#re_pwd").html("&nbsp;").removeClass('alert');
                    check=true;
                }

            }
        }
});
//开始上传
$("#submit").click(function(){
    alert(check);
    if(check==true){
        $.post("yn-admin/core/info_panel.php", {
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
              alert(data);
        }) ;
    }//end if
    });//end submit



});