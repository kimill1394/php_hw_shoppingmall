<?php
require_once "../../model/DBMS.php";

class ListController{
  private $dbo;

  public function __construct() {
    $dbms = new DBMS();
    $this->dbo = $dbms->getDbo();
  }

  public function getProduct($category) {

    switch ($category) {
      case 1:
        $sql = "select * from v_sheep where kindno=1";
        break;

      case 2:
        $sql = "select * from v_sheep where kindno=2";
        break;

      default:
        $sql = "select * from v_sheep";
        break;
    }

    $stt = $this->dbo->prepare($sql);
    $stt->execute();
    return $stt;
  }

  public function getDetail($no) {
    $sql = "select * from v_sheep where sheepno=:no";
    $stt = $this->dbo->prepare($sql);
    $stt->execute(array("no"=>$no));
    return $stt;
  }

  public function getOrder($userid) {

    $sql = "select * from v_shoppinglist where shopperid=:userid";
    $stt = $this->dbo->prepare($sql);
    $result = $stt->execute(array("userid"=>$userid));
    return $stt;
  }
}
 ?>
