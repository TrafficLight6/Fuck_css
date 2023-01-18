<?php
    function write_text($path,$str){
        // 后面的写入太烦了，待我写个函数
        $fopen=fopen($path,'w');
        fwrite($fopen,$str);                                           //写入用户名
        fclose($fopen);
    }


    //把数据倒进来
    @$username=$_POST["username"];
    @$email=$_POST["email"];
    @$password=md5($_POST["pwd"]);
    @$qa=$_POST["qa"];
    @$qb=$_POST["qb"];
    @$qc=$_POST["qc"];
    @$qd=$_POST["qd"];
    @$qe=$_POST["qe"];

    // 检测是否重名
    include('con_mysql.php');
    mysqli_query($connID,'USE admin');
    $result=mysqli_query($connID,'SELECT username FROM user_table WHERE username='.$username);
    if ($result!=false){
        //获取申请总数，进行编号操作
        $fopen=fopen("../signup/text/total.fcdb",'r');
        $number=fgets($fopen);                                              
        (integer)$number;
        $number+=1;                                                         
        (string)$number;
        $fopen=fopen("../signup/text/total.fcdb",'w');
        fwrite($fopen,$number);                                             
        fclose($fopen);

        mkdir("../signup/text/".$number);
        copy("../demo/signup/username.fcr","../signup/text/".$number."/username.fcr");
        copy("../demo/signup/email.fcr","../signup/text/".$number."/email.fcr");
        copy("../demo/signup/password.fcr","../signup/text/".$number."/password.fcr");
        copy("../demo/signup/qa.fcr","../signup/text/".$number."/qa.fcr");
        copy("../demo/signup/qb.fcr","../signup/text/".$number."/qb.fcr");
        copy("../demo/signup/qc.fcr","../signup/text/".$number."/qc.fcr");
        copy("../demo/signup/qd.fcr","../signup/text/".$number."/qd.fcr");
        copy("../demo/signup/qe.fcr","../signup/text/".$number."/qe.fcr");


        write_text("../signup/text/".$number."/username.fcr",$username);
        write_text("../signup/text/".$number."/email.fcr",$email);
        write_text("../signup/text/".$number."/password.fcr",$password);
        write_text("../signup/text/".$number."/qa.fcr",$qa);
        write_text("../signup/text/".$number."/qb.fcr",$qb);
        write_text("../signup/text/".$number."/qc.fcr",$qc);
        write_text("../signup/text/".$number."/qd.fcr",$qd);
        write_text("../signup/text/".$number."/qe.fcr",$qe);

        echo '<script type="text/javascript">alert("申请已提交");</script>';
        echo '<script type="text/javascript">window.location.href="..";</script>';
    }else{
        echo '<script type="text/javascript">alert("用户名重名力（悲");</script>';
        echo '<script type="text/javascript">window.location.href="../signup";</script>';
    }

?>