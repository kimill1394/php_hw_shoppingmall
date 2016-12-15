create view v_sheep
  as
    select sheep.sheepno, sheep.sheepname, sheep.sheepsalerate, sheep.sheepprice, sheep.sheepimg, sheep.sheepstar, sheep.buycount, its.itemstatusimg, kos.kindname, kos.kindno, kos.kindcomment
    from sheep, itemstatus its, kindofsheep kos
    where sheep.kindno=kos.kindno
      and its.itemstatusno = sheep.sheepstatusno;



-- list.php, detail.php에서 사용할 양정보 뷰 ㅎ.ㅎ


-- user 타입과 정보를 묶은 겁니당 주문과 계산 시 유용~.~
create view v_user
  as
    select u.userid, u.username, u.usernick, u.userage, u.userpoint, t.usertype, t.userpointrate
    from user u, usertype t
    where u.usertypeno = t.usertypeno;selec



-- 구매목록에 사용할 구입양과 구입정보
 -- objsheep, sheep, v_user
create view v_shoppinglist
  as
    select l.shoppingno, l.shopperid, l.shoppedsheepno, l.shoppeddate, s.sheepname, s.sheepprice, s.sheepimg, s.sheepstar
    from sheep s, shoppinglist l
    where s.sheepno = l.shoppedsheepno;
