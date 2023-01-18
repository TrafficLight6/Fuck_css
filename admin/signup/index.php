<?php 
    if ((isset($_COOKIE['name']))and(isset($_COOKIE['level']))==false){
        echo '<script type="text/javascript">window.location.href="../";</script>';
    }else{
        $l=$_COOKIE['level'];
        (float)$l;
        $l=number_format($l, 2, '.','');
        if ($l<3){
            echo '<script type="text/javascript">window.location.href="../";</script>';
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Fuck css 管理页面</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/main.css'>
    <link rel="icon" href="../../css/logo.ico">
</head>
<body>
    <h1><i>Fuck css 后台管理</i></h1>
    <hr>
    <p>
    <a href="../repeal">处罚申诉</a>----------<a href="#">账号管理</a>----------<a href="#">管理员管理</a>----------<a href="..">返回</a>
    </p>
    <hr>
    <!------------------------------------------------->
    <?php
        $dir=scandir("../../signup/text");
        foreach($dir as $value){

            if (($value==".")or($value=="..")or($value=="total.fcdb")){
                continue;
            }else{

                $fopen_n=fopen('../../signup/text/'.$value."/username.fcr",'r');
                $username=fgets($fopen_n);                      //echo是谁的申诉
                fclose($fopen_n);
                
                echo '<p><a href="read?s_id='.$value.'&un='.$username.'">'.$username.'的加入申请</a></p>';
            }
        }
    ?>

</body>
</html>