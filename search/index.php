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

    <pre>
    <form name="search">搜索<input name="kw" type="text"><input type="submit" value="搜索"></form>                                                                                                                                                                        <?php include('../function_lib/log_or_not_log.php');son_page()?>
    </pre>

    <hr>

    <?php
        echo"<h2>标题关键字".$_GET["kw"]."的搜索结果:</h2>";
        $x=0;
        //管理贴
        $fopen=fopen('../review/lib/admin/total.fcdb','r');
        $atotal=fgets($fopen);
        fclose($fopen);
        if ((integer)$atotal>0){
            for($i=$atotal;$i>0;$i--){
                $fstr=$i;
                (string)$fstr;
                if (is_dir('../review/lib/admin/'.$fstr)){
                    $fopen=fopen('../review/lib/admin/'.$fstr.'/title.fcr','r');
                    $atitle=fgets($fopen);
                    fclose($fopen);                    
                    if (substr_count($atitle,$_GET["kw"])>0){
                        echo '<hr><h2><a href="../review/read?k=admin&rid='.$fstr.'">管理帖：'.$atitle.'</a></h2>';
                        $x++;
                    }
                }
            }
        }

        //普通帖
        $fopen=fopen('../review/lib/normal/total.fcdb','r');
        $atotal=fgets($fopen);
        fclose($fopen);
        if ((integer)$atotal>0){
            for($i=$atotal;$i>0;$i--){
                $fstr=$i;
                (string)$fstr;
                if (is_dir('../review/lib/normal/'.$fstr)){
                    $fopen=fopen('../review/lib/normal/'.$fstr.'/title.fcr','r');
                    $atitle=fgets($fopen);
                    fclose($fopen);                    
                    if (substr_count($atitle,$_GET["kw"])>0){
                        echo '<hr><h2><a href="../review/read?k=normal&rid='.$fstr.'">'.$atitle.'</a></h2>';
                        $x++;
                    }
                }
            }
        }
        if ($x==0){
            echo '<br><br><br><br><br><h2>哎呀！没有搜索结果呢，emmmmmmmmm（doge</h2><br><br><br><br><br><br><br><br><br><br><br>';
        }
    ?>

    <hr>

    <?php include('../function_lib/admin_page_show.php');son_show()?>
    <hr>
</body>
</html>