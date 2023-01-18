<?php
    include('cheak_password.php');

    @$username=$_POST["username"];
    @$md5_password=$_POST["password"];
    @$main=$_POST["report"];

    $cheak=cheak_pwd($username,$md5_password);                          //身份验证
    if ($cheak){

        $fopen=fopen("../permanent_page/lib/repeal/report/total.fcdb",'r');
        $number=fgets($fopen);                                              //目前获取编号
        fclose($fopen);

        (integer)$number;
        $number+=1;                                                         //新编号
        (string)$number;

        $fopen=fopen("../permanent_page/lib/repeal/report/total.fcdb",'w');
        fwrite($fopen,$number);                                             //覆盖编号到编号储存文件
        fclose($fopen);
    
        mkdir("../permanent_page/lib/repeal/report/".$number);
        copy("../demo/repeal/main.fcr","../permanent_page/lib/repeal/report/".$number."/main.fcr");     //复制文件
        copy("../demo/repeal/username.fcr","../permanent_page/lib/repeal/report/".$number."/username.fcr");

        $fopen=fopen("../permanent_page/lib/repeal/report/".$number."/username.fcr",'w');
        fwrite($fopen,$username);                                           //写入用户名
        fclose($fopen);

        $fopen=fopen("../permanent_page/lib/repeal/report/".$number."/main.fcr",'w');
        fwrite($fopen,$main);                                               //写入申诉正文
        fclose($fopen);

        echo '申诉已提交';
        echo '<a href="../">返回主页</a>';
    }else{
        echo '<script type="text/javascript">alert("密码输入错误");</script>';
        echo '<script type="text/javascript">window.location.href="../permanent_page/lib/repeal";</script>';
    }
?>