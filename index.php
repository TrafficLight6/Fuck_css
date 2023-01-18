<?php 
    if (isset($_POST['username'])){
    include('function_lib/login.php');
    login($_POST['username'],$_POST['password']);
    }
    if (isset($_GET['show_code'])){
    if ($_GET['show_code']=='1') {
        echo'<script>alert("账号已激活");</script>';
    }

    if ($_GET['show_code']=='2'){
        echo'<script>alert("账号曾被激活，无法重复激活");</script>';
    }
    if ($_GET['show_code']=='3'){
        echo'<script>alert("账号激活失败");</script>';
    }
    if ($_GET['show_code']=='4'){
        include('function_lib/kill_cookie.php');
        kill_c();
    }
    if ($_GET['show_code']=='5'){
        echo'<script>alert("已发布");</script>';
    }
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
    <link rel="icon" href="css/logo.ico">

</head>
<body>
    <h1><i>FUCK CSS</i></h1>
    <pre><h3>Css+Div 实在是太难学了！所以本站没有div标签！所以本站会<del>   非常丑   </del>返璞归真</h3></pre>
    <h6>小声哔哔：我也想要一个漂亮的网站，有人贡献css源码吗？</h6>
    <hr>
    
    <a href=".">主页</a>-----------------<a href="/review/">所有帖子</a>-----------------<a href="#">超链接2</a>-----------------<a href="permanent_page/">永久页面</a>-----------------<a href="#">贡献源码</a>
    
    <pre>
    <form name="search" action="search/">搜索<input name="kw" type="text"><input type="submit" value="搜索"></form>                                                                                                                                                                        <?php include('function_lib/log_or_not_log.php');main_page()?>
    </pre>




    <hr>
    <h2>管理员发贴</h2>
    <p><a href="/review/new/admin/">发布新管理帖</a></p><br>
    <?php
            $adir=scandir("review/lib/admin",1);

            $afopen=fopen('review/lib/admin/total.fcdb','r');
            $amax_num=fgets($afopen);
            fclose($afopen);

            (integer)$amax_num;
            $amin_num=$amax_num-8;        //一次显示的数量
            foreach($adir as $avalue){
    
                if (($avalue==".")or($avalue=="..")or($avalue=="total.fcdb")){
                    continue;
                }else{
                    
                    if (is_dir($atitle_p="review/lib/admin/".$avalue)){
                        (integer)$avalue;
                        if (($avalue>=$amin_num)){
                            (string)$avalue;
                            $atitle_p="review/lib/admin/".$avalue."/title.fcr";
                            $afopen=fopen($atitle_p,'r');
                            $atitle=fgets($afopen);
                            fclose($afopen);
                            echo '<h3><a href="review/read?k=admin&rid='.$avalue.'">'.$atitle."</a></h3>";
                        }else{
                            (string)$avalue;
                        }
                    }else{
                        echo '<h3>帖子已被删除，编号：a'.$avalue.'</h3>';
                    }
                }
            }
    ?>
    <hr>
    <h2>新发帖</h2>
    <p><a href="/review/new/normal/">发布新帖</a></p><br>
    <?php
            $dir=scandir("review/lib/normal",1);

            $fopen=fopen('review/lib/normal/total.fcdb','r');
            $max_num=fgets($fopen);
            fclose($fopen);

            (integer)$max_num;
            $min_num=$max_num-8;        //一次显示的数量
            foreach($dir as $value){
    
                if (($value==".")or($value=="..")or($value=="total.fcdb")){
                    continue;
                }else{
                    
                    if (is_dir($title_p="review/lib/normal/".$value)){
                        (integer)$value;
                        if (($value>=$min_num)){
                            (string)$value;
                            $title_p="review/lib/normal/".$value."/title.fcr";
                            $fopen=fopen($title_p,'r');
                            $title=fgets($fopen);
                            fclose($fopen);
                            echo '<h3><a href="review/read?k=normal&rid='.$value.'">'.$title."</a></h3>";
                        }else{
                            (string)$value;
                        }
                    }else{
                        echo '<h3>帖子已被删除，编号：n'.$value.'</h3>';
                    }
                }
            }
    ?>
    <hr>
    <?php include('function_lib/admin_page_show.php');main_show()?>


    <hr>
</body>
</html>