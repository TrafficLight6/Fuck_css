<?php
    //作用记录审核结果
    $id=$_GET["sr_id"];
    include('mail/function.php');
    $signup_result=$_GET["res"];
    $username=file_get_contents('../signup/text/'.$id.'/username.fcr','r');
    $email=file_get_contents('../signup/text/'.$id.'/email.fcr','r');

    if ($signup_result=="1"){
        $password=file_get_contents('../signup/text/'.$id.'/password.fcr','r');
    
        $date=date("Y-m-d");
        include('con_mysql.php');
        mysqli_query($connID,"USE admin");
        $r=mysqli_query($connID,"INSERT INTO admin.user_table VALUES (DEFAULT,'".$username."','".$password."','".$email."','".$date."',DEFAULT,DEFAULT,DEFAULT,DEFAULT,DEFAULT,DEFAULT)");
        mysqli_query($connID,"USE admin;");
        $result=mysqli_query($connID,"SELECT id FROM admin.user_table WHERE username ='".$username."'");
        $array=mysqli_fetch_array($result);
        $user_id=$array['id'];
        pass_email($username,$email,$user_id,'admin_test');
        echo '<a href="../admin/signup">返回上一页</a>';
    }else {
        fail_email($username,$email,'admin_test');
        echo '<a href="../admin/signup">返回上一页</a>';
    }

    //删除目录及其内容
    $dir_array=scandir('../signup/text/'.$id);
    foreach($dir_array as $fpath){
        if (($fpath=='..')or($fpath=='.')){
            //no
        }else {
            unlink('../signup/text/'.$id.'/'.$fpath);
        }
    }
    rmdir('../signup/text/'.$id);
?>