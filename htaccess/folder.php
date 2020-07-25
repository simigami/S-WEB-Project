<?php
    $id = $_POST['id'];
    $now = getcwd();
    $nonce = rand(0,10000000);
    $enc_id = md5($id.(string)$nonce);
    $upload_dir = $now.'/upload/'.$enc_id.'/';
    if(!is_dir($upload_dir)){
        mkdir($upload_dir);
        echo "Your personal folder is ".$upload_dir."<br>";
    }
?>
