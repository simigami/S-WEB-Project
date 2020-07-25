<?php
    $folder_name = $_POST['folder_name'];
    $file_name = $_POST['file_name'];
    $now = getcwd();
    $upload_dir = $now.'/upload/'.$folder_name.'/';
    $handle = opendir($upload_dir);
    $flag=0;
    while(false !== ($filename = readdir($handle))){
        if($filename =="." || $filename == ".."){
            continue;
        }
        else if($filename === $file_name){
            $flag=1;
            break;
        }
    }
    closedir($handle);
    if(!$flag){
        echo "No file name ".$file_name."<br>";
    }
    else{
        $file_path = $upload_dir.$file_name;
        header('Content-type: application/octet-stream');
        header('Content-Disposition: attachment;filename="'.$file_name.'"'); 
        header('Content-Transfer-Encoding: binary'); 
        header('Content-length: ' . filesize($file_path)); 
        header('Expires: 0'); 
        header("Pragma: public");

        $fp = fopen($file_path, 'rb');
        fpassthru($fp);
        fclose($fp);
        
    }
?>
