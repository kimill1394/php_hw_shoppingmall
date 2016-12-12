<?php require_once "../super/header.php"; ?>
<div class="middle">
  <div class="mymenutitle">
    <div>CARTLIST</div>
  </div>
  <div class="cartlist">
    <table class="table carttable">
      <tr class="cartcolumn">
        <th><div><input type="checkbox"></div></th>
        <th colspan="2"><div>양정보</div></th>
        <th><div>판매가</div><th>
        <th><div>적립금</div></th>
        <th><div>선택</div></th>
      </tr>
      <tr class="cartvalues">
        <td><div><input type="checkbox"></div></td>
        <td><div>[여기 이미지가 있음]</div></td>
        <td><div>[여기 양 종류와 스타일이 있음]</div></td>
        <td><div>[여기 가격이 있음]</div></td>
        <td><div>[여기 적립금이 있음]</div></td>
        <td><div class="orderselect">
          <div><a href="" class="btn orderbtn">주문하기</a></div>
          <div><a href="" class="btn deletebtn">삭제</a></div>
        </div></td>
      </tr>
    </table>
    <div class="btn alldeletebtn">선택삭제</div>
    <div>구매금액 [여기 총 상품 가격이 있음] - 할인금액 [여기 할인 금액이 있음] = 합계 : [여기 합계가 있음]</div>
  </div>
  <div class="order">
    <div class="receipt">
      <table class="table receipttable">
        <tr>
          <th>총 금액</th>
          <th>총 할인금액</th>
          <th>결제 예정 금액</th>
        </tr>
        <tr>
          <td>[여기 선택한 상품 금액 합계가 있음]</td>
          <td>[여기 선택한 상품 할인 총 금액이 있음]</td>
          <td>[여기 총 결제 예상 금액이 있음]</td>
        </tr>
      </table>
      <!-- <div>저희 쇼핑몰을 이용해주셔서 감사합니다 이진아 님은 일반회원이ㅣㅂ니다 이상 굼시 퍼세느를 추가적리바등ㄹ수 있습니다</div> -->
      <div class="allorderbutton">입양하기</div>
    </div>
  </div>
</div>
<?php require_once "../super/footer.php"; ?>
