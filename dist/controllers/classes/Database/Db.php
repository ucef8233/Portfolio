<?php

namespace portfolio\classes\Database;

use \PDO;
use \PDOException;

class   Db
// connexion a la base de donnée
{
  /**JKQS
   * @return string
   */
  protected function connect()
  {
    try {
      $conn = new PDO("mysql:host=localhost;dbname=portfolio", 'root', '');
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // echo "Connected successfully";
      return $conn;
    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  }
}
