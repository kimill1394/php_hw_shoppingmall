

create table usertype (
  usertypeno int,
  usertype varchar(255),
  userpointrate decimal(2,1) default 0.1, -- 나중에 usertype으로 옮길것
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
  userbirth varchar(255),
  userpoint int default 0,
  usertypeno int default 2,
  useremail varchar(255),
  PRIMARY KEY(userid),
  FOREIGN KEY(usertypeno) REFERENCES usertype(usertypeno)
);
-- jina/jina/-/mynameisjina/-/-/0/1(user)/-


create table kindofsheep(
  kindno int auto_increment,
  kindname varchar(255),
  kindcomment varchar(300),
  PRIMARY KEY(kindno)
);
-- 1/플레인램/-

create table styleofsheep(
  styleno int auto_increment,
  stylename varchar(255),
  PRIMARY KEY(styleno)
);
-- 1/흰색 플레인램/-
-- 2/먹색 플레인램/-


create table itemstatus(
  itemstatusno int auto_increment,
  itemstatusname varchar(255),
  itemstatusimg varchar(255),
  PRIMARY KEY(itemstatusno)
);
-- 1/신제품/-

create table sheep(
  sheepno int auto_increment,
  sheepname varchar(255),
  kindno int,
  styleno int,
  sheepsalerate decimal(2, 1) default 0.2, -- 신상품 할인율
  sheepprice int,
  sheepimg varchar(300),
  sheepstatusno int default 1, -- 신상품 표시
  sheepstar int,
  buycount int default 0,
  PRIMARY KEY(sheepno),
  FOREIGN KEY(kindno) REFERENCES kindofsheep(kindno),
  FOREIGN KEY(styleno) REFERENCES styleofsheep(styleno),
  FOREIGN KEY(sheepstatusno) REFERENCES itemstatus(itemstatusno)
);
-- 1(whiteplain)/2500/0/1(new)/1/1
-- 2(greypain)/2500/0/1(new)/1/1
--
-- create table objsheep(
--   objsheepid int auto_increment,
--   objsheepno int,
--   objsheepname varchar(255),
--   objsheepuserid varchar(255),
--   objsheepcurstar int,
--   PRIMARY KEY(objsheepid),
--   FOREIGN KEY(objsheepno) REFERENCES sheep(sheepno),
--   FOREIGN KEY(objsheepuserid) REFERENCES user(userid)
-- );
-- 1/1(whiteplain)/jina/0

create table shoppinglist(
  shoppingno int auto_increment,
  shopperid varchar(255),
  shoppedsheepno int,
  shoppeddate varchar(255),
  PRIMARY KEY(shoppingno),
  FOREIGN KEY(shopperid) REFERENCES user(userid),
  FOREIGN KEY(shoppedsheepno) REFERENCES sheep(sheepno)
);




-- create table listcategory(
--   listcategoryno int auto_increment,
--   listcategoryname varchar(255),
--   PRIMARY KEY(listcategoryno)
-- );
-- -- 1/
--
-- create table displaygroup(
--   listcategoryno int,
--   sheepno int,
--   FOREIGN KEY(listcategoryno) REFERENCES listcategory(listcategoryno),
--   FOREIGN KEY(sheepno) REFERENCES sheep(sheepno)
-- );




--
-- create table freecategory(
--   categoryno int,
--   categoryname varchar(255),
--   PRIMARY KEY(categoryno)
-- );

create table free(
  freeno int,
  -- freecategoryno int,
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

CREATE TABLE `file` (
  `freeno` int(11) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `filepath` varchar(255) DEFAULT NULL,
  `filedate` varchar(255) DEFAULT NULL,
  KEY `freeno` (`freeno`),
  CONSTRAINT `file_ibfk_1` FOREIGN KEY (`freeno`) REFERENCES `free` (`freeno`)
)
--
-- create table bucketlist(
--   userid varchar(255),
--   sheepno int,
--   FOREIGN KEY(userid) REFERENCES user(userid),
--   FOREIGN KEY(sheepno) REFERENCES allofsheep(sheepno)
-- );
