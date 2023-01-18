<?php
    function main_page(){
        //主页
        if ((isset($_COOKIE['name']))and(isset($_COOKIE['level']))){
            echo '<a href="aboutme">'.$_COOKIE['name'].'</a>';
        }else {
            echo '<a href="login/">登录</a>------<a href="signup/">加入本站</a>';
        }
    }

    function son_page(){
        //搜索页
        if ((isset($_COOKIE['name']))and(isset($_COOKIE['level']))){
            echo '<a href="../aboutme">'.$_COOKIE['name'].'</a>';
        }else {
            echo '<a href="../login/">登录</a>------<a href="../signup/">加入本站</a>';
        }  
    }

    function sonson_page(){
        //永久页
        if ((isset($_COOKIE['name']))and(isset($_COOKIE['level']))){
            echo '<a href="../../../aboutme">'.$_COOKIE['name'].'</a>';
        }else {
            echo '<a href="../../../login/">登录</a>------<a href="../../../signup/">加入本站</a>';
        }  
    }
?>