<?php
  class DBMS {
    private $dbo;

    public function __construct() {
      $this->dbo = $this->connect();
    }
    private function connect() {
      $dsn  = 'mysql:host=localhost;dbname=sheepshop;';
      $user = 'jina';
      $pass = 'jina';
      try {
        $pdo = new PDO($dsn, $user, $pass);
      } catch (PDOException $e) {
        exit("DB접속불가: {$e->getMessage()}");
      }
      return $pdo;
    }

    public function getDbo() {
      return $this->dbo;
    }
  }
 ?>
