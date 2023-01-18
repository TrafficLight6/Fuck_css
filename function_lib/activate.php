<?php
    if (isset($_GET['userid'])){
        $uid=$_GET['userid'];
        include('con_mysql.php');
        mysqli_query($connID,"USE admin");
        $result=mysqli_query($connID,'SELECT activate FROM user_table WHERE id='.$uid);
        if ($result!=false){
            $array=mysqli_fetch_array($result);
            $aornot=$array['activate'];
        
            if ($aornot=='false'){
                mysqli_query($connID,"UPDATE admin.user_table SET activate='true' WHERE id=".$uid);
                sleep(3);
                echo '<script type="text/javascript">window.location.href="../?show_code=1";</script>';
            }else{
                echo '<script type="text/javascript">window.location.href="../?show_code=2";</script>';
            }
        }else{
            echo '<script type="text/javascript">window.location.href="../?show_code=3";</script>';
            }
    }
?>