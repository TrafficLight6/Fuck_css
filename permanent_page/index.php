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
    
    <a href="..">主页</a>-----------------<a href="#">所有帖子</a>-----------------<a href="#">超链接2</a>-----------------<a href=".">永久页面</a>-----------------<a href="#">贡献源码</a>

    <hr>

    <?php
        $dir=scandir("./lib");
        foreach($dir as $value){

            if (($value==".")or($value=="..")){
                continue;
            }else{
                $title_p="lib/".$value."/title.fcpt";
                $fopen=fopen($title_p,'r');
                $title=fgets($fopen);
                fclose($fopen);
                echo '<a href="lib/'.$value.'">'.$title."</a>";
                echo"<br>";
            }
        }
    ?>

    <hr>

    <a href="../admin">管理页面</a>
    <hr>
</body>
</html>