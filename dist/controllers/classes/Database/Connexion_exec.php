<?php

namespace portfolio\classes\Database;

require_once "Utulisateur.php";
class Connexion_exec
{
  public static function Cnx()
  {
    if (isset($_POST['connexion'])) :

      $login = $_POST['username'];
      $connexion = new Utulisateur;
      $result = $connexion->connectadmin("info_admin");
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
