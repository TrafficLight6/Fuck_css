<?php
    // 普通帖子
    $username=$_COOKIE['name'];
    $time=date('Y-m-d H:i:s');
    $head=$username.'       '.$time;        //获取内容
    $title=$_POST['title'];
    $main=$_POST['review'];

    $fopen=fopen("../review/lib/normal/total.fcdb",'r');
    $number=fgets($fopen);                  //目前获取编号
    fclose($fopen);

    (integer)$number;
    $number+=1;
    (string)$number;

    $fopen=fopen("../review/lib/normal/total.fcdb",'w');
    fwrite($fopen,$number);                 //覆盖编号到编号储存文件
    fclose($fopen);

    mkdir("../review/lib/normal/".$number); //复制文件
    copy("../demo/review/normal/main.fcr","../review/lib/normal/".$number."/main.fcr");     
    copy("../demo/review/normal/title.fcr","../review/lib/normal/".$number."/title.fcr");
    copy("../demo/review/normal/head.fcr","../review/lib/normal/".$number."/head.fcr");
    mkdir("../review/lib/normal/".$number."/more");
    copy("../demo/review/normal/more/total.fcdb","../review/lib/normal/".$number."/more/total.fcdb");

    $fopen=fopen("../review/lib/normal/".$number."/head.fcr",'w');
    fwrite($fopen,$head);                   //写入头文件
    fclose($fopen);

    $fopen=fopen("../review/lib/normal/".$number."/title.fcr",'w');
    fwrite($fopen,$title);                   //写入标题
    fclose($fopen);

    $fopen=fopen("../review/lib/normal/".$number."/main.fcr",'w');
    fwrite($fopen,$main);                   //写入正文
    fclose($fopen);

    echo '<script type="text/javascript">window.location.href="/?show_code=5";</script>';
?>