<?php


namespace portfolio\classes\Database;

/**
 * @param Functions $id id select id user 
 */
class Functions
{
  public $data;
  // public $table_name;

  public function __construct(array $data)
  {
    $this->data = $data;
  }
  // fonction d'ajout d'utulisateur'
  public function insert($table_user)
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
      $utulisateurs = new Utulisateur(['table_name'=>]);
      $result = $utulisateurs->selectOne($nom, $table_user, 'nom');
      if ($result) :
        header("location:dashboard.php?p=add&error=exist");
      else :
        $utulisateurs->insert($table_user, $champs);
      endif;
    endif;
  }
  /////////insertcv
  public function insertCv($table_name)
  {
    if ((isset($_POST['add_cv'])) && ($table_name == "experiance")) :
      $date = addslashes($_POST['experiance_date']);
      $description =  addslashes($_POST['experiance_desc']);
      $champs = [
        'date' => $date,
        'description' =>  $description,
        'info_admin' => "1"
      ];
      $utulisateurs = new Utulisateur;
      $utulisateurs->insert($table_name, $champs);
    endif;
    if ((isset($_POST['add_etude'])) && ($table_name == "etudes")) :
      $date = addslashes($_POST['etude_date']);
      $description =  addslashes($_POST['etude_desc']);
      $champs = [
        'date' => $date,
        'description' =>  $description,
        'info_admin' => "1"
      ];
      $utulisateurs = new Utulisateur;
      $utulisateurs->insert($table_name, $champs);
    endif;
    if ((isset($_POST['add_langage'])) && ($table_name == "langages")) :
      $langage =  addslashes($_POST['langage']);
      $champs = [
        'langage' => $langage,
        'info_admin' => "1"
      ];
      $utulisateurs = new Utulisateur;
      $utulisateurs->insert($table_name, $champs);
    endif;
    if ((isset($_POST['add_softskills'])) && ($table_name == "softskills")) :
      $softskills =  addslashes($_POST['softskills']);
      $champs = [
        'softskills' => $softskills,
        'info_admin' => "1"
      ];
      $utulisateurs = new Utulisateur;
      $utulisateurs->insert($table_name, $champs);
    endif;
  }
  /// fonction de supretion d'utulisateur 
  public function delet($table_name, $id_table)
  {
    if (isset($_GET['id'])) :
      $id = $_GET['id'];
      $utulisateur = new Utulisateur;
      $utulisateur->delet($id, $table_name, $id_table);
      if ($table_name == "projet") :
        header('location:dashboard.php');
      else :
        header('location:dashboard.php?p=editcv&delet=ok');
      endif;
    endif;
  }
  public function edit($table_name)
  {
    $id = new Utulisateur;
    $projetId = $_GET['id'];
    if (!$projetId) :
      header('location:dashboard.php?p=404');
    endif;
    $utulisateurs = new Utulisateur;
    $result = $utulisateurs->selectOne($projetId, $table_name, 'id');
    if (isset($_POST['edit'])) :
      $nom = addslashes($_POST['projet_name']);
      // $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
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
      $utulisateur = new Utulisateur;
      $utulisateur->update($table_name, $champs, $id);
    endif;
    return $result;
  }
  public function editProfil($table_name)
  {
    $utulisateurs = new Utulisateur;
    $result = $utulisateurs->selectOne("1", $table_name, 'id_admin');
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
      $utulisateur = new Utulisateur;
      $utulisateur->updateProfil($table_name, $champs, $id);
    endif;
    return $result;
  }
}
