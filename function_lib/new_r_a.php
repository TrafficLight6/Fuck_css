<?php
    // 普通帖子
    $username=$_COOKIE['name'];
    $time=date('Y-m-d H:i:s');
    $head=$username.'       '.$time;        //获取内容
    $title=$_POST['title'];
    $main=$_POST['review'];

    $fopen=fopen("../review/lib/admin/total.fcdb",'r');
    $number=fgets($fopen);                  //目前获取编号
    fclose($fopen);

    (integer)$number;
    $number+=1;
    (string)$number;

    $fopen=fopen("../review/lib/admin/total.fcdb",'w');
    fwrite($fopen,$number);                 //覆盖编号到编号储存文件
    fclose($fopen);

    mkdir("../review/lib/admin/".$number); //复制文件
    copy("../demo/review/admin/main.fcr","../review/lib/admin/".$number."/main.fcr");     
    copy("../demo/review/admin/title.fcr","../review/lib/admin/".$number."/title.fcr");
    copy("../demo/review/admin/head.fcr","../review/lib/admin/".$number."/head.fcr");

    $fopen=fopen("../review/lib/admin/".$number."/head.fcr",'w');
    fwrite($fopen,$head);                   //写入头文件
    fclose($fopen);

    $fopen=fopen("../review/lib/admin/".$number."/title.fcr",'w');
    fwrite($fopen,$title);                   //写入标题
    fclose($fopen);

    $fopen=fopen("../review/lib/admin/".$number."/main.fcr",'w');
    fwrite($fopen,$main);                   //写入正文
    fclose($fopen);

    echo '<script type="text/javascript">window.location.href="/?show_code=5";</script>';
?>