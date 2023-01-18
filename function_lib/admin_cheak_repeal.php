<?php
    $id=$_GET['id']; 
    unlink('../permanent_page/lib/repeal/report/'.$id.'/main.fcr');
    unlink('../permanent_page/lib/repeal/report/'.$id.'/username.fcr');
    rmdir('../permanent_page/lib/repeal/report/'.$id);

    echo '<script type="text/javascript">window.location.href="/admin/repeal";</script>';
?>