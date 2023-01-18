<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Fuck css 管理页面</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/main.css'>
    <link rel="icon" href="../../../css/logo.ico">
</head>
<body>
    <h1><i>Fuck css 后台管理</i></h1>
    <hr>
    <p>
    <a href="..">返回</a>----------<a href="#">账号管理</a>----------<a href="#">管理员管理</a>----------<a href="#">永久页面管理</a>----------<a href="#">加入申请管理</a>
    </p>
    <hr>
    <!------------------------------------------------->
    <?php
    function s_read($id,$whice){
        $str=file_get_contents('../../../signup/text/'.$id.'/'.$whice.'.fcr','r');
        $result='<p>'.$str.'</p>';
        return $result;
    }
    $username=$_GET["un"];
    $id=$_GET["s_id"];
    echo '<h1>'.$username.'加入申请</h1>';
    echo '<hr>';
    echo '<h3>问题一的回答</h3>';
    echo s_read($id,'qa');
    echo '<h3>问题二的回答</h3>';
    echo s_read($id,'qb');
    echo '<h3>问题三的回答</h3>';
    echo s_read($id,'qc');
    echo '<h3>问题四的回答</h3>';
    echo s_read($id,'qd');
    echo '<h3>自我介绍的文章</h3>';
    echo s_read($id,'qe');
    
    ?>
    <br>
    <p>你的审核结果</p>
    <form name="result" action="../../../function_lib/cheak_signup.php" onsubmit="return mycheak()">
        <p>审批文章号<input name="sr_id" type="text" readonly value="<?php echo $id ?>"></p>
        <input name="res" type="radio" value="1">通过
        <input name="res" type="radio" value="0">不通过
        <p><input type="submit" value="提交结果"></p>
    </form>

    <script>
        function mycheak(){
            if (result.res.value==""){
                alert("请选择审核结果");result.focus();return false;
            }

        }
    </script>

</body>
</html>