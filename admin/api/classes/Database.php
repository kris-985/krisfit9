<?php

class Database
{
  private $host;
  private $username;
  private $password;
  private $dbname;
  private $charset;
  private $pdo;

  public function __construct($host, $username, $password, $dbname, $charset = 'utf8')
  {
    $this->host = $host;
    $this->username = $username;
    $this->password = $password;
    $this->dbname = $dbname;
    $this->charset = $charset;

    $this->connect();
  }

  private function connect()
  {
    $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset={$this->charset}";

    try {
      $this->pdo = new PDO($dsn, $this->username, $this->password);
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      die("Connection failed: " . $e->getMessage());
    }
  }

  public function query($sql, $params = [])
  {
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute($params);
    return $stmt;
  }

  public function select($sql, $params = [])
  {
    $stmt = $this->query($sql, $params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function insert($table, $data)
  {
    $keys = implode(', ', array_keys($data));
    $values = ':' . implode(', :', array_keys($data));
    $sql = "INSERT INTO $table ($keys) VALUES ($values)";
    $this->query($sql, $data);
  }

  public function update($table, $data, $where)
  {
    $set = '';
    foreach ($data as $key => $value) {
      $set .= $key . '=:' . $key . ', ';
    }
    $set = rtrim($set, ', ');

    $sql = "UPDATE $table SET $set WHERE $where";
    $this->query($sql, $data);
  }

  public function delete($table, $where, $params = [])
  {
    $sql = "DELETE FROM $table WHERE $where";
    $this->query($sql, $params);
  }

  public function lastInsertedId() {
    return $this->pdo->lastInsertId();
  }
}