<?php require_once "../super/header.php"; ?>
<div class="middle">
  <div class="mymenutitle">
    <div>ORDER HISTORY</div>
  </div>
  <div class="listwrap">
    <div class="searchoption">
      <div class="autooption">
        <div class="today"></div>
        <div class="week"></div>
        <div class="month"></div>
        <div class="month3"></div>
        <div class="month6"></div>
      </div>
      <div class="stickoption">
        <form action="">
          [여기 기간 입력하는 외부 소스가 있음]
          <input type="submit" value="조회">
        </form>
      </div>
    </div>
    <div class="orderlist">
      <div class="listtitle">입양 정보</div>
      <div class="list">
        <table class="ordertable">
          <tr>
            <td>주문일자[주문번호]</td>
            <td>이미지</td>
            <td>양정보</td>
            <td>이름</td>
            <td>입양비</td>
            <td>품질</td>
          </tr>
          <?php require_once '../product/productControl.php'; ?>
        </table>
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
  </div>
</div>
<?php require_once "../super/footer.php"; ?>
