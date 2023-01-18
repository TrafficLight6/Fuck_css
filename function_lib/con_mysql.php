<?php
    
    $host="127.0.0.1";      //数据库主机
    
    $dbname="admin";        //数据库名称
    
    $sql_username="admin";      //数据库用户名
    
    $sql_password="123456"; //数据库密码
    
    $sql_post=3306;         //数据库端口，MySql默认是3306





    if ($connID = mysqli_connect($host,$sql_username,$sql_password,$dbname,$sql_post)){
        //no
    }else{
        echo"<script>alert('MySQL is wrong');</script>";
    }



?>