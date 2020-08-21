<?php

namespace portfolio\classes\Database;

use \PDO;

class Connexion_exec extends Db
{
  private static function get_Cnx($table_name): array
  {
    $sql = 'SELECT * FROM ' . $table_name . '';
    $stmt = self::connect()->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
  }
  public static function set_Cnx()
  {
    if (isset($_POST['connexion'])) :
      $login = $_POST['username'];
      $result = self::get_Cnx('info_admin');
      $_SESSION['log'] = $result;
      if ($result) :
        if (($_POST['password'] === $result['mdp']) && ($login === $result['login'])) :
          header("Location:dashboard.php");
        else :
          header("Location:index.php?p=loginuser&erreur=ko");
        endif;
      endif;
    endif;
  }
}
