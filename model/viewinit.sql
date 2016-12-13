create view sheepview
  as
    select lc.listcategoryname, sheep.sheepno , sos.styleimg, kos.kindcomment, sos.stylename, ist.itemstatusname, aos.sheepstar, aos.sheepprice
    from listcategory lc, allofsheep aos, styleofsheep sos, itemstatus ist, kindofsheep kos, sheep where aos.sheepno = sheep.sheepno and sheep.kindno=kos.kindno and sheep.styleno=sos.styleno and aos.sheepstatusno=ist.itemstatusno;

// 상품정보 총망라!
// 양이름/양종류/양품질/양가격/양이미지/양설명/아이템스탯/리스트
