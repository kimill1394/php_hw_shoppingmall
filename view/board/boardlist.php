<?php require_once "../super/header.php"; ?>
<div class="middle">
  <div class="mymenutitle">
    <div> 커뮤니티 </div>
  </div>
  <div class="boardcategory">
    <div id="category1" class="category"> VIP전용관 </div>
    <div id="category2" class="category"> 공지사항 </div>
    <div id="category3" class="category"> 농장자랑 </div>
    <div id="category4" class="category"> 이벤트 </div>
    <div id="category5" class="category"> Q &amp; A </div>
  </div>
  <div class="boardlist">
    <table class="listtable">
      <tr>
        <th>게시물 번호</th>
        <th>제목</th>
        <th>작성자</th>
        <th>작성 일자</th>
        <!-- <th>조회수</th> -->
      </tr>
      <?php require_once "./boardControl.php"; ?>
    </table>
  </div>
  <div class="writebtn">
    <div class="btn">
      <a href="./write.php">WRITE</a>
    </div>
  </div>
  <div class="page">
    <ul>
      <li><a href="">처음으로</a></li>
      <li><a href="">이전</a></li>
      <li><a href="">1</a></li>
      <li><a href="">다음</a></li>
      <li><a href="">끝으로</a></li>
    </ul>
  </div>
  <div class="searchoption">
    <form action="">
      <select name="timelabel">
        <option value="week">일주일</option>
        <option value="all">전체</option>
      </select>
      <select name="searchword">
        <option value="">제목</option>
        <option value="">내용</option>
        <!-- <option value="">아이디</option> -->
        <option value="">닉네임</option>
      </select>
      <input type="text" name="name" value="">
      <input type="submit" name="name" value="검색">
    </form>
  </div>
</div>
<?php require_once "../super/footer.php"; ?>
