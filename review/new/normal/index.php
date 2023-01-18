<?php
    if (((isset($_COOKIE['name']))and(isset($_COOKIE['level'])))==false){
        echo '<script type="text/javascript">alert("啊呀呀，本功能只开放给网站成员呢~~~~~");</script>';
        echo '<script type="text/javascript">window.location.href="../../../";</script>';
    }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="icon" href="../../../css/logo.ico">
<link href="https://unpkg.com/@wangeditor/editor@latest/dist/css/style.css" rel="stylesheet">
    <style>
      #editor—wrapper {
        border: 1px solid #ccc;
        z-index: 100; /* 按需定义 */
      }
      #toolbar-container { border-bottom: 1px solid #ccc; }
      #editor-container { height: 500px; }
    </style></head>
    <link href="../../../css/main.css">
    <title>Fuck css</title>
    <script src="./js/custom-elem.js"></script>
</head>
<body>
    <h1><i>FUCK CSS</i></h1>
    <pre><h3>Css+Div 实在是太难学了！所以本站没有div标签！所以本站会<del>   非常丑   </del>返璞归真</h3></pre>
    <h6>小声哔哔：我也想要一个漂亮的网站，有人贡献css源码吗？</h6>
    <hr>
    <a href="../../../">主页</a>-----------------<a href="../../../review/">所有帖子</a>-----------------<a href="#">超链接2</a>-----------------<a href="../..">永久页面</a>-----------------<a href="#">贡献源码</a>
    <pre>
    <form name="search" action="search/">搜索<input name="kw" type="text"><input type="submit" value="搜索"></form>                                                                                                                                                                        <?php include('../../../function_lib/log_or_not_log.php');sonson_page()?>
    </pre>

    <hr>
    <a href="../..">返回</a>


    <hr>
    <h1>新发帖子</h1>
    <strong>如果内容包含文件的请上传至第三方网盘处，并在文章中附上链接。在文章编辑器中的上传图片或视频文件是无效的（网络图片视频除外链接除外）</strong>
    <br>
    <br>
        <form name="new_review_n" method="POST" action="../../../function_lib/new_r_n.php" onsubmit="return mycheak()">
        <p>帖子标题（将会在文章中显示，无需再次在正文输入）<input type="text" name="title"></p>
        <demo-nav title="wangEditor get HTML"></demo-nav>
        <div class="page-container">
        <div class="page-left">
        <demo-menu></demo-menu>
        </div>
        <div class="page-right">
        <!-- 编辑器 DOM -->
        <!-- 编辑器 DOM -->
        <div style="border: 1px solid #ccc;">
        <div id="toolbar-container" style="border-bottom: 1px solid #ccc;"></div>
        <div id="editor-container" style="height: 500px"></div>
        </div>

        <!-- 显示内容 -->
        <div style="margin-top: 20px;">

        <p><textarea name="review" id="editor-content-textarea" style="width:0px; height:0px; outline: none;" readonly></textarea>
        <input type="submit" value="发布一条友善的帖子">
        </p>
        </form>


        
      </div>
    </div>
  </div>
      <script>
        function mycheak(){
            if  (new_review_n.title.value==""){
              alert("你的帖子的标题在哪？");return false;
            }
            if (new_review_n.review.value=="<p><br></p>"){
                alert("你的帖子在哪？");return false;
            }
        }
      </script>

<!--下面为富文本输入的配置代码-->




  <!-- <script src="https://cdn.jsdelivr.net/npm/@wangeditor/editor@latest/dist/index.min.js"></script> -->
  <script src="https://unpkg.com/@wangeditor/editor@latest/dist/index.js"></script>
<script>
  const { createEditor, createToolbar } = window.wangEditor
  
  const editorConfig = {
      placeholder: 'Type here...',
      onChange(editor) {
        const html = editor.getHtml()
        console.log('editor content', html)
        editor.getHtml()
        document.getElementById('editor-content-textarea').value = html
      }
  }
  
  const editor = createEditor({
      selector: '#editor-container',
      html: '<p><br></p>',
      config: editorConfig,
      mode: 'default', // or 'simple'
  })
  
  const toolbarConfig = {}
  
  const toolbar = createToolbar({
      editor,
      selector: '#toolbar-container',
      config: toolbarConfig,
      mode: 'default', // or 'simple'
  })
</script>



    <hr>

    <?php include('../../../function_lib/admin_page_show.php');sonson_show()?>


    <hr>
</body>
</html>