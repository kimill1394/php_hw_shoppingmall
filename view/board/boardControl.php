<?php
require_once "../../controller/BoardController.php";

$boardController = new BoardController();

// 게시물이 있는지 확인
// 있고 없음에 따라 초기화
// 폼 읽어오기
//

if(strpos($_SERVER['SCRIPT_NAME'],'write')) {
  if(isset($_GET['mode'])) $mode=$_GET['mode'];
  else $mode="";
  switch ($mode) {
    case 'insert':
      $title = $_POST['title'];
      $content = $_POST['content'];
      $userid = $_SESSION['user']['userid'];
      $no = $_GET['no'];
      $upfiles = $_FILES['upfile'];
      $boardController->insert($title, $content, $userid, $no, $upfiles);
      break;
    case 'delete':
      $no = $_GET['no'];
      $boardController->delete($no);
    default:
    if(isset($_GET['no'])) // mode=modify
      $board = $boardController->readItem($_GET['no']);
    else $board = false; // mode=insert
    if(!$board) {
      // 없는 게시물을 가져온 경우, 게시물 번호가 없는 경우(처음 쓰는 글)
      $title = ""; $content = "";
      $no = null;
    } else { // 게시물이 있는 경우
      $title = $board['freetitle'];
      $content = $board['freecontent'];
      $super = $board['freesuper'];
      $no = $_GET['no'];
    }
    echo <<<BOARD
      <form action="./write.php?mode=insert&no=$no" method="post" enctype="multipart/form-data">
        <input type="text" name="title" value="$title">
        <textarea name="content" id="" cols="30" rows="10">$content</textarea>
        <input type="file" name="upfile[]"></input>
        <input type="submit" value="write">
      </form>
BOARD;
      # code...
      break;
  }
} elseif (strpos($_SERVER['SCRIPT_NAME'],'boardlist')) {
    // $page=0;
    $stt = $boardController->readList();
    while($board = $stt->fetch()) {
      $freeno = $board['freeno'];
      $writer = $board['freewriter'];
      $date = $board['freedate'];
      $title = $board['freetitle'];

      echo <<<BOARDLIST
          <tr>
            <td>$freeno</td>
            <td><a href="./read.php?no=$freeno">$title</a></td>
            <td>$writer</td>
            <td>$date</td>
          </tr>
BOARDLIST;
    }
} elseif(strpos($_SERVER['SCRIPT_NAME'],'read')) {
  $stt = $boardController->readfile($_GET['no']);
  $files = array();
  if (!$stt) {
    while($file = $stt->fetch()) {
      array_push($)
    }
  }
  $board = $boardController->readItem($_GET['no']);
  $freeno = $board['freeno'];
  $writer = $board['freewriter'];
  $date = $board['freedate'];
  $title = $board['freetitle'];
  $content = $board['freecontent'];

  require_once "./HTMLREAD.php";

}


 ?>
