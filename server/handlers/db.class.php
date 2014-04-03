<?php

class Db{

  private $host;
  private $db;
  private $user;
  private $pass;
  private $connection;

  function __construct()
  {
    $this->host = DB_HOST;
    $this->db = DB_DB;
    $this->user = DB_USER;
    $this->pass = DB_PASS;
  }

  public function getConnection()
  {
    if(isset($this->connection))
    {
      return $this->connection;
    }
    // concat the connection string
    $conString = "mysql:host=" . $this->host . ";dbname=" . $this->db;

    // get proper error handling from PDO by using try-catch blocks. (This is in any case a must when connecting).
    try
    {

      // make the connection
      $db = new PDO($conString, $this->user, $this->pass);

      // set errormode
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
      // since we don't want to use latin, we should define using utf-8 for our queries
      $db->exec("SET CHARACTER SET utf8");

    }catch(PDOException $e) {
      echo $e->getMessage();
      exit();
    }
    
    $this->connection = $db;
    return $this->connection;
  }

  /**
   * @param string $q
   * @param array $r
   * @param string $f
   * @return array 
   */
  public function dbQuery($q, $r = array(), $f = 'fetchAll')
  {
    $statement = $this->connection->prepare($q);
    if(count($r) > 0)
    {
      $statement->execute($r);
    }
    else
    {
      $statement->execute();
    }
    if($this->ifReturn($q))
    {
      return $statement->$f(PDO::FETCH_ASSOC);
    }
  }

  private function ifReturn($q)
  {
    if(is_numeric(strpos($q, 'UPDATE')))
    {
      return false;
    }
    else if(is_numeric(strpos($q, 'INSERT')))
    {
      return false;
    }   
    return true;
  }
}