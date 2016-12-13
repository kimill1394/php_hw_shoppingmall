<?php
    $real_name = $_GET['real_name']; // 저장한 이름
    $file_path = "./data/".$real_name; // 저장된 경로
    $show_name = $_GET['show_name']; // 저장될 이름

    $name = $_GET['name'];
    $path = "../../data/";
 $file_type = $_GET['real_type'];


    Header("Content-type: application/octet-stream");
    Header("Content-Length: ".filesize($save_name));
    Header("Content-Disposition: attachment; filename=".$real_name);
    Header("Content-Transfer-Encoding: binary");
    Header("Pragma: no-cache");
    Header("Expires: 0");


    ob_clean();
    flush();
    readfile($path.$name);
?>
