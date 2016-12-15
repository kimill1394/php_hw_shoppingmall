<?php
session_start();
require_once "../../controller/MemberController.php";



$membercontroller  = new MemberController();


if($_GET['mode']=='login') {
  $id    = $_POST['id'];
  $pass  = $_POST['passwd'];
  if ($membercontroller->login($id, $pass)) {
    $tmp_usersession = $membercontroller->readUserData($id);
    $_SESSION['user'] = $tmp_usersession;
    Header("Location: ../../index.php");
  } else
    echo "<script>
      alert('다시 입력해주세양');
      history.go(-1);
    </script>";
} else if ($_GET['mode']=='logout') {
  session_destroy();
  Header("Location: ../../index.php");
}


if($_GET['mode']=='buy') {
  // 우선 하나씩 산다고 가정하고
  if(empty($_POST['name'])) {
    echo "<script>
      alert('양 이름을 정해주세요!');
      history.go(-2);
    </script>";
    // 여기 리프레쉬해야됨!!!!!!!!!!!!!!!!!!!!!!
  } else {
    $userid = $_SESSION['user']['userid'];
    $sheepno = $_GET['no'];
    $name = $_POST['name'];
    if($membercontroller->buy($userid, $sheepno, $name)) {

      Header("Location: ../mypage/history.php");
    } else echo "<script>
      alert('결제 실패!');
    </script>";
    history.go(-2);
  }
}


if($_GET['mode']=='join') {
  $name = $_POST['username'];
  $id = $_POST['userid'];
  $pass = $_POST['userpw'];
  $email = $_POST['email1'].'@'.$_POST['email2'];

  if ($membercontroller->join($name, $id, $pass, $email)) {
    Header("Location: ./join_result.php?id=$id");
  } else {
    echo "<script>
      alert('ㄴㄴ중복임양');
      history.go(-1);
    </script>";
  }


}





 ?>
