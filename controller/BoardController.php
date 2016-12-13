<?php
require_once "../../model/DBMS.php";

class BoardController {
  private $dbo;

  public function __construct() {
    $dbms = new DBMS();
    $this->dbo = $dbms->getDbo();
  }

  public function readList() {
    $sql = "select * from free";
    $stt = $this->dbo->prepare($sql);
    $result=$stt->execute();
    if($result) return $stt;
    else return false;
  }

  public function readItem($no) {
    $sql = "select * from free where freeno=:no";
    $stt = $this->dbo->prepare($sql);
    $stt->execute(array("no"=>$no));
    if($stt->rowCount()==1)
      return $stt->fetch();
    else return false; // 게시물이 없으면 false
  }

  public function __call($name, $param) {
    if($name == 'insert') {
      if($param[3]=="") $this->insertinto($param[0], $param[1], $param[2],$param[4]);
      else $this->update($param[0],$param[1],$param[3],$param[4],$param[5]);
      // Header("Location: ./boardlist.php");
    }
  }

  private function update($title, $content, $no, $upfiles, $delfiles) {
    $sql = "update free set freetitle=:title where freeno=:no";
    $stt = $this->dbo->prepare($sql);
    $stt->execute(array("title"=>$title, "no"=>$no));

    $sql = "update free set freecontent=:freecontent where freeno=:no";
    $stt = $this->dbo->prepare($sql);
    $stt->execute(array("freecontent"=>$content, "no"=>$no));

    $sql = "update free set freedate=:freedate where freeno=:no";
    $stt = $this->dbo->prepare($sql);
    date_default_timezone_set('Asia/Seoul');
    $date = date("Y/m/d(D)");
    $stt->execute(array("freedate"=>$date, "no"=>$no));

    $this->upload($no, $upfiles, $date);
    $this->deletefile($no, $delfiles);
  }

  private function deletefile($no, $delfiles) {
    $sql = "delete from file where filename = :filename and freeno = :no";
    $stt = $this->dbo->prepare($sql);
    $keys = array_keys($delfiles);
    foreach($keys as $key) {
      $stt->execute(array("filename"=>$key, "no"=>$no));
    }

  }

  private function insertinto($title, $content, $userid, $upfiles) {
    $sql = "insert into free(freeno, freetitle, freewriter, freecontent, freedate) values(:no, :title, :id, :content, :date)";
    $stt = $this->dbo->prepare($sql);
            /*
            * freeno auto-increment 설정 후 삭제
            */
            $sql2 = "select max(freeno) from free";
            $stt2 = $this->dbo->prepare($sql2);
            $stt2->execute();
            $row = $stt2->fetch(PDO::FETCH_NUM);
            $no = $row[0]+1;
    date_default_timezone_set('Asia/Seoul');
    $date = date("Y/m/d(D)");
    $result = $stt->execute(array("no"=>$no, "title"=>$title, "id"=>$userid, "content"=>$content, "date"=>$date));
    if ($upfiles['name'][0]!='') {
      $this->upload($no, $upfiles, $date);
    }
  }

  private function upload($no, $upfiles, $date) {
    $sql = "insert into file values(:freeno, :filename, :filepath, :filedate)";
    $stt=$this->dbo->prepare($sql);

    $count = count($upfiles["name"]);
    $upload_dir = '../../data/';
    for($i=0; $i<$count; $i++) {
      $name = $upfiles['name'][$i];
      $tmp = $upfiles['tmp_name'][$i];
      $err = $upfiles['error'][$i];
      if(!$err) {
        $path = $upload_dir.$name;
        if (move_uploaded_file($tmp, $path)) {
          $stt->execute(array("freeno"=>$no, "filename"=>$name, "filepath"=>$path, "filedate"=>$date));
        } else {
          echo("
					<script>
					alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다.');
					//history.go(-1)
					</script>");
				exit;
        }
      }
    }
  }

  public function readfile($no) {
    $sql = "select * from file where freeno = :no";
    $stt = $this->dbo->prepare($sql);
    $stt->execute(array("no"=>$no));
    if($stt->rowCount()>0) return $stt;
    else return false;
  }

  public function delete($no) {
    $sql = "delete from file where freeno=:no";
    $stt = $this->dbo->prepare($sql);
    $stt->execute(array("no"=>$no));

    $sql = "delete from free where freeno=:no";
    $stt = $this->dbo->prepare($sql);
    $stt->execute(array("no"=>$no));
    // var_dump($result);
    Header("Location: ./boardlist.php");
  }

}

 ?>
