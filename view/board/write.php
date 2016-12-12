<?php require_once "../super/header.php"; ?>
<script>
  function check_input()
   {
      if (!document.board_form.subject.value)
      {
          alert("제목을 입력하세요!");
          document.board_form.subject.focus();
          return;
      }

      if (!document.board_form.content.value)
      {
          alert("내용을 입력하세요!");
          document.board_form.content.focus();
          return;
      }
      document.board_form.submit();
   }
</script>
<div class="middle">
  <div class="category">
    어떤 게시판
  </div>
  <?php require_once "./boardControl.php" ?>
</div>
<?php require_once "../super/footer.php"; ?>
