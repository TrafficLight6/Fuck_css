<?php
    if ((isset($_COOKIE['name'])==false)and(isset($_COOKIE['level'])==false)){
        echo '<script type="text/javascript">alert("你没登录捏");</script>';
        echo '<script type="text/javascript">window.location.href="../login";</script>';
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Fuck css</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/main.css'>
    <link rel="icon" href="../css/logo.ico">

</head>
<body>
    <h1><i>FUCK CSS</i></h1>
    <pre><h3>Css+Div 实在是太难学了！所以本站没有div标签！所以本站会<del>   非常丑   </del>返璞归真</h3></pre>
    <h6>小声哔哔：我也想要一个漂亮的网站，有人贡献css源码吗？</h6>
    
    <hr>
    <a href="..">主页</a>-----------------<a href="../review/">所有帖子</a>-----------------<a href="#">超链接2</a>-----------------<a href="../permanent_page/">永久页面</a>-----------------<a href="#">贡献源码</a>

    <hr>
    <?php 
        echo '<h1>'.$_COOKIE['name'].'</h1>';
        echo '<i>等级-'.$_COOKIE['level'].'</i>';
        $c=$_COOKIE['level'];
        (float)$c;
        $c=number_format($c, 1, '.', '');
        if ($c==1){
            echo '----用户<br>';
        }elseif (($c>1)and($c<=2)){
            echo '----社区监督员<br>';
        }elseif (($c>2)and($c<=3)){
            echo '----社区管理员<br>';
        }elseif (($c>3)and($c<=4)){
            echo '----主管<br>';
        }elseif ($c=5){
            echo '----超级管理员<br>';
        }else{
            // no
        }
    ?>
    <a href="../?show_code=4">退出登录</a>
    <hr>

    <?php include('../function_lib/admin_page_show.php');son_show()?>
    <hr>
</body>
</html>