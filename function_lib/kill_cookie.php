<?php
    function kill_c(){
        if ((isset($_COOKIE['name']))and(isset($_COOKIE['level']))){
            setcookie('name','',time()-10);
            setcookie('level','',time()-10);
        }
        echo '<script type="text/javascript">window.location.href="/";</script>';
    }
?>