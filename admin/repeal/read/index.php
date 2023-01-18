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
    <a href="..">返回</a>----------<a href="#">账号管理</a>----------<a href="#">管理员管理</a>----------<a href="#">加入申请管理</a>
    </p>
    <hr>
    <!------------------------------------------------->
    <?php
    $username=$_GET["un"];
    $id=$_GET["r_id"];
    echo '<h1>'.$username.'的申诉</h1>';
    echo '<hr>';
    echo file_get_contents('../../../permanent_page/lib/repeal/report/'.$id."/main.fcr",'r');
    ?>
    <br>
    <p>你的处理结果</p>
    <form name="result" action="../../../function_lib/admin_cheak_repeal.php" onsubmit="return mycheak()">
        <p>申诉文章号<input name="id" type="text" value="<?php echo $_GET['r_id'];?>" readonly></p>
        <input name="res" type="radio" value="1">通过
        <input name="res" type="radio" value="0">不通过
        <h4>如果通过，请管理员立即<i>手动</i>减轻或撤销处罚</h4>
        <h3>如果是解封、缩短封禁时间的请和超管联系</h3>
        <p><input type="submit" value="提交结果"></p>
    </form>

    <script>
        function mycheak(){
            if (result.res.value==""){
                alert("请选择处理结果");result.focus();return false;
            }

        }
    </script>

</body>
</html>