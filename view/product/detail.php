<?php require_once "../super/header.php"; ?>
<div class="middle">
  <form name="order_form" action="../member/memberControl.php?mode=buy&amp;no=<?php echo $_GET['no']; ?>" method="post">
    <?php require_once "./productControl.php"; ?>
    <div class="ordermenu">
      <div class="divbtn buyitnow">
        <input type="image" src="../../img/btn_buy.jpg" name="selectmode" value="buy" onclick="check_name()">
      </div>
      <div class="divbtn addcart">장바구니</div>
      <div class="divbtn wishlist">언젠간 사고 말겠음양!</div>
    </div>
  </form>
  <div class="review">
    <div class="notice">[여기에 리뷰 관련 알림이 있음]</div>
    <div class="reviewcontents">
      <div class="minicategory"><b>REVIEW<b> | 실구입자의 사실적인 리뷰만 올라오도록 관리하고 있음양ㅎ.ㅎ</div>
      <div class="reviewlist">[여기 리뷰 게시물 리스트가 있음]</div>
      <div class="page">
        <ul>
          <li><a href="">처음으로</a></li>
          <li><a href="">이전</a></li>
          <li><a href="">1</a></li>
          <li><a href="">다음</a></li>
          <li><a href="">끝으로</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="qna">
    <div class="qnalist">[여기 qna 게시물 리스트가 있음]</div>
    <div class="page">
      <ul>
        <li><a href="">처음으로</a></li>
        <li><a href="">이전</a></li>
        <li><a href="">1</a></li>
        <li><a href="">다음</a></li>
        <li><a href="">끝으로</a></li>
      </ul>
    </div>
  </div>
</div>
<?php require_once "../super/footer.php"; ?>
