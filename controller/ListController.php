<?php
require_once "../../model/DBMS.php";

class ListController{
  private $dbo;

  public function __construct() {
    $dbms = new DBMS();
    $this->dbo = $dbms->getDbo();
  }

  public function getProduct($category) {
    $sql = "select lc.listcategoryname, sos.styleimg, sos.stylename, ist.itemstatusname, aos.sheepstar, aos.sheepprice, sheep.sheepno from listcategory lc, allofsheep aos, styleofsheep sos, itemstatus ist, sheep where aos.sheepno = sheep.sheepno and sheep.styleno=sos.styleno and aos.sheepstatusno=ist.itemstatusno and lc.listcategoryno=:category";
    $stt = $this->dbo->prepare($sql);
    $stt->execute(array("category"=>$category));
    return $stt;
  }

  public function getDetail($no) {
    $sql = "select sos.styleimg, sos.stylename, kos.kindcomment, aos.sheepprice, aos.sheepstar, ist.itemstatusname from styleofsheep sos, kindofsheep kos, sheep s, allofsheep aos, itemstatus ist where s.kindno=kos.kindno and s.styleno=sos.styleno and aos.sheepno=s.sheepno and aos.sheepstatusno=ist.itemstatusno and s.sheepno=:no";
    $stt = $this->dbo->prepare($sql);
    $stt->execute(array("no"=>$no));
    return $stt;
  }

  public function getOrder($userid) {
    $sql = "select os.objsheepid, u.userid, sl.shoppeddate, sos.styleimg, sos.stylename, os.objsheepname, os.objsheepcurstar from user u, styleofsheep sos, kindofsheep kos, sheep s, allofsheep aos, objsheep os, shoppinglist sl
    where s.kindno=kos.kindno and s.styleno=sos.styleno
    and aos.sheepno=s.sheepno
    and os.objsheepno=aos.sheepno
    and u.userid=os.objsheepuserid
    and sl.shoppingno=os.objsheepno
    and u.userid=:userid";
    $stt = $this->dbo->prepare($sql);
    $result = $stt->execute(array("userid"=>$userid));
    return $stt;
  }
}
 ?>
