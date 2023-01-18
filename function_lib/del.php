<?php
    $del_kind=$_GET['dk'];
    if (isset($_GET['rk'])){
        $review_kind=$_GET['rk'];
    }
    if (isset($_GET['replyid'])){
        $reply_id=$_GET['replyid'];
    }
    $review_id=$_GET['rid'];

    $l=$_COOKIE['level'];
    (float)$l;
    $l=number_format($l, 1, '.', '');

    if ($del_kind=='m'){
        if ($review_kind=='normal'){          //普通帖
            if (is_dir('../review/lib/normal/'.$review_id)){ 
                    $dir=scandir('../review/lib/normal/'.$review_id.'/more');
                    foreach ($dir as $value){
                        if (($value==".")or($value=="..")){
                            continue;
                        }else{
                            if ($value=='total.fcdb'){
                                unlink('../review/lib/normal/'.$review_id.'/more/total.fcdb');
                            }else{
                                unlink('../review/lib/normal/'.$review_id.'/more/'.$value.'/reply.fcr');  
                            }
                            rmdir('../review/lib/normal/'.$review_id.'/more/'.$value);
                        }
                    }
                    rmdir('../review/lib/normal/'.$review_id.'/more');
                    unlink('../review/lib/normal/'.$review_id.'/title.fcr');
                    unlink('../review/lib/normal/'.$review_id.'/head.fcr');
                    unlink('../review/lib/normal/'.$review_id.'/main.fcr');
                    rmdir('../review/lib/normal/'.$review_id);
                    echo '<script type="text/javascript">alert("已删除");</script>';
                    echo '<script type="text/javascript">window.location.href="/";</script>';
            }else{
                echo '<script type="text/javascript">alert("要删除的帖子被外星人吸走了");</script>';
                echo '<script type="text/javascript">window.location.href="/";</script>';
            }

        }elseif($review_kind=='admin'){       //管理帖
            if (is_dir('../review/lib/admin/'.$review_id)){
                    unlink('../review/lib/admin/'.$review_id.'/title.fcr');
                    unlink('../review/lib/admin/'.$review_id.'/head.fcr');
                    unlink('../review/lib/admin/'.$review_id.'/main.fcr');
                    rmdir('../review/lib/admin/'.$review_id);
                    echo '<script type="text/javascript">alert("已删除");</script>';
                    echo '<script type="text/javascript">window.location.href="/";</script>';
            }else{
                echo '<script type="text/javascript">alert("要删除的管理帖子被外星人吸走了");</script>';
                echo '<script type="text/javascript">window.location.href="/";</script>';
            }

        }else{
            echo '<script type="text/javascript">alert("MOD WRONG,FAIL TO DEL");</script>';
            echo '<script type="text/javascript">window.location.href="/";</script>';
        }
    }elseif ($del_kind=='r'){       //删回帖
        if ((is_dir('../review/lib/normal/'.$review_id))and(is_dir('../review/lib/normal/'.$review_id.'/more/'.$reply_id))){
            $fopen=fopen('../review/lib/normal/'.$review_id.'/more/'.$reply_id.'/reply.fcr','r');
            $m=fgets($fopen);
            fclose($fopen);

            $t=substr_count($m,'<h2>'.$_COOKIE['name'].'</h2>');
            if (($t>0)or($l>1)){
                unlink('../review/lib/normal/'.$review_id.'/more/'.$reply_id.'/reply.fcr');
                rmdir('../review/lib/normal/'.$review_id.'/more/'.$reply_id);
                echo '<script type="text/javascript">alert("已删除");</script>';
                echo '<script type="text/javascript">window.location.href="/review/read?k=normal&rid='.$review_id.'";</script>';
            }else{
                echo '<script type="text/javascript">alert("权限不足或者这不是你的帖子");</script>';
                echo '<script type="text/javascript">window.location.href="/review/read?k=normal&rid='.$review_id.'";</script>'; 
            }

        }else{
            echo '<script type="text/javascript">alert("要删除的帖子找不到");</script>';
            echo '<script type="text/javascript">window.location.href="/";</script>';

        }

    }else{
        echo '<script type="text/javascript">alert("MOD WRONG,FAIL TO DEL");</script>';
        echo '<script type="text/javascript">window.location.href="/";</script>';
    }
?>