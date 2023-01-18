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
    </style>
    <link href="../../../css/main.css">
    <title>Fuck css</title>
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
    <h1>申诉页面</h1>
    <p>书写申诉材料，是为了减轻或撤销处罚，懂？</p>
    <p>申诉材料内容一定要有：</p>
    <ul type="must">
        <li>目前的处罚结果</li>
        <li>证据，以证明某些事实，如截图等；</li>
        <li>事情的缘由；</li>
        <li>你希望的申诉结果</li>
    </ul>
    <p>以上缺一不可，否则申诉将不通过。</p>
    <h3>如果你是来找茬的将会当不服从和顶撞管理处理（见处罚条例B款第叁和第肆部分）。</h3>
    <strong>严禁抄袭、套作申诉文稿，违者的申诉将定为不通过，严重的将剥夺此次处罚的申诉权利</strong>
    <p>字数不限</p>
    <strong>如果申诉内容包含图片、视频等文件的请上传至第三方网盘处，并在文章中附上链接。在文章编辑器中的上传图片或视频文件是无效的（链接除外）</strong>
    <br>
    <br>




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

        <br>
        <br>
        <br>
        <form name="repeal" method="POST" action="../../../function_lib/repeal.php" onsubmit="return mycheak()">
        <p>用户名<input name="username" type="text" size="30"></p>
        <p><textarea name="report" id="editor-content-textarea" style="width:0px; height:0px; outline: none;" readonly></textarea></p>
        <p>密码<input name="password" type="password" size="30"></p>
        <p><input type="submit" value="提交申诉申请"></p>
        </form>


        
      </div>
      </div>
      </div>


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