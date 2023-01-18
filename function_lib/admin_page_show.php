<?php
    function main_show(){
        if ((isset($_COOKIE['username'])==false)and(isset($_COOKIE['level'])==false)){
            echo '<a href="#">备案号：********</a>';
        }else{
            $c=$_COOKIE['level'];
            (float)$c;
            $c=number_format($c, 1, '.', '');
            if($c>=3) {
                echo '<a href="#">备案号：********</a>--------------------<a href="admin">管理页面</a>';
            }else{
                echo '<a href="#">备案号：********</a>';    
            }
        }

        
    }

    function son_show(){
        if ((isset($_COOKIE['username'])==false)and(isset($_COOKIE['level'])==false)){
            echo '<a href="#">备案号：********</a>';
        }else{
            $c=$_COOKIE['level'];
            (float)$c;
            $c=number_format($c, 1, '.', '');
            if($c>=3) {
                echo '<a href="#">备案号：********</a>--------------------<a href="../admin">管理页面</a>';
            }else{
                echo '<a href="#">备案号：********</a>';    
            }
        }

        
    }

    function rr_show(){
        if ((isset($_COOKIE['username'])==false)and(isset($_COOKIE['level'])==false)){
            echo '<a href="#">备案号：********</a>';
        }else{
            $c=$_COOKIE['level'];
            (float)$c;
            $c=number_format($c, 1, '.', '');
            if($c>=3) {
                echo '<a href="#">备案号：********</a>--------------------<a href="../../admin">管理页面</a>';
            }else{
                echo '<a href="#">备案号：********</a>';    
            }
        }

        
    }

    function sonson_show(){
        if ((isset($_COOKIE['username'])==false)and(isset($_COOKIE['level'])==false)){
            echo '<a href="#">备案号：********</a>';
        }else{
            $c=$_COOKIE['level'];
            (float)$c;
            $c=number_format($c, 1, '.', '');
            if($c>=3) {
                echo '<a href="#">备案号：********</a>--------------------<a href="../../../admin">管理页面</a>';
            }else{
                echo '<a href="#">备案号：********</a>';    
            }
        }

        
    }

?>