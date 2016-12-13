

create table usertype (
  usertypeno int,
  usertype varchar(255),
  PRIMARY KEY(usertypeno)
);
-- 1/master
-- 2/user


create table user(
  userid varchar(255),
  userpw varchar(255),
  username varchar(255),
  usernick varchar(255),
  userage int,
  userbirth date,
  userpoint int, -- 디폴트 0원 설정 아직임!
  userpointrate int, -- 나중에 usertype으로 옮길것
  usertypeno int,
  useremail varchar(255),
  PRIMARY KEY(userid),
  FOREIGN KEY(usertypeno) REFERENCES usertype(usertypeno)
);
-- jina/jina/-/mynameisjina/-/-/0/1(user)/-


create table kindofsheep(
  kindno int,
  kindname varchar(255),
  kindcomment varchar(300),
  PRIMARY KEY(kindno)
);
-- 1/플레인램/-

create table styleofsheep(
  styleno int,
  stylename varchar(255),
  PRIMARY KEY(styleno)
);
-- 1/흰색 플레인램/-
-- 2/먹색 플레인램/-

create table sheep(
  sheepno int,
  kindno int,
  styleno int,
  PRIMARY KEY(sheepno),
  FOREIGN KEY(kindno) REFERENCES kindofsheep(kindno),
  FOREIGN KEY(styleno) REFERENCES styleofsheep(styleno)
);
-- 1/1(플레인램)/1(흰색플레인램)
-- 2/1(플레인램)/2(먹색플레인램)

create table itemstatus(
  itemstatusno int,
  itemstatusname varchar(255),
  itemstatusimg varchar(255),
  PRIMARY KEY(itemstatusno)
);
-- 1/신제품/-

create table allfsheep(
  sheepno int,
  sheepprice int,
  sheepsalerate decimal,
  sheepimg varchar(300),
  sheepstatusno int,
  sheepstar int,
  buycount int,
  PRIMARY KEY(sheepno),
  FOREIGN KEY(sheepno) REFERENCES sheep(sheepno),
  FOREIGN KEY(sheepstatusno) REFERENCES itemstatus(itemstatusno)
);
-- 1(whiteplain)/2500/0/1(new)/1/1
-- 2(greypain)/2500/0/1(new)/1/1

create table objsheep(
  objsheepid int,
  objsheepname varchar(255),
  objsheepno int,
  objsheepuserid varchar(255),
  objsheepcurstar int,
  PRIMARY KEY(objsheepid),
  FOREIGN KEY(objsheepno) REFERENCES allofsheep(sheepno),
  FOREIGN KEY(objsheepuserid) REFERENCES user(userid)
);
-- 1/1(whiteplain)/jina/0

create table listcategory(
  listcategoryno int,
  listcategoryname varchar(255),
  PRIMARY KEY(listcategoryno)
);
-- 1/

create table displaygroup(
  listcategoryno int,
  sheepno int,
  FOREIGN KEY(listcategoryno) REFERENCES listcategory(listcategoryno),
  FOREIGN KEY(sheepno) REFERENCES allofsheep(sheepno)
);





create table freecategory(
  categoryno int,
  categoryname varchar(255),
  PRIMARY KEY(categoryno)
);

create table free(
  freeno int,
  freecategoryno int,
  freewriter varchar(255),
  freenotice boolean,
  freedate date,
  freetitle varchar(255),
  freecontent varchar(1000),
  freesuper int,
  PRIMARY KEY(freeno),
  FOREIGN KEY(freewriter) REFERENCES user(userid),
  FOREIGN KEY(freesuper) REFERENCES free(freeno)
);






create table bucketlist(
  userid varchar(255),
  sheepno int,
  FOREIGN KEY(userid) REFERENCES user(userid),
  FOREIGN KEY(sheepno) REFERENCES allofsheep(sheepno)
);

create table shoppinglist(
  shoppingno int,
  shopperid varchar(255),
  shoppedsheepno int,
  shoppeddate varchar(255),
  PRIMARY KEY(shoppingno),
  FOREIGN KEY(shopperid) REFERENCES user(userid),
  FOREIGN KEY(shoppedsheepno) REFERENCES allofsheep(sheepno)
);
