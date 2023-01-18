<?php
    $rid=$_GET['rid'];
    $main=$_POST['replymain'];
    if (isset($_POST['admin'])){
        $adminmod=true;
    }else{
        $adminmod=false;
    }
    $time=date('Y-m-d H:i:s');
    if (isset($_COOKIE['name'])){
        $name=$_COOKIE['name'];
    }
    if (is_dir('../review/lib/normal/'.$rid)){
        $fopen=fopen('../review/lib/normal/'.$rid.'/more/total.fcdb','r');
        $total=fgets($fopen);
        fclose($fopen);

        (integer)$total;
        $total=$total+1;
        (string)$total;
        
        $fopen=fopen('../review/lib/normal/'.$rid.'/more/total.fcdb','w');
        fwrite($fopen,$total);
        fclose($fopen);

        mkdir('../review/lib/normal/'.$rid.'/more/'.$total);
        copy('../demo/review/normal/more/number/reply.fcr','../review/lib/normal/'.$rid.'/more/'.$total.'/reply.fcr');

        $rrrep='<h2>'.$name.'</h2><i>'.$time.'</i><p>'.$main.'</p>';
        if ($adminmod){
            $rep='<h2><span style="color: rgb(106, 57, 201);">管理员：</span></h2>'.$rrrep;
        }else{
            $rep=$rrrep;
        }
        $fopen=fopen('../review/lib/normal/'.$rid.'/more/'.$total.'/reply.fcr','w');
        fwrite($fopen,$rep);
        fclose($fopen);

        echo '<script type="text/javascript">alert("已留言");</script>';
        echo '<script type="text/javascript">window.location.href="/review/read?k=normal&rid='.$rid.'";</script>';
    }else{
        echo '<script type="text/javascript">alert("啊呀呀，你在不存在的贴子里留言呢~~~~~");</script>';
        echo '<script type="text/javascript">window.location.href="/";</script>';
    }
?>