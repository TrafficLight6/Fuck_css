<?php
    function login($username,$password){
    
        include("cheak_password.php");
        include("cheak_ban.php");
        include("get_level.php");

        if (count($_POST)==2){
            $mck=false;
        }else{
            $mck=true;
        }


        if (cheak_pwd($username,$password)) {
            $cb_r=cheak_ban($username);
            if ($cb_r==1){
                echo '<script type="text/javascript">alert("账号已被封禁");</script>';//被ban
            }elseif ($cb_r==2){
                echo '<script type="text/javascript">alert("账号未激活");</script>';//未激活
            }else{
                $level=level($username);
                  //成功
                if ($mck) {
                    echo '<script type="text/javascript">alert("登录成功，本次登录状态将持续30天");</script>';
                    setcookie('level',$level,time()+30*24*60*60,'/');
                    setcookie('name',$username,time()+30*24*60*60,'/');
                    echo '<script type="text/javascript">window.location.href="../";</script>';
                }else {
                    echo '<script type="text/javascript">alert("登录成功，本次登录状态将持续1小时");</script>';
                    setcookie('level',$level,time()+1*60*60,'/');
                    setcookie('name',$username,time()+1*60*60,'/');
                    echo '<script type="text/javascript">window.location.href="../";</script>';
                }
            }
        }else {
            echo '<script type="text/javascript">alert("用户名或密码错误");</script>';
            echo '<script type="text/javascript">window.location.href="/login?r=0";</script>';  //用户名或密码错误
        }
    }
?>