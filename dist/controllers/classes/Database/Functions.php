<?php


namespace portfolio\classes\Database;

require_once "Utulisateur.php";
/**
 * @param Functions $id id select id user 
 */
class Functions
{
  // fonction d'ajout d'utulisateur'
  public static function insert($table_user)
  {
    if (isset($_POST['add'])) :
      $nom = addslashes($_POST['projet_name']);
      $lien = $_POST['projet_lien'];
      $image = $_POST['projet_image'];
      $description = addslashes($_POST['projet_description']);
      $champs = [
        'nom' => $nom,
        'image' =>  $image,
        'lien' =>  $lien,
        'description' => $description
      ];
      $utulisateurs = new Utulisateur;
      $result = $utulisateurs->selectOne($nom, $table_user, 'nom');
      if ($result) :
        header("location:dashbord.php?p=add&error=exist");
      else :
        $utulisateurs->insert($table_user, $champs);
      endif;
    endif;
  }
  /// fonction de supretion d'utulisateur 
  public static function delet()
  {
    if (isset($_GET['del'])) :
      $id = $_GET['del'];
      $utulisateur = new Utulisateur;
      $utulisateur->delet($id);
    // header('Location :../index.php');
    endif;
  }
  public static function edit($table_name)
  {
    $id = new Utulisateur;
    $userId = $id->getId();
    if (!$userId) :
      header('location:admin.php?p=404');
    endif;
    $utulisateurs = new Utulisateur;
    $result = $utulisateurs->selectOne($userId, $table_name, 'id');
    if (isset($_POST['submit'])) :
      $nom = addslashes($_POST['nom']);
      // $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
      $email = $_POST['email'];
      $adress = addslashes($_POST['adress']);
      $champs = [
        'nom' => $nom,
        'mail' => $email,
        // 'password' => $password,
        'adress' => $adress
      ];
      $id = $_POST['id'];
      $utulisateur = new Utulisateur;
      $utulisateur->update($champs, $id);
    endif;
    return $result;
  }
  /// function de modification d'utulisateur

}
