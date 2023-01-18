<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Fuck css</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/main.css'>
    <link rel="icon" href="../css/logo.ico">

</head>
<body>
    <h1><i>FUCK CSS</i></h1>
    <pre><h3>Css+Div 实在是太难学了！所以本站没有div标签！所以本站会<del>   非常丑   </del>返璞归真</h3></pre>
    <h6>小声哔哔：我也想要一个漂亮的网站，有人贡献css源码吗？</h6>
    <hr>
    <a href="..">返回</a>
    <hr>
    <form name="login" action="../" method="post" onsubmit="return mycheak()">
    <p>用户名<input name="username" type="text" size="30"></p>
    <p>密码<input name="password" type="password" size="30"></p>
    <p>三十天免登录<input name="set_cookies" type="checkbox" value="1">
    <p><input type="submit" value="登录"></p>
    </form>

    <script>
        function mycheak(){
            if (login.username.value==""){
                alert("用户名呢？(恼");login.focus();return false;
            }
            if (login.password.value==""){
                alert("密码呢？(恼");login.focus();return false;
            }
        }
    </script>



    <hr>





    <?php include('../function_lib/admin_page_show.php');son_show()?>


    <hr>
</body>
</html>