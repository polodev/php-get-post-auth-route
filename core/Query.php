<?php
class Query {
  public $connection ;
  public function __construct($pdo)
  {
    $this->connection = $pdo;
  }
}