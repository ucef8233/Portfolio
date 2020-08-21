<?php

namespace portfolio\classes\Database;

use \PDO;

class Crud extends Db

{

  private $table_name;

  public function __construct(string $table_name)
  {

    $this->table_name = $table_name;
  }

  public  function Read($table_join = null): array
  {
    if ($table_join !== null) :
      $sql = 'SELECT * FROM ' . $this->table_name . ' INNER JOIN ' . $table_join . ' ON ' . $this->table_name . '.id_admin = ' . $table_join . '.info_admin ';
    else :
      $sql = 'SELECT * FROM ' . $this->table_name . '';
    endif;
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
  protected function set_create(array $champs)
  {
    $implodeColumns = implode(', ', array_keys($champs));
    $implodePlaceholder = implode(", :", array_keys($champs));
    $sql = 'INSERT INTO ' . $this->table_name . ' (' . $implodeColumns . ') VALUES (:' . $implodePlaceholder . ')';
    $stmt = $this->connect()->prepare($sql);
    foreach ($champs as $key => $value) :
      $stmt->bindValue(':' . $key, $value);
    endforeach;
    $stmtExec = $stmt->execute();
    if ($stmtExec) :
      if ($this->table_name == "projet") :
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
  protected function selectOne(string $id, string $type)
  {
    $sql = 'SELECT * FROM ' . $this->table_name . ' WHERE ' . $type . ' = :id';
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindValue(":id", $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
  }


  /**
   * @param array $champs table des info a modiffier 
   * @param number $id id de l'utulisateur a modiffier 
   */
  protected function set_update(array $champs, string $id)
  {
    if ($this->table_name == 'projet') :
      $sql = ('UPDATE ' . $this->table_name . ' SET nom = :nom,image = :image, lien = :lien, description = :description WHERE id = ' . $id . '');
    else :
      $sql = ('UPDATE ' . $this->table_name . ' SET nom = :nom,titre = :titre, mail = :mail, adress = :adress WHERE id_admin = ' . $id . '');
    endif;
    $stmt = $this->connect()->prepare($sql);
    foreach ($champs as $key => $value) :
      $stmt->bindValue(':' . $key, $value);
    endforeach;
    $stmtExec = $stmt->execute();
    if ($stmtExec) :
      if ($this->table_name == 'projet') :
        header('Location:dashboard.php?p=home&edit=ok');
      else :
        header('Location:dashboard.php?p=editcv&edit=ok');
      endif;
    endif;
  }

  protected  function set_delete(string $id, string $where): void
  {
    $sql = 'DELETE  FROM ' . $this->table_name . ' WHERE ' . $where . ' = :id';
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmtExec = $stmt->execute();
  }
}
