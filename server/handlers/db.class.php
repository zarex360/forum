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

  public function dbQuery()
  {
    $fetchOpt = 'fetchAll';
    $args = func_get_args();

    $statement = $this->connection->prepare($args[0][0]);
    if(isset($args[0][1]))
    {
      $statement->execute($args[0][1]);
    }
    else
    {
      $statement->execute();
    }

    if(isset($args[0][2]))
    {
      $fetchOpt = $args[0][2];
    }
    return $statement->$fetchOpt(PDO::FETCH_ASSOC);
  }
}