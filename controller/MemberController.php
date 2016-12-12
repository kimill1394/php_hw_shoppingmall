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

    $sql = "select * from user where userid = :id";
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
    //// auto increment 하면 지울 거임 ////
    $sql = "select * from shoppinglist";
    $stt=$this->dbo->prepare($sql);
    $stt->execute();
    $row = ($stt->rowCount())+1;
    /////////////////////////////////////
    if($this->pay()) {
      $sql="insert into shoppinglist values(:no, :id, :sheepno, :date)"; // 삽입!
      $stt = $this->dbo->prepare($sql);
      date_default_timezone_set('Asia/Seoul');
      $result = $stt->execute(array("no"=>$row, "id"=>$userid, "sheepno"=>$sheepno, "date"=>date("Y/m/d(D)")));
      if($result) {
        $sql = "insert into objsheep values(:id, :name, :sheepno, :userid, 0)";
        $stt = $this->dbo->prepare($sql);
        $stt->execute(array("id"=>$row, "name"=>$name, "sheepno"=>$sheepno, "userid"=>$userid));
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
}
 ?>
