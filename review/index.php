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
    <a href="..">主页</a>-----------------<a href=".">所有帖子</a>-----------------<a href="#">超链接2</a>-----------------<a href="../permanent_page/">永久页面</a>-----------------<a href="#">贡献源码</a>
    <pre>
    <form name="search" action="../search/">搜索<input name="kw" type="text"><input type="submit" value="搜索"></form>                                                                                                                                                                        <?php include('../function_lib/log_or_not_log.php');son_page()?>
    </pre>

    <hr>
    <h2><a href="new/admin/">发新管理帖</a>--------------------<a href="new/normal/">发新帖</a></h2>
    <hr>
    <?php
        if (isset($_GET['all_k'])==false){
            echo '<h2><a href="./?all_k=1">管理员帖子</a></h2>';
            echo '<h2><a href="./?all_k=2">普通帖子</a></h2>';
        }else {
            if ($_GET['all_k']=='1') {
                $fopen=fopen('lib/admin/total.fcdb','r');
                $total=fgets($fopen);
                fclose($fopen);
                (integer)$total;
                if ($total==0) {
                    echo '<h1>啊呀呀！没有帖子呢！</h1><br><br><br><br><br><br><br><br><br><br><br><br>';
                }else{
                    $all=0;
                    for ($i=$total;$i>0; $i--) { 
                        $str_id=$i;
                        (string)$str_id;
                        if (is_dir('lib/admin/'.$str_id)) {
                            $fopen=fopen('lib/admin/'.$str_id.'/title.fcr','r');
                            $title=fgets($fopen);
                            $close=fclose($fopen);

                            echo '<p><a href="read/?k=admin&rid='.$str_id.'">'.$title.'</a></p>';
                            $all++;
                        }
                    }
                    if ($all==0){
                        echo '<h1>啊呀呀！没有帖子呢！</h1><br><br><br><br><br><br><br><br><br><br><br><br>';   
                    }
                }
            }elseif($_GET['all_k']=='2'){
                $fopen=fopen('lib/normal/total.fcdb','r');
                $total=fgets($fopen);
                fclose($fopen);
                (integer)$total;
                if ($total==0) {
                    echo '<h1>啊呀呀！没有帖子呢！</h1><br><br><br><br><br><br><br><br><br><br><br><br>';
                }else{
                    $all=0;
                    for ($i=$total;$i>0; $i--) { 
                        $str_id=$i;
                        (string)$str_id;
                        if (is_dir('lib/normal/'.$str_id)) {
                            $fopen=fopen('lib/normal/'.$str_id.'/title.fcr','r');
                            $title=fgets($fopen);
                            $close=fclose($fopen);

                            echo '<p><a href="read/?k=normal&rid='.$str_id.'">'.$title.'</a></p>';
                            $all++;
                        }
                    }
                    if ($all==0){
                        echo '<h1>啊呀呀！没有帖子呢！</h1><br><br><br><br><br><br><br><br><br><br><br><br>';   
                    }
                }

            }
        }
    ?>
    <hr>

    <?php include('../function_lib/admin_page_show.php');son_show()?>

    <hr>
</body>
</html>