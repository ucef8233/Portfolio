<?php
// namece use

use \portfolio\classes\Database\Utulisateur;
use portfolio\classes\Database\Functions;
use portfolio\classes\HTML\Error;
use \portfolio\classes\HTML\Form;

$types = ['softskills', 'experiances', 'etudes', 'langages'];
$projets = new Utulisateur;
$result = Functions::editProfil('info_admin');

// foreach ($types as $type) :
//   $softskills = $projets->selectCv("info_admin", "softskills");
// endforeach;

$softskills = $projets->selectCv("info_admin", "softskills");
$experiances = $projets->selectCv("info_admin", "experiances");
$etudes = $projets->selectCv("info_admin", "etudes");
$langages = $projets->selectCv("info_admin", "langages");


Functions::insertCv('experiances');
Functions::insertCv('softskills');
Functions::insertCv('etudes');
Functions::insertCv('langages');

if (isset($_GET['type'])) :
  if ($_GET['type'] == "softskills") :
    Functions::delet("softskills", "id_softskills");
  endif;
  if ($_GET['type'] == "experiances") :
    Functions::delet("experiances", "id_experiance");
  endif;
  if ($_GET['type'] == "etudes") :
    Functions::delet("etudes", "id_etude");
  endif;
  if ($_GET['type'] == "langages") :
    Functions::delet("langages", "id_langage");
  endif;
endif;
?>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Edit Profile</h4>
            <?= Error::valid_edit("Profil") ?>
            <?= Error::valid_delet("Element") ?>
            <?= Error::valid_add("Element") ?>
          </div>
          <div class="card-body">
            <form method="POST">
              <div class="row">
                <input type="text" class="x" name="id_admin" value="<?= $result['id_admin'] ?>" required>
                <?= Form::input("5", "Nom", "nom_user", $result['nom']) ?>
                <?= Form::input("3", "Titre", "titre_user", $result['titre']) ?>
                <?= Form::input("4", "Email", "mail_user", $result['mail']) ?>
              </div>
              <div class="row">
                <?= Form::input("12", "Adress", "adress_user", $result['adress']) ?>
                <button type="submit" name="editprofil" class="btn btn-primary pull-right">Update Profile</button>
              </div>
            </form>
            <div class="row">
              <?= Form::table_header('Experiances') ?>
              <?php
              if ($experiances) :
                foreach ($experiances as $key => $experiance) : ?>
                  <tr>
                    <th scope="row"><?= $key + 1 ?></th>
                    <td><?= $experiance['date'] ?></td>
                    <td><?= $experiance['description'] ?></td>
                    <td><a href="dashboard.php?p=editcv&id=<?= $experiance['id_experiance'] ?>&type=experiances"><i class="fas fa-folder-minus"></i></a></td>
                  </tr>
              <?php endforeach;
              endif; ?>
              <?= Form::table_footer() ?>
              <?= Form::input("4", "Date", "experiance_date") ?>
              <?= Form::input("8", "Description", "experiance_desc") ?>
              <?= Form::form_footer("add_cv", "add Experiance") ?>
              <?= Form::table_header('SoftSkils') ?>
              <?php
              if ($softskills) :
                foreach ($softskills as $key => $softskill) : ?>
                  <tr>
                    <th scope="row"><?= $key + 1 ?></th>
                    <td><?= $softskill['softskills'] ?></td>
                    <td><a href="dashboard.php?p=editcv&id=<?= $softskill['id_softskills'] ?>&type=softskills"><i class="fas fa-folder-minus"></i></a></td>
                  </tr>
              <?php endforeach;
              endif; ?>
              <?= Form::table_footer() ?>
              <?= Form::input("12", "Softskills", "softskills") ?>
              <?= Form::form_footer("add_softskills", "add softskills") ?>
            </div>
            <div class="row">
              <?= Form::table_header('Education') ?>
              <?php
              if ($etudes) :
                foreach ($etudes as $key =>  $etude) : ?>
                  <tr>
                    <th scope="row"><?= $key + 1 ?></th>
                    <td><?= $etude['date'] ?></td>
                    <td><?= $etude['description'] ?></td>
                    <td><a href="dashboard.php?p=editcv&id=<?= $etude['id_etude'] ?>&type=etudes"><i class="fas fa-folder-minus"></i></a></td>
                  </tr>
              <?php endforeach;
              endif; ?>
              <?= Form::table_footer() ?>
              <?= Form::input("4", "Date", "etude_date") ?>
              <?= Form::input("8", "Description", "etude_desc") ?>
              <?= Form::form_footer("add_etude", "add education") ?>

              <?= Form::table_header('Competences technique') ?>
              <?php
              if ($langages) :
                foreach ($langages as $key =>  $langage) : ?>
                  <tr>
                    <th scope="row"><?= $key + 1 ?></th>
                    <td><?= $langage['langage'] ?></td>
                    <td><a href="dashboard.php?p=editcv&id=<?= $langage['id_langage'] ?>&type=langages"><i class="fas fa-folder-minus"></i></a></td>
                  </tr>
              <?php endforeach;
              endif; ?>
              <?= Form::table_footer() ?>
              <?= Form::input("12", "Competences technique", "langage") ?>
              <?= Form::form_footer("add_langage", "add ompetences technique") ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>