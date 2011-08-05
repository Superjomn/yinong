<?php    
   
// 使用PHPMailer发送邮件实例，126邮箱    
//Script by Code52.net    
//代码吾爱，Be a happy coder.    
   
include("class.phpmailer.php");    
include("class.smtp.php"); // 可选    
   
$mail              = new PHPMailer();    
   
//$body              = $mail->getFile('contents.html');//邮件正文内容，提取html文件为其内容    
//$body              = eregi_replace("[\]",'',$body);    
$body='<html><body>hello </body></html>';   
$mail->IsSMTP();    
$mail->SMTPAuth    = true;                  // 必填，SMTP服务器是否需要验证，true为需要，false为不需要    
$mail->Host        = "smtp.126.com";      //必填，设置SMTP服务器    
//$mail->Port        = 25;                    // 设置端口    
   
$mail->Username    = "redcross_cau@126.com";  // 必填，开通SMTP服务的邮箱；任意一个126邮箱均可    
$mail->Password    = "010100083";            //必填， 以上邮箱对应的密码    
   
$mail->From        = "redcross_cau@126.com";    //必填，发件人Email    
$mail->FromName    = "Superjom";              //必填，发件人昵称或姓名    
$mail->Subject     = "This is the subject";       //必填，邮件标题（主题）    
$mail->AltBody     = "This is the body when user views in plain text format"; //可选，纯文本形势下用户看到的内容    
$mail->WordWrap    = 50; // 自动换行的字数    
   
$mail->MsgHTML($body);    
   
$mail->AddReplyTo("redcross_cau@126.com","Webmaster");//回复邮箱地址       
$mail->AddAddress("superjom@gmail.com","First Last");//参数一：收信人的邮箱地址，可添加多个。参数二：收件人称呼    
   
$mail->IsHTML(true); // 是否以HTML形式发送，如果不是，请删除此行    
   
if(!$mail->Send()) {    
  echo "Mailer错误: " . $mail->ErrorInfo;    
} else {    
  echo "邮件发送成功";    
}    
   
?>  