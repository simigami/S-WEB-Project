<?php
    if(!(isset($_FILES['file']))){
        echo "<br>"."Error, File not uploaded";
        exit;
    }
    else{
        $folder = $_POST['folder'];
        $file = $_FILES['file'];
        $file_type = strtolower(array_pop(explode('.',$file['name'])));
        $forbidden_type = array("php","asap","asp","jsp");
        $max_size = 1024*1024;
        if($file['size']>$max_size){
            echo "<br>"."Error, File too big";
            exit;
        }
        if(in_array($file_type,$forbidden_type)){
            echo "<br>"."Error, Forbidden Type";
            exit;
        }
        else{
            $now = getcwd();
            $file_name = $file['name'];
            $upload_dir = $now.'/upload/'.$folder.'/';
            $file_path = $upload_dir.$file['name'];
            if(!is_dir($upload_dir)){
                mkdir($upload_dir);
            }
            if(move_uploaded_file($_FILES['file']['tmp_name'], $file_path)){
                echo "<br>"."File Uploaded At ".$file_path;
            }
            else{
                echo "<br>"."Error, File not uploaded";
            }
        }
    }
?>
