<?php


namespace portfolio\classes\Database;

/**
 * @param Functions $id id select id user 
 */
class Getter extends Crud
{
  private $table_name;

  // fonction d'ajout d'utulisateur'
  public static function get_create()
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
      $projet = new Crud('projet');
      $result = $projet->selectOne($nom, 'nom');
      if ($result) :
        header("location:dashboard.php?p=add&error=exist");
      else :
        $projet = new Crud('projet');
        $projet->set_create($champs);
      endif;
    endif;
  }
  ///////insertcv
  public static function get_createCv($table_name)
  {
    if ((isset($_POST['add_cv'])) && ($table_name == "experiances")) :
      $date = addslashes($_POST['experiance_date']);
      $description =  addslashes($_POST['experiance_desc']);
      $champs = [
        'date' => $date,
        'description' =>  $description,
        'info_admin' => "1"
      ];
      $cv = new Crud($table_name);
      $cv->set_create($champs);
    endif;
    if ((isset($_POST['add_etude'])) && ($table_name == "etudes")) :
      $date = addslashes($_POST['etude_date']);
      $description =  addslashes($_POST['etude_desc']);
      $champs = [
        'date' => $date,
        'description' =>  $description,
        'info_admin' => "1"
      ];
      $cv = new Crud($table_name);
      $cv->set_create($champs);
    endif;
    if ((isset($_POST['add_langage'])) && ($table_name == "langages")) :
      $langage =  addslashes($_POST['langage']);
      $champs = [
        'langage' => $langage,
        'info_admin' => "1"
      ];
      $cv = new Crud($table_name);
      $cv->set_create($champs);
    endif;
    if ((isset($_POST['add_softskills'])) && ($table_name == "softskills")) :
      $softskills =  addslashes($_POST['softskills']);
      $champs = [
        'softskills' => $softskills,
        'info_admin' => "1"
      ];
      $cv = new Crud($table_name);
      $cv->set_create($champs);
    endif;
  }
  /// fonction de supretion projet
  public static function get_delet($table_name, $where): void
  {
    if (isset($_GET['id'])) :
      $id = $_GET['id'];
      $projet = new Crud($table_name);
      $projet->set_delete($id, $where);
      if ($table_name == "projet") :
        header('location:dashboard.php');
      else :
        header('location:dashboard.php?p=editcv&delet=ok');
      endif;
    endif;
  }
  public static function get_update()
  {
    // $id = new Utulisateur;
    $projetId = $_GET['id'];
    if (!$projetId) :
      header('location:dashboard.php?p=404');
    endif;
    $projet = new Crud('projet');
    $result = $projet->selectOne($projetId, 'id');
    if (isset($_POST['edit'])) :
      $nom = addslashes($_POST['projet_name']);
      $lien = $_POST['projet_lien'];
      $image = $_POST['projet_image'];
      $description = addslashes($_POST['projet_description']);
      $champs = [
        'nom' => $nom,
        'lien' => $lien,
        'image' => $image,
        'description' => $description
      ];
      $id = $_POST['id'];
      $projet->set_update($champs, $id);
    endif;
    return $result;
  }
  public static function get_updateCv()
  {
    if (isset($_POST['editprofil'])) :
      $nom = addslashes($_POST['nom_user']);
      $titre =  addslashes($_POST['titre_user']);
      $mail = $_POST['mail_user'];
      $adress = addslashes($_POST['adress_user']);
      $champs = [
        'nom' => $nom,
        'titre' => $titre,
        'mail' => $mail,
        'adress' => $adress
      ];
      $id = $_POST['id_admin'];
      $projet = new Crud('info_admin');
      $projet->set_update($champs, $id);
    endif;
  }
}
