<?php
require_once "../../controller/ListController.php";

$listController = new ListController();

if(strpos($_SERVER['SCRIPT_NAME'],'list')) {
  if(!isset($_GET['category']))
    $category=2; // default(all)
  else $category=$_GET['category'];

  $stt=$listController->getProduct($category);
  while($row=$stt->fetch()) {
    $img = $row['styleimg'];
    $status = $row['itemstatusname'];
    $title = $row['stylename'];
    $star = $row['sheepstar'];
    $price = $row['sheepprice'];
    $no = $row['sheepno'];
  echo <<<LIST
  <div class="sheeplist">
    <li class="item">
      <div class="itembox">
        <form action="./detail.php?no=$no" method="POST">
          <input type="image" src="$img">
          <div class="iteminfo">
            <div class="status"><img src="" alt="">$status</div>
            <p class="itemname">$title</p>
            <p class="star">$star</p>
            <p class="itemprice">$price</p>
          </div>
        </form>
      </div>
    </li>
  </div>
LIST;
  }
} else if (strpos($_SERVER['SCRIPT_NAME'],'history')) {
  $stt = $listController->getOrder($_SESSION['user']['userid']);
  while($row=$stt->fetch(PDO::FETCH_ASSOC)){
    $date = $row['shoppeddate'];
    $img = $row['styleimg'];
    $stylename = $row['stylename'];
    $sheepname = $row['objsheepname'];
    $star = $row['objsheepcurstar'];
  echo <<<ORDERLIST
  <tr>
    <td>$date</td>
    <td><img src=$img></td>
    <td>$stylename</td>
    <td>$sheepname</td>
    <td>$star</td>
  </tr>
ORDERLIST;
  }
} else {
  $itemno = $_GET['no'];
  $stt=$listController->getDetail($itemno);
  $row=$stt->fetch();
  $img = $row['styleimg'];
  $title = $row['stylename'];
  $comment = $row['kindcomment'];
  $price = $row['sheepprice'];
  $star = $row['sheepstar'];
  $status = $row['itemstatusname'];
  $pluspoint = $price*$_SESSION['user']['userpointrate'];

  echo <<<DETAIL
  <div class="order">
    <div class="itemimg">
      <img src="$img" alt="">
    </div>
    <div class="orderoption">
      <div clas="summury">
        <div class="itemname">$title</div>
        <div class="itemcontent">$comment</div>
      </div>
      <div class="option">
        <table>
          <tr>
            <td class="label">판매가격</td>
            <td>$price</td>
          </tr>
          <tr>
            <td class="label">적립금</td>
            <td>$pluspoint</td>
          </tr>
          <tr>
            <td class="label">종류</td>
            <td>$title</td>
          </tr>
          <tr>
            <td class="label">품질</td>
            <td>$star</td>
          </tr>
          <tr>
            <td class="label">수량</td>
            <td>[여기 수량이 표시됨]</td>
          </tr>
          <tr>
            <td class="label">이름</td>
            <td><input type="text" name="name" value="양 이름을 입력해 주세요"></td>
          </tr>
        </table>
        <div class="totalprice">total: [여기 총 금액이 있음]</div>
      </div>
    </div>
  </div>
DETAIL;
}




 ?>
