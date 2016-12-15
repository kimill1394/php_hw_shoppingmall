<?php
require_once "../../model/DBMS.php";
require_once "../../exception/nullArrayMergeException.php";

class MemberController{
  private $dbo;

  public function __construct() {
    $dbms = new DBMS();
    $this->dbo = $dbms->getDbo();
  }

  public function login($id, $pass) {
    // if( idCheck() && passCheck() )  return true;
    if( $this->check($id, $pass) ) {
      $this->sucflag=true;
      return true;
    }
    return false;
  }

  private function check($id, $pass) {
    $sql = "select * from user where userid = :id and userpw = :pass";
    $stt = $this->dbo->prepare($sql);
    $stt->execute(array('id'=>$id, 'pass'=>$pass));
    $result=$stt->execute();
    if($stt->rowCount()==1) return true;
    else return false;
  }

  public function readUserData($id) {
    $tmp_usersession = array();

    $sql = "select * from v_user where userid = :id";
    $stt = $this->dbo->prepare($sql);
    $result = $stt->execute(array('id'=>$id));
    $tmp_usersession = array_merge($tmp_usersession, $stt->fetch(PDO::FETCH_ASSOC));


    $sql = "select * from shoppinglist where shopperid=:id";
    try {
      $stt = $this->dbo->prepare($sql);
      $result = $stt->execute(array("id"=>$id));
      $shoppinglist = $stt->fetch();
      if(!$shoppinglist) throw new nullArrayMergeException();
      $tmp_usersession['shoppinglist']=$shoppinglist;
    } catch (nullArrayMergeException $e) {
      $tmp_usersession['shoppinglist']=array();
    }


    return $tmp_usersession;
  }

  public function updateShoppinglist_multi($param) {
  }

  public function updateShoppinglist_single($param) {
    $sql = "insert into user values({$param[0]}, '{$param[1]}', {$param[2]}, '{$param[3]}')";
    $stt = $this->dbo->prepare($sql);
    $stt->execute();
  }

  public function __call($name, $paramlist) {
    if ($name=='updateUserData')
      if (is_array($paramlist[0][0]))
        $this->updateShoppinglist_multi($paramlist);
      else $this->updateShoppinglist_single($paramlist);
  }

  public function buy($userid, $sheepno, $name) {

    if($this->pay()) {
      $sql="insert into shoppinglist(shopperid, shoppedsheepno, shoppeddate) values(:id, :sheepno, :date)"; // 삽입!
      $stt = $this->dbo->prepare($sql);
      date_default_timezone_set('Asia/Seoul');
      $result = $stt->execute(array("id"=>$userid, "sheepno"=>$sheepno, "date"=>date("Y/m/d(D)")));
      if($result) {

        $sql = 'insert into objsheep(objsheepno, objsheepname, objsheepuserid, objsheepcurstar, ) values (:sheepno, :sheepname, :userid, 0)';
        $stt = $this->dbo->prepare($sql);
        $stt->execute(array("sheepno"=>$sheepno, "sheepname"=>$name, "userid"=>$userid));

        $sql = 'select objsheepid from objsheep where ';

        $this->updateView('v_shoppinglist');
        return true;
      }
    }
    return false;
  }

  private function pay() {
    return true;
  }

  public function join($name, $id, $userpw, $email) {
    if($this->idCheck($id)) {
      $sql = "insert into user(userid, userpw, username, useremail) values(:id, :pw, :name, :email)";
      $stt = $this->dbo->prepare($sql);
      $stt->execute(array("id"=>$id, "pw"=>$userpw, "name"=>$name, "email"=>$email));
      $this->updateView("v_user");
      return true;
    } else {
      return false;
    }
  }

  private function idCheck($id) {
    $sql = "select * from user where userid = :id";
    $stt = $this->dbo->prepare($sql);
    $stt->execute(array("id"=>$id));
    if ($stt->rowCount()==0) {
      return true;
    } else {
      return false;
    }
  }

  private function updateView($view) {
    // model 객체들의 부모 클래스 만들 때 메서드 정의하기!
    $sql = "drop view :view";
    $stt = $this->dbo->prepare($sql);
    $stt->execute(array("view"=>$view));

    switch ($view) {
      case 'v_user':
        $sql = "create view v_user
          as
            select u.userid, u.username, u.usernick, u.userage, u.userpoint, t.usertype, t.userpointrate
            from user u, usertype t
            where u.usertypeno = t.usertypeno";
      break;
      case 'v_sheep':
        $sql = "create view v_sheep
          as
            select sheep.sheepno, sheep.sheepname, sheep.sheepsalerate, sheep.sheepprice, sheep.sheepimg, sheep.sheepstar, sheep.buycount, its.itemstatusimg, kos.kindname, kos.kindno, kos.kindcomment
            from sheep, itemstatus its, kindofsheep kos
            where sheep.kindno=kos.kindno
              and its.itemstatusno = sheep.sheepstatusno";
      break;
      case 'v_objsheep':
        $sql = "create view v_objsheep
          as
            select o.objsheepid, o.objsheepname, o.objsheepno, o.objsheepcurstar, sl.shopperid, sl.shoppeddate, s.sheepname, s.sheepimg, s.sheepstar
            from objsheep o, sheep s, shoppinglist sl
            where o.objsheepno = s.sheepno
              and o.objsheepid = sl.objsheepid;
";
      break;
    }
    $stt = $this->dbo->prepare($sql);
    $stt->execute();
  }
}
 ?>
