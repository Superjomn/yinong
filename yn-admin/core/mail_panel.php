<?php
	require_once'../../yn-include/Mail.php';
	require_once'../../yn-include/Database.php';
	require_once'../../yn-include/User.php';
	$user=new User();
		
	$subject=$_POST['subject'];
	//解决中文乱码问题
	$subject = "=?UTF-8?B?".base64_encode($subject)."?="; 

	$level=$_POST['level'];
	$content=$_POST['content'];
	$rel_content=strtr($content, "^", "'");
	echo $rel_content;
	echo "<body>$rel_content</body>";
	$user->get_level_users($level);
	for($i=0;$i<$user->get_count();$i++)
	{
		$user->get_each_user($i);
		$username=$user->return_name();
		 $add=$user->return_mail();
		 //$add='redcross_cau@gmail.com';
		 echo $add;
		sent("$username","$add","$subject","<body>$rel_content</body>");
	}
	
	
?>