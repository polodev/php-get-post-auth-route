<?php
class DB {
  public function connection($config)
  {
    try  {
      return new PDO($config['dsn'], $config['user'], $config['password'], $config['options'] );
    } catch (PDOException $e) {
      die('Connection failed.  Error: ' . $e->getMessage());
    }

  }
}