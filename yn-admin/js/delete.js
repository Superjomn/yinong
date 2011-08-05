function del(button,kind,idl){
    $(button).click(function(){
       var id=$(this).attr(idl);
       //alert('kind: '+kind+' id: '+id)
       $.post('core/delete.php',{
           kind:kind,
           id:id
       },function(data,textStatus){
         //alert(data) ;
		 dlg('信息已删除！');
          //window.location.reload();
       });
    });
}
function bac(button,kind,idl){
    $(button).click(function(){
       var id=$(this).attr(idl);
       //alert('kind: '+kind+' id: '+id)
       $.post('core/back.php',{
           kind:kind,
           id:id
       },function(data,textStatus){
         //alert(data) ;
		 dlg('信息已驳回！');
          //window.location.reload();
       });
    });
}
function hui(button,kind,idl){
    $(button).click(function(){
       var id=$(this).attr(idl);
       //alert('kind: '+kind+' id: '+id)
       $.post('core/huifu.php',{
           kind:kind,
           id:id
       },function(data,textStatus){
         //alert(data) ;
		 dlg('信息已经解封！');
          //window.location.reload();
       });
    });
}
function lev(button,idl){
    $(button).click(function(){
       var id=$(this).attr(idl); //the user's id
	   var levelid=$(this).attr("se");  //the select's id
	   var level=$('#'+levelid).val(); //the select's view
	   //alert('the id is'+id);
	   
	   //alert('the select id is '+levelid);
	   //alert('the level is '+level);
       //alert('kind: '+kind+' id: '+id)
       $.post('core/level.php',{
		   level:level,
           id:id
       },function(data,textStatus){
         //alert(data) ;
		 dlg('用户权限已修改！');
          //window.location.reload();
       });
    });
}
function don(button,idl){
    $(button).click(function(){
       var id=$(this).attr(idl);
       //alert('kind: '+kind+' id: '+id)
       $.post('core/dongjie.php',{
           id:id
       },function(data,textStatus){
         //alert(data) ;
		 dlg('用户信息已经冻结！');
          //window.location.reload();
       });
    });
}