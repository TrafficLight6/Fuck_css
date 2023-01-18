<?php
    $rid=$_GET['rid'];
    $mode=$_GET['k']
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Fuck css</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/main.css'>
    <link rel="icon" href="../css/logo.ico">
    <link rel="icon" href="../../../css/logo.ico">
    <link href="https://unpkg.com/@wangeditor/editor@latest/dist/css/style.css" rel="stylesheet">
    <style>
      #editor—wrapper {
        border: 1px solid #ccc;
        z-index: 100; /* 按需定义 */
      }
      #toolbar-container { border-bottom: 1px solid #ccc; }
      #editor-container { height: 500px; }
    </style>
</head>
<body>
    <h1><i>FUCK CSS</i></h1>
    <pre><h3>Css+Div 实在是太难学了！所以本站没有div标签！所以本站会<del>   非常丑   </del>返璞归真</h3></pre>
    <h6>小声哔哔：我也想要一个漂亮的网站，有人贡献css源码吗？</h6>
    <hr>
    <a href="../..">返回主页</a>--------<a href="..">返回所有帖子页面</a>
    <hr>
    <?php
    $file='../lib';
    if (($mode=='normal')or($mode=='admin')){
        $file=$file.'/'.$mode.'/'.$rid;
        if (is_dir($file)){
            $ftitle=$file.'/title.fcr';
            $fopen=fopen($ftitle,'r');
            $title=fgets($fopen);
            fclose($fopen);

            $ftitle=$file.'/head.fcr';
            $fopen=fopen($ftitle,'r');
            $head=fgets($fopen);
            fclose($fopen);

            $ftitle=$file.'/main.fcr';
            $fopen=fopen($ftitle,'r');
            $main=fgets($fopen);
            fclose($fopen);

            echo '<h1>'.$title.'</h1>';
            if ($mode=='normal'){
                echo '<p>作者：'.$head.'</p>';

                if ((isset($_COOKIE['name']))and($_COOKIE['level'])){
                    $array=explode(' ',$head);
                    $l=$_COOKIE['level'];
                    (float)$l;
                    $l=number_format($l, 1, '.', '');
                    if(($_COOKIE['name']==$array[0])or($l>=3)){    
                        echo '<a href="/function_lib/del.php?dk=m&rk=normal&rid='.$rid.'">删除</a><hr>';
                    }else{
                        echo '<hr>';
                    }
            }
            }else{
                echo '<p>管理员：'.$head.'</p><hr>';
                if ((isset($_COOKIE['name']))and($_COOKIE['level'])){
                    $array=explode(' ',$head);
                    $l=$_COOKIE['level'];
                    (float)$l;
                    $l=number_format($l, 1, '.', '');
                    if (($_COOKIE['name']==$array[0])or($l>=4)){
                        echo '<a href="/function_lib/del.php?dk=m&rk=admin&rid='.$rid.'">删除</a><hr>';
                    }else{
                        echo '<hr>';
                    }
                }
            }
            $result=true;
        }else{
            echo '<h1>未找到帖子捏</h1><br><br><br><br><br><br>';
            $result=false;
        }
    }else{
        echo '<h1>未找到帖子捏</h1><br><br><br><br><br><br>';
        $result=false;
    }
    ?>

    <?php
        if (($result)){
            echo $main;
            if ($mode=='normal'){                       
                echo '<hr><h2>跟帖</h2>';
                if ((isset($_COOKIE['name']))and(isset($_COOKIE['level']))){//富文本编辑器
                    echo '
                    <h4>切勿在留言板上传文件，因为上传的文件将不会保存在本站（网络图片视频除外链接除外）                    </h4>
                    <script src="https://unpkg.com/@wangeditor/editor@latest/dist/index.js"></script>
                    <demo-nav title="wangEditor get HTML"></demo-nav>
                    <div class="page-container">
                    <div class="page-left">
                    <demo-menu></demo-menu>
                    </div>
                    <div class="page-right">
                    <div style="border: 1px solid #ccc;">
                    <div id="toolbar-container" style="border-bottom: 1px solid #ccc;"></div>
                    <div id="editor-container" style="height: 500px"></div>
                    </div>
                    <div style="margin-top: 20px;">
                    <form name="reply" method="POST" action="/function_lib/reply.php?rid='.$rid.'" onsubmit="return mycheak()">
                    <p><textarea name="replymain" id="editor-content-textarea" style="width:0px; height:0px; outline: none;" readonly></textarea></p>';
                    if ($l>1){
                        echo '<p>以管理的名义发帖<input name="admin" type="checkbox" value=1></p>';
                    }
                    echo '<p><input type="submit" value="发一条友善的回帖"></p>
                    </form>
                    <script>
                    function mycheak(){
                        if (reply.replymain.value=="<p><br></p>"){
                            alert("你的回帖子在哪？");return false;
                        }
                    }
                    </script>
                    <script>const { createEditor, createToolbar } = window.wangEditor
                    const editorConfig = {
                        placeholder: "Type here...",
                        onChange(editor) {
                          const html = editor.getHtml()
                          console.log("editor content", html)
                          editor.getHtml()
                          document.getElementById("editor-content-textarea").value = html
                        }
                    }
                    const editor = createEditor({
                        selector: "#editor-container",
                        html: "<p><br></p>",
                        config: editorConfig,
                        mode: "default", // or simple
                    })
                    const toolbarConfig = {}
                    const toolbar = createToolbar({
                        editor,
                        selector: "#toolbar-container",
                        config: toolbarConfig,
                        mode: "default", // or "simple"
                    })</script>
                    ';
                }
                $refopen=fopen('../../review/lib/normal/'.$rid.'/more/total.fcdb','r');
                $retotal=fgets($refopen);
                fclose($refopen);
                (integer)$retotal;

                for ($i=$retotal;$i>=1;$i--){
                        $num=$i;
                        (string)$num;
                    if (is_dir('../../review/lib/normal/'.$rid.'/more/'.$num)){
                        $refopen=fopen('../../review/lib/normal/'.$rid.'/more/'.$num.'/reply.fcr','r');
                        $remain=fgets($refopen);
                        fclose($refopen);
                        echo '<hr>';
                        echo '<p>'.$num.'楼</p>';
                        echo $remain;
                        if (((isset($_COOKIE['name']))and($_COOKIE['level']))){
                            $array=explode('h2>',$remain);
                            $str=$array[0];
                            $array=explode('<',$str);
                            $str=$array[0];
                            $array=explode('/',$str);
                            $str=$array[0];
                            if (($_COOKIE['name']==$str)or($l>=3)){
                                echo '<a href="/function_lib/del.php?dk=r&rid='.$rid.'&replyid='.$num.'">删除</a>';
                            }
                    }
                    }else{
                        echo '<hr><p>'.$num.'楼被吃掉了</p>';
                    }
                }
            }
        }
    ?>
    <hr>

    <?php include('../../function_lib/admin_page_show.php');rr_show()?>

    <hr>
</body>
</html>