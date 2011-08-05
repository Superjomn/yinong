$(function(){
   //对 驳回 和成交 按钮都起作用
   /*
    * button 的 class 为 status
    * button 的 kind 值为 goods /lookfor
    * button 的 ynid 为 id
    * button 的 status 为 on back hold
    */
   $(".status").click(function(){
       var kind=$(this).attr('kind');
       var id=$(this).attr('ynid');
       var status=$(this).attr('status');
       $.post("./core/status.php",{
           kind:kind,
           id:id,
           status:status
       },function(data,textStatus){
            //alert(data);
            //window.location.reload();
			dlg('宝贝属性已经标记为已成交！');
       });
   });
});