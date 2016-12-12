<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>쉽팜 인 슈가랜드 </title>
    <link rel="stylesheet" href="../../css/common.css" media="screen" title="no title">
    <script type="text/javascript">
      function gohome() {
        window.location.replace("../product/list.php");
      }
    </script>
  </head>
  <body>
    <div class="header">
      <div class="eventlogo">[여기 이런 이벤트가 있다고 표시함]</div>
      <div class="membermenu">
        <ul>
          <li><?php
                if(isset($_SESSION['user']))
                  echo "<a href='../mypage/index.php'>".$_SESSION['user']['userid']."님";
                else {
                  echo "<a href='../member/login.php'>";
             ?>로그인</a><?php } ?></li>
          <li><?php
                if(isset($_SESSION['user']))
                  echo "<a href='../member/memberControl.php?mode=logout'>로그아웃";
                else {
                  echo "<a href='../member/login.php'>";
             ?><a href="../member/join.php">회원가입</a><?php } ?></li>
          <li><a href="">장바구니</a></li>
          <li><a href="../mypage/index.php">마이페이지</a></li>
          <li><a href="../board/boardlist.php">Q&amp;A</a></li>
          <li><a href=""><img src="" alt="">[여기 검색 아이콘이 있음]</a></li>
        </ul>
      </div>
      <div class="logo" onclick="gohome()">[여기 페이지 로고 이미지가 있음 -> 클릭 시 홈으로 이동합니다!]</div>
      <div class="menubar">
        <ul>
          <li><a href="">NEW10%</a></li>
          <li><a href="">BEST10</a></li>
          <li><a href="">플레인램</a></li>
          <li><a href="">슈크림램</a></li>
          <li><a href="">블레이징램</a></li>
          <li><a href="">천사양</a></li>
          <li><a href="">악마양</a></li>
          <li><a href="">초밥양</a></li>
          <li><a href="">마린&amp;해적양</a></li>
          <li><a href="">마녀양</a></li>
          <li><a href="">귀족양</a></li>
          <li><a href="">SALE</a></li>
          <li><a href="">작물</a></li>
        </ul>
      </div>
    </div>
