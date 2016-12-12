<?php require_once "../super/header.php"; ?>
<script type="text/javascript">

       function check_input()
       {
          if (!document.member_form.userid.value)
          {
              alert("id");
              document.member_form.userid.focus();
              return;
          }
          if (!document.member_form.userpw.value)
          {
              alert("pw");
              document.member_form.userpw.focus();
              return;
          }
          if (!document.member_form.userpwcheck.value)
          {
              alert("pw확인");
              document.member_form.userpwcheck.focus();
              return;
          }
          if (!document.member_form.username.value)
          {
              alert("이름");
              document.member_form.username.focus();
              return;
          }
          if (document.member_form.userpw.value !=
                document.member_form.userpwcheck.value)
          {
              alert("비밀번호 안맞음.");
              document.member_form.userpw.focus();
              document.member_form.userpw.select();
              return;
          }
          document.member_form.submit();
       }
    </script>
<div class="middle">
  <div class="mymenutitle">
    <div> JOIN </div>
  </div>
  <div class="joinpannel">
    <form class="" action="./memberControl.php?mode=join" method="post" name="member_form">
      <div class="jointitle">회원정보입력</div>
      <div class="table">
        <table class="jointable">
          <tr>
            <td>이름</td>
            <td><input type="text" name="username"></td>
          </tr>
          <tr>
            <td>아이디</td>
            <td><input type="text" name="userid"></td>
          </tr>
          <tr>
            <td>비밀번호</td>
            <td><input type="password" name="userpw"></td>
          </tr>
          <tr>
            <td>비밀번호 확인</td>
            <td><input type="password" name="userpwcheck"></td>
          </tr>
          <tr>
            <td>이메일</td>
            <td><input type="text" name="email1">@<input type="text" name="email2"></td>
          </tr>
        </table>
      </div>
      <div class="btn">
        <input type="hidden" name="mode" value="join">
        <input type="button" value="JOIN" onClick="check_input()">
      </div>
    </form>
  </div>
</div>
<?php require_once "../super/footer.php"; ?>
