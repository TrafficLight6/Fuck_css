<?php 
    function level($username){
    include('con_mysql.php');
    mysqli_query($connID,'USE admin');
    $result=mysqli_query($connID,"SELECT class FROM user_table WHERE username='".$username."'");
    $array=mysqli_fetch_array($result);
    $end=$array['class'];
    return $end;
    }
?>