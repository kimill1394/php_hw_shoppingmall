<?php require_once "../super/header.php"; ?>
<div class="middle">
  <div class="content">
    <?php require_once "./boardControl.php"; ?>
  </div>
  <div class="option">
    <div class="btn">
      <div class="modifybtn">
        <a href="./write.php?no=<?=$_GET['no']?>">수정</a>
      </div>
      <div class="modifybtn">
        <a href="./write.php?mode=delete&amp;no=<?=$_GET['no']?>">삭제</a>
      </div>
      <!-- <div class="deletebtn"><a href="./write.php?mode=delete&amp;no=$_GET['no'] ">삭제</a</div> -->
    </div>
  </div>
</div>
<?php require_once "../super/footer.php"; ?>
