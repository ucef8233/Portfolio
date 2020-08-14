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
      $result = $connexion->connectadmin("identifiants");
      if ($result) :
        if (($_POST['password'] === $result['mdp']) && ($login === $result['login'])) :
          header("Location:dashbord.php");
        else :
          header("Location:login.php?erreur=ko");
        endif;
      endif;
    endif;
  }
}
