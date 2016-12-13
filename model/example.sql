insert into usertype values(1, "master");
insert into usertype values(2, "user");

-- insert into user (userid, userpw, usernick, userpoint, usertypeno) values('jina', 'jina', 'imjina', 0, 2);

insert into kindofsheep (kindno, kindname) values(1,"plain");
insert into kindofsheep (kindno, kindname) values(2,"cream");

insert into styleofsheep (styleno, stylename) values(1, "white");
insert into styleofsheep (styleno, stylename) values(2, "grey");
insert into styleofsheep (styleno, stylename) values(3, "brown");
insert into styleofsheep (styleno, stylename) values(4, "yellow");
insert into styleofsheep (styleno, stylename) values(5, "sky");
insert into styleofsheep (styleno, stylename) values(6, "orangedot");


insert into sheep values(1, 1, 1); --white plain
insert into sheep values(2, 1, 2); --grey plain
insert into sheep values(3, 2, 3); --brown cream
insert into sheep values(4, 1, 6); --orangdot plain

insert into itemstatus values(1, "new", "../../img/");
insert into itemstatus values(2, "hot", null);

insert into sheep values(1, 1, 1);
  insert into sheep values(2, 1, 2);


insert into allofsheep values(1,2500,0,1,1,1);
  insert into allofsheep values(2,2500,0,1,1,1);





insert into objsheep(objsheepid, objsheepno, objsheepuserid, objsheepcurstar) values(1, 1, 'jina', 0);

insert into listcategory values(1, "all");
insert into listcategory values(2, "plain");
insert into listcategory values(3, "blazing");
insert into listcategory values(4, "best");
insert into listcategory values(5, "new");
insert into listcategory values(6, "cream");
insert into listcategory values(7, "angel");
insert into listcategory values(8, "devil");

insert into displaygroup values(1, 1);
insert into displaygroup values(1, 2);




-- 카테고리이름/양이미지/양팔림상태/양이름/양품질/가갹
-- list.php
select lc.listcategoryname, sos.styleimg, sos.stylename, ist.itemstatusname, aos.sheepstar, aos.sheepprice
from listcategory lc, allofsheep aos, styleofsheep sos, itemstatus ist, sheep, displaygroup
where aos.sheepno = sheep.sheepno
and sheep.styleno=sos.styleno
and aos.sheepstatusno=ist.itemstatusno
and lc.listcategoryno=displaygroup.listcategoryno
and displaygroup.sheepno=sheep.sheepno
and lc.listcategoryno=:category

-- detail
select   sos.styleimg, sos.stylename, kos.kindcomment, aos.sheepprice, sos.stylename, aos.sheepstar, ist.itemstatusname
from styleofsheep sos, kindofsheep kos, sheep s, allofsheep aos, itemstatus ist
where s.kindno=kos.kindno and s.styleno=sos.styleno
and aos.sheepno=s.sheepno
and aos.sheepstatusno=ist.itemstatusno
and s.sheepno=:no;


select os.objsheepid, u.userid, sl.shoppeddate, sos.styleimg, sos.stylename, os.objsheepname, os.objsheepcurstar
from user u, styleofsheep sos, kindofsheep kos, sheep s, allofsheep aos, objsheep os, shoppinglist sl
where s.kindno=kos.kindno and s.styleno=sos.styleno
and aos.sheepno=s.sheepno
and os.objsheepno=aos.sheepno
and u.userid=os.objsheepuserid
and sl.shoppingno=os.objsheepno;


-- 모든 조인
select ut.usertypename, u.userid, sos.stylename, kos.kindname, s.sheepno, aos.sheepstar, os.objsheepcurstar, ist.itemstatusname, lc.listcategoryname, sl.shoppeddate
from usertype ut, user u, styleofsheep sos, kindofsheep kos, sheep s, allofsheep aos, objsheep os, itemstatus ist, listcategory lc, displaygroup d, shoppinglist sl
where ut.usertypeno=u.usertypeno
and s.kindno=kos.kindno and s.styleno=sos.styleno
and aos.sheepno=s.sheepno
and aos.sheepstatusno=ist.itemstatusno
and os.objsheepno=aos.sheepno
and lc.listcategoryno=d.listcategoryno
and d.sheepno=aos.sheepno
and u.userid=os.objsheepuserid
and sl.shoppingno=os.objsheepno;
and ;
