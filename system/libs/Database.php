<?php
class Database extends PDO
{
  public function __construct($connect, $user, $password)
  {
    // $db = new PDO($connect, $user, $password);
    parent::__construct($connect, $user, $password);
  }
  public function select($sql, $data = array(), $fetchStyle = PDO::FETCH_ASSOC)
  {
    $statement = $this->prepare($sql);
    foreach ($data as $key => $value) {
      $statement->bindParam($key, $value);
    }
    // $statement->bindParam(':id',$id);
    $statement->execute();
    return $statement->fetchAll($fetchStyle);
  }

  public function insert($table, $data)
  { 
    $keys = implode(',', array_keys($data));
    $values = ':' . implode(', :', array_keys($data));
    $sql = "INSERT INTO $table($keys) VALUES($values)";
    $statement = $this->prepare($sql);
    foreach ($data as $key => $value) {
      $statement->bindValue(":$key", $value);
    }
    return $statement->execute();
  }
}