<?php

namespace AdimeoDataSuite\PDO;

class PDOPool
{

  /**
   * @var \PDO[]
   */
  private $pool;

  public function __construct() {
    $this->pool = [];
  }

  /**
   * @param string $dsn
   * @param string $username
   * @param string $password
   * @return \PDO
   */
  public function getHandler($dsn, $username, $password){
    if(!isset($this->pool[$dsn . '__' . $username])){
      $pdo = new \PDO($dsn, $username, $password, array(\PDO::ATTR_TIMEOUT => 900));
      $this->pool[$dsn . '__' . $username] = $pdo;
    }
    return $this->pool[$dsn . '__' . $username];
  }
}