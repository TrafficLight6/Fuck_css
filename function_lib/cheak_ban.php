<?php
    function cheak_ban($username){
        include('con_mysql.php');
        mysqli_query($connID,'USE admin');
        $result=mysqli_query($connID,"SELECT ban,ban_date,activate FROM user_table WHERE username='".$username."'");
        $array=mysqli_fetch_array($result);
        $ban=$array['ban'];
        $ban_date=$array['ban_date'];
        $act=$array['activate'];
        if ($ban=='true'){
            $ban_date=$ban_date.' '.date('H:i:s');
            $now_date=date('Y-m-d H:i:s');
            if (strtotime($ban_time)-strtotime($now_date)<0) {
                // 解封
                mysqli_query($connID,"UPDATE admin.user_table SET ban='false' WHERE username='".$username."'");
                mysqli_query($connID,"UPDATE admin.user_table SET ban_time=null WHERE username='".$username."'");
                $f_result=3;
            }else {
                // 封禁
            $f_result=1;
            }
        }elseif ($act=='false'){
            $f_result=2;
        }else{
            $f_result=3;
        }
        return $f_result;
    }
?>