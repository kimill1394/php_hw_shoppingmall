<?php



$dsn  = 'mysql:host=localhost;dbname=sheepshop;';
$user = 'jina';
$pass = 'jina';
try {
  $pdo = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
  exit("DB접속불가: {$e->getMessage()}");
}


$sql = "select * from listcategory";
$stt=$pdo->prepare($sql);
$stt->execute();

while($row=$stt->fetch()) {
  var_dump($row);
  print "<br><br><br>";
}




 ?>
