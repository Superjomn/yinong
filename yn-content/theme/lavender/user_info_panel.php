<style>
#user_bar{
	float:left;
	width:280px;
	margin-left:20px;
	text-align:left;
    background-color:#E4EBFA;
	display:inline;

}
#user_bar #user{
	width:120px;
	display:block;
	border:4px solid #ccc;
	margin-left:auto;
	margin-right:auto;
	margin-top:10px;
}

</style>

<?php
	$user->set_id($owner_id);
	$user->get_user();
?>
 <div id="user_bar" class="small_bar ui-widget-content ui-corner-all">
        <h3 class="bar_h ui-widget-header ui-corner-all">用户信息</h3>     
        <img id="user" src="<?php $user->get_photo(); ?>" />
              <table id="info">
                <tr><td class="user_label">用户名</td><td><a href="user_good_list?id=<?php echo $owner_id;  ?>"><?php $user->get_name();  ?></a></td></tr>
                <tr><td class="user_label">联系方式</td><td><?php $user->get_connect();  ?></td></tr>
                <tr><td class="user_label">学院</td><td><?php $user->get_xueyuan();?></td></tr>
                <tr><td class="user_label">性别</td><td><?php $user->get_sex();?></td></tr>
                <tr><td class="user_label">校区</td><td><?php $user->get_xiaoqu();  ?></td></tr>
              </table>   
</div>    
