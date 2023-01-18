<?php
    //函数用处：验证用户密码和用户名
    //A处是把密码明文转化成MD5加密字符串
    //B处为执行MySql数据查询，要用户名和密码密文相同才有返回数组
    //C处为获取返回数组到两个变量里，如果B处查无此人，则变量为null，查出此人就返回用户名和密码密文
    //D处为判断是否查有此人，查无此人（C处返回为null）就返回false，查有此人（C处返回有用户名和密码密文）就返回true
    //E处为关闭MySql连接


    function cheak_pwd($un,$pwd){
        
        $rpwd=md5($pwd);                           //A处
      
        include("con_mysql.php");
        mysqli_query($connID,"USE admin");         //B处
        $result=mysqli_query($connID,"SELECT username,password FROM user_table WHERE username = '".$un."' AND password = '".$rpwd."'");
        $array=mysqli_fetch_array($result);
      
        @$password= $array["username"];            //C处
        @$username= $array["password"];
      
        if (($password==null) or ($username==null)) {
            return false;                          //D处
        }else{
            return true;
        }

        mysqli_close($connID);                      //E处
    }
?>