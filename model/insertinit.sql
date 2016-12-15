insert into usertype values(1, "master", 0);
insert into usertype(usertypeno, usertype) values(2, "user");

insert into user (userid, userpw, usernick, userpoint, usertypeno) values('jina', 'jina', 'i am jin-a', 0, 1);
insert into user (userid, userpw, usernick, userpoint, usertypeno) values('jiina', 'jina', 'i am user jin-a', 0, 2);

insert into kindofsheep (kindname, kindcomment) values("plain", "코튼캔디힐의 기본적인 양!");
insert into kindofsheep (kindname, kindcomment) values("cream", "슈크림언덕에서 건너온 슈크림램! 다른 양에 비해 몸집이 크고 느긋하다.");

insert into styleofsheep (stylename) values("white");
insert into styleofsheep (stylename) values("grey");
insert into styleofsheep (stylename) values("brown");
insert into styleofsheep (stylename) values("yellow");
insert into styleofsheep (stylename) values("sky");
insert into styleofsheep (stylename) values("orangedot");


insert into itemstatus values(1, "new", "../../img/status_new.png");
insert into itemstatus values(2, "hot", "../../img/status_hot.png");


insert into sheep(sheepname, kindno, styleno, sheepsalerate, sheepprice, sheepimg, sheepstatusno, sheepstar, buycount)
  values("whiteplain",1,1,0.05,2500,"../../img/white_plain.png",1,1,0);
insert into sheep(sheepname, kindno, styleno, sheepsalerate, sheepprice, sheepimg, sheepstatusno, sheepstar, buycount)
  values("greyplain",1,2,0.05,2500,"../../img/grey_plain.png",1,1,0);
insert into sheep(sheepname, kindno, styleno, sheepsalerate, sheepprice, sheepimg, sheepstatusno, sheepstar, buycount)
  values("browncream",2,3,0.05,8500,"../../img/brown_cream.png",1,1,0);
insert into sheep(sheepname, kindno, styleno, sheepsalerate, sheepprice, sheepimg, sheepstatusno, sheepstar, buycount)
  values("orangedotplain",1,6,0.05,9500,"../../img/orangedot_plain.png",1,3,0);

-- insert into objsheep(objsheepno, objsheepname, objsheepuserid, objsheepcurstar) values(1, 1, 'jina', 0);


--
--
-- -- 카테고리이름/양이미지/양팔림상태/양이름/양품질/가갹
-- -- list.php
-- select lc.listcategoryname, sos.styleimg, sos.stylename, ist.itemstatusname, aos.sheepstar, aos.sheepprice
-- from listcategory lc, allofsheep aos, styleofsheep sos, itemstatus ist, sheep, displaygroup
-- where aos.sheepno = sheep.sheepno
-- and sheep.styleno=sos.styleno
-- and aos.sheepstatusno=ist.itemstatusno
-- and lc.listcategoryno=displaygroup.listcategoryno
-- and displaygroup.sheepno=sheep.sheepno
-- and lc.listcategoryno=:category
--
-- -- detail
-- select   sos.styleimg, sos.stylename, kos.kindcomment, aos.sheepprice, sos.stylename, aos.sheepstar, ist.itemstatusname
-- from styleofsheep sos, kindofsheep kos, sheep s, allofsheep aos, itemstatus ist
-- where s.kindno=kos.kindno and s.styleno=sos.styleno
-- and aos.sheepno=s.sheepno
-- and aos.sheepstatusno=ist.itemstatusno
-- and s.sheepno=:no;
--
--
-- select os.objsheepid, u.userid, sl.shoppeddate, sos.styleimg, sos.stylename, os.objsheepname, os.objsheepcurstar
-- from user u, styleofsheep sos, kindofsheep kos, sheep s, allofsheep aos, objsheep os, shoppinglist sl
-- where s.kindno=kos.kindno and s.styleno=sos.styleno
-- and aos.sheepno=s.sheepno
-- and os.objsheepno=aos.sheepno
-- and u.userid=os.objsheepuserid
-- and sl.shoppingno=os.objsheepno;
--
--
-- -- 모든 조인
-- select ut.usertypename, u.userid, sos.stylename, kos.kindname, s.sheepno, aos.sheepstar, os.objsheepcurstar, ist.itemstatusname, lc.listcategoryname, sl.shoppeddate
-- from usertype ut, user u, styleofsheep sos, kindofsheep kos, sheep s, allofsheep aos, objsheep os, itemstatus ist, listcategory lc, displaygroup d, shoppinglist sl
-- where ut.usertypeno=u.usertypeno
-- and s.kindno=kos.kindno and s.styleno=sos.styleno
-- and aos.sheepno=s.sheepno
-- and aos.sheepstatusno=ist.itemstatusno
-- and os.objsheepno=aos.sheepno
-- and lc.listcategoryno=d.listcategoryno
-- and d.sheepno=aos.sheepno
-- and u.userid=os.objsheepuserid
-- and sl.shoppingno=os.objsheepno;
-- and ;
