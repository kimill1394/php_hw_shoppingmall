<?php
    // $real_name = $_GET['real_name']; // 저장한 이름
    // $file_path = "./data/".$real_name; // 저장된 경로
    // $show_name = $_GET['show_name']; // 저장될 이름

    $name=$_GET['name'];

    require_once "../../model/DBMS.php";
        $dbms = new DBMS();
        $dbo = $dbms->getDbo();

      $sql = "select * from file where filename=:name";
      $stt = $dbo->prepare($sql);
      $stt->execute(array("name"=>$name));
      $row = $stt->fetch();

      $filepath = $row['filepath'];




    Header("Content-type: application/octet-stream");
    Header("Content-Length: ".filesize($filepath));
    Header("Content-Disposition: attachment; filename=".$row['filename']);
    Header("Content-Transfer-Encoding: binary");
    Header("Pragma: no-cache");
    Header("Expires: 0");


    ob_clean();
    flush();
    readfile($filepath);
?>
