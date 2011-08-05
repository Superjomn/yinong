<?
/*
        PHPWIND中分离出来.略加以改造,使之使用更方便!
        不需要配置php.ini文件.通过fsock发邮件,速度还行.
        漠北怪叟做的发邮件的类.其实很简单只是把基本功能 装在类里面方便调用而已.
        我的QQ 4620498 欢迎大家改进
        
        做程序员.NND就是累啊,都不知明天在何方啊.
        
                                                                                2006.6.22

        调用方式
        
        //        
        sendemail('EMAIL','subject主题','content内容'[,'发件方式 0=为文本 1为HTML'] bool
        返回true 表示发件成功,否则为不成功!
        
        例:
        require("./inc/mail.inc.php");
        if (sendemail("hjc@mypcok.com","测试邮件发送@","这是一份用PHP发送的PHP测试邮件<br>以下是测试HTML的反映!")) echo "ok!";
        
                


*/
/*此行以下可以保存为为公用文件mail.inc.php,前提是设置好以下七个设置*/

$M_db= new Mailconfig(
        array(        
                'host'        => "http://localhost",                //发件服务器的地址
                'port'        => 8080,                                //发件服务器的端口一般默认为25                        
                'auth'        => "测试帐号",                        //发件人姓名
                'isck'        =>        1,                        //发件服务器需要密码验证 NND,现在的服务器基本都要验证的.
                'from'        => "supejom@gmail.com",                //发件人EMAIL
                'user'        => "root",                        //发件人帐号名称
                'pass'        => "root",                        //发件人帐号密码
        )
);
/*如果需要在发件时设置可将以下保存为公用文件mail.inc.php 上面七个变量在发件前设置.*/
Class Mailconfig {
        var $smtp;
        function Mailconfig($smtp=array()){
                $this->smtp['host'] = $smtp['host'];
                $this->smtp['port'] = $smtp['port'];
                $this->smtp['auth'] = $smtp['auth'];
                $this->smtp['isck'] = $smtp['isck'];
                $this->smtp['from'] = $smtp['from'];
                $this->smtp['user'] = $smtp['user'];
                $this->smtp['pass'] = $smtp['pass'];
        }
}
function sendemail($toemail,$subject,$message,$html=0){
        global $M_db,$sendtoname;
        $M_db->smtp['html']=$html;
        $db_charset="gb2312";

        if(!$fp=fsockopen($M_db->smtp['host'],$M_db->smtp['port'],&$errno,&$errstr,30))        return false;
        if(substr(fgets($fp,512),0,3)!="220") return false;
        if($M_db->smtp['isck']) {
                fwrite($fp,"EHLO mobeiguaishou qq4620498\r\n");
                while($rt=strtolower(fgets($fp,512))){
                        if(strpos($rt,"-")!==3 || empty($rt)){
                                break;
                        }elseif(strpos($rt,"2")!==0){
                                return false;
                        }
                }
                fwrite($fp, "AUTH LOGIN \r\n");
                if(substr(fgets($fp,512),0,3) != 334) return false;
                fwrite($fp, base64_encode($M_db->smtp['user'])." \r\n");
                if(substr(fgets($fp,512),0,3) != 334) return false;
                fwrite($fp, base64_encode($M_db->smtp['pass'])." \r\n");
                if(substr(fgets($fp,512),0,3) != 235) return false;
        } else {
                fwrite($fp, "HELO mobeiguaishou qq4620498\r\n");
        }
        $from = $M_db->smtp['from'];
        $from = preg_replace("/.*\<(.+?)\>.*/", "\\1", $from);
        fwrite($fp, "MAIL FROM: <$from>\r\n");
        if(substr(fgets($fp,512),0,3) != 250){
                return false;
        }
        fwrite($fp, "RCPT TO: <$toemail>\r\n");
        if(substr(fgets($fp,512),0,3) != 250){
                return false;
        }
        fwrite($fp, "DATA\r\n");
        if(substr(fgets($fp,512),0,3) != 354){
                return false;
        }
        $subject = str_replace("\n",' ',$subject);
        $msg  = "Date: ".Date("r")."\r\n";

        $msg .= "From: =?$db_charset?B?".base64_encode($M_db->smtp['auth'])."?=<$from>\r\n";
        $msg .= "To: =?$db_charset?B?".base64_encode($sendtoname)."?=<$toemail>\r\n";
        $msg .= "Subject: =?$db_charset?B?".base64_encode($subject)."?=\r\n";
        $msg .= "X-mailer: Php Auto SendMail for mobeiguaishou qq4620498\r\n";
        $msg .= "Mime-Version: 1.0\r\n";
        if ($M_db->smtp['html'])
                $msg .= "Content-Type: text/html;\r\n";
        else 
                $msg .= "Content-Type: text/plain;\r\n";
        $msg .= "\tcharset=\"$db_charset\"\r\n";
        $msg .= "Content-Transfer-Encoding: base64\r\n\r\n";
        $msg .= base64_encode($message)."\r\n.\r\n";
        fwrite($fp, $msg);
        fwrite($fp, "QUIT\r\n");
        fclose($fp);
        return true;
}
?>