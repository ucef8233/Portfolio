<?php

namespace portfolio\classes\Database;

use \PDO;

class Utulisateur extends Db
// recuperation de tout les utulisateur de la base de donnée
{
  // public $table_name;

  /**
   * @return array tout les info de la base de donnée
   */
  public function select($table_name)
  {
    $sql = "SELECT * FROM $table_name ";
    $result = $this->connect()->query($sql);
    if ($result->rowCount() > 0) :
      while ($row = $result->fetch()) :
        $data[] = $row;
      endwhile;
      return $data;
    endif;
  }
  public function selectCv($table_name, $table_join)
  {
    $sql = "SELECT * FROM $table_name INNER JOIN $table_join ON $table_name.id_admin = $table_join.info_admin ";
    $result = $this->connect()->query($sql);
    if ($result->rowCount() > 0) :
      while ($row = $result->fetch()) :
        $data[] = $row;
      endwhile;
      return $data;
    endif;
  }

  /**
   * @param array $champs tableau des info inserer par l'utuisateur
   */
  public function insert($table_name, $champs)
  {
    $implodeColumns = implode(', ', array_keys($champs));
    $implodePlaceholder = implode(", :", array_keys($champs));
    $sql = "INSERT INTO $table_name ($implodeColumns) VALUES (:" . $implodePlaceholder . ")";
    $stmt = $this->connect()->prepare($sql);
    foreach ($champs as $key => $value) :
      $stmt->bindValue(':' . $key, $value);
    endforeach;
    $stmtExec = $stmt->execute();
    if ($stmtExec) :
      if ($table_name == "projet") :
        header('Location:dashboard.php?p=home&add=ok');
      else :
        header('Location:dashboard.php?p=editcv&add=ok');
      endif;
    endif;
  }


  /**
   * @param number $id id selectionner par l'utulisateur
   * 
   * @return [array] $result tableau des information de l'utulisateur liée a la variable $id
   */
  public function selectOne($id, $table_name, $type)
  {
    $sql = "SELECT * FROM $table_name WHERE $type = :id";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindValue(":id", $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    // $_SESSION[$table_name] = $result;
    return $result;
  }
  public function connectadmin($table_name)
  {
    $sql = "SELECT * FROM $table_name";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
  }

  /**
   * @param array $champs table des info a modiffier 
   * @param number $id id de l'utulisateur a modiffier 
   */
  public function update($table_name, $champs, $id)
  {
    $sql = ("UPDATE $table_name SET nom = :nom,image = :image, lien = :lien, description = :description WHERE id = $id");
    $stmt = $this->connect()->prepare($sql);
    foreach ($champs as $key => $value) :
      $stmt->bindValue(':' . $key, $value);
    endforeach;
    $stmtExec = $stmt->execute();
    if ($stmtExec) :
      header('Location:dashboard.php?p=home&edit=ok');
    endif;
  }

  public function updateProfil($table_name, $champs, $id)
  {
    $sql = ("UPDATE $table_name SET nom = :nom,titre = :titre, mail = :mail, adress = :adress WHERE id_admin = $id");
    $stmt = $this->connect()->prepare($sql);
    foreach ($champs as $key => $value) :
      $stmt->bindValue(':' . $key, $value);
    endforeach;
    $stmtExec = $stmt->execute();
    if ($stmtExec) :
      header('Location:dashboard.php?p=editcv&edit=ok');
    endif;
  }

  /**
   * @param number $id
   */
  public function delet($id, $table_name, $id_table)
  {
    $sql = "DELETE  FROM $table_name WHERE $id_table = :id";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmtExec = $stmt->execute();
  }
}
