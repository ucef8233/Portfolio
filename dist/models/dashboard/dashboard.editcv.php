<?php
// namece use

use \portfolio\classes\Database\Utulisateur;
use portfolio\classes\Database\Functions;
use portfolio\classes\HTML\Error;


$projets = new Utulisateur;
$softskills = $projets->selectCv("info_admin", "softskills");
$experiances = $projets->selectCv("info_admin", "experiance");
$etudes = $projets->selectCv("info_admin", "etudes");
$langages = $projets->selectCv("info_admin", "langages");
$result = Functions::editProfil('info_admin');


if (isset($_GET['type'])) :
  if ($_GET['type'] == "softskills") :
    Functions::delet("softskills", "id_softskills");
  endif;
  if ($_GET['type'] == "experiance") :
    Functions::delet("experiance", "id_experiance");
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
                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nom</label>
                    <input type="text" class="form-control" name="nom_user" value="<?= $result['nom'] ?>" required>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Titre</label>
                    <input type="text" class="form-control" name="titre_user" value="<?= $result['titre'] ?>" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Email address</label>
                    <input type="email" class="form-control" name="mail_user" value="<?= $result['mail'] ?>" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Adress</label>
                    <input type="text" class="form-control" name="adress_user" value="<?= $result['adress'] ?>" required>
                  </div>
                </div>
              </div>
              <button type="submit" name="editprofil" class="btn btn-primary pull-right">Update Profile</button>
              <div class="clearfix"></div>
            </form>







            <div class="row">
              <div class="col-lg-6 col-md-12">
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">Experiances</h4>
                  </div>
                  <div class="card-body table-responsive">
                    <table class="table table-hover">
                      <thead class="text-warning">
                        <th>#</th>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Supprimer</th>
                      </thead>
                      <tbody>
                        <!-- les projets -->
                        <?php
                        if ($experiances) :
                          foreach ($experiances as $key => $experiance) : ?>
                            <tr>
                              <th scope="row"><?= $key + 1 ?></th>
                              <td><?= $experiance['date'] ?></td>
                              <td><?= $experiance['description'] ?></td>
                              <td><a href="dashboard.php?p=editcv&id=<?= $experiance['id_experiance'] ?>&type=experiance"><i class="fas fa-folder-minus"></i></a></td>
                            </tr>
                        <?php endforeach;
                        endif; ?>
                      </tbody>
                    </table>
                    <?php Functions::insertCv('experiance'); ?>
                    <form action="" method="post">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">Date</label>
                            <input type="text" class="form-control" name="experiance_date" required>
                          </div>
                        </div>
                        <div class="col-md-8">
                          <div class="form-group">
                            <label class="bmd-label-floating">Description</label>
                            <input type="text" class="form-control" name="experiance_desc" required>
                          </div>
                        </div>
                      </div>
                      <button type="submit" name="add_cv" class="btn btn-primary col-md-4 ">add Experiance</button>
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-12">
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">SoftSkils</h4>
                  </div>
                  <div class="card-body table-responsive">
                    <table class="table table-hover">
                      <thead class="text-warning">
                      </thead>
                      <tbody>
                        <!-- les projets -->
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
                      </tbody>
                    </table>
                    <?php Functions::insertCv('softskills'); ?>
                    <form action="" method="post">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating">Softskills</label>
                            <input type="text" class="form-control" name="softskills" required>
                          </div>
                        </div>
                      </div>
                      <button type="submit" name="add_softskills" class="btn btn-primary col-md-4 ">add softskills</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>






            <div class="row">
              <div class="col-lg-6 col-md-12">
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">Education</h4>
                  </div>
                  <div class="card-body table-responsive">
                    <table class="table table-hover">
                      <thead class="text-warning">
                        <th>#</th>
                        <th>Date</th>
                        <th>Description</th>
                        <th>delet</th>
                      </thead>
                      <tbody>
                        <!-- les projets -->
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
                      </tbody>
                    </table>
                    <?php Functions::insertCv('etudes'); ?>
                    <form action="" method="post">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">Date</label>
                            <input type="text" class="form-control" name="etude_date" required>
                          </div>
                        </div>
                        <div class="col-md-8">
                          <div class="form-group">
                            <label class="bmd-label-floating">Description</label>
                            <input type="text" class="form-control" name="etude_desc" required>
                          </div>
                        </div>
                      </div>
                      <button type="submit" name="add_etude" class="btn btn-primary col-md-4 ">add education</button>
                    </form>
                  </div>
                </div>
              </div>






              <div class="col-lg-6 col-md-12">
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">Competences technique</h4>
                  </div>
                  <div class="card-body table-responsive">
                    <table class="table table-hover">
                      <thead class="text-warning">
                      </thead>
                      <tbody>
                        <!-- les projets -->
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
                      </tbody>
                    </table>
                    <?php Functions::insertCv('langages'); ?>
                    <form action="" method="post">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating">Competences technique</label>
                            <input type="text" class="form-control" name="langage" required>
                          </div>
                        </div>
                      </div>
                      <button type="submit" name="add_langage" class="btn btn-primary col-md-4 ">add Competences technique</button>
                    </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>