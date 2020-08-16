<?php
// namece use

use \portfolio\classes\Database\Utulisateur;
use portfolio\classes\Database\Functions;
use portfolio\classes\HTML\Error;

if (isset($_SESSION['log'])) :

  //require classes

  require_once "../controllers/classes/Database/Functions.php";
  require_once "../controllers/classes/Database/Utulisateur.php";
  require_once "../controllers/classes/HTML/Error.php";
  Functions::delet("projet", "id");
  $projets = new Utulisateur;
  $rows = $projets->select('projet');
  function limite_caractere($chaine, $max = 80)
  {
    $chaine = strip_tags($chaine);

    // on compte si le nombre de caractère est supp ou égale a max
    if (strlen($chaine) >= $max) {
      // on prend la chaine de 0 à max
      $chaine = substr($chaine, 0, $max);
      // on regarde ou se trouve le dernier espace dans la chaine
      $espace = strrpos($chaine, " ");
      // on prend la chaine de 0 au dernier espace et on ajoute ...
      $chaine = substr($chaine, 0, $espace) . " ...";
    }
    echo $chaine;
  }
?>

  <div class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Tableau des Projets</h4>
              <?= Error::valid_edit(); ?>
              <?= Error::valid_add() ?>
              <?= Error::valid_delet() ?>
            </div>
            <div class="card-body table-responsive">
              <table class="table table-hover">
                <thead class="text-warning">
                  <th>#</th>
                  <th>image</th>
                  <th>Mon du projet</th>
                  <th>Lien Github</th>
                  <th>description</th>
                  <th>delet</th>
                  <th>update</th>
                </thead>
                <tbody>
                  <!-- les projets -->
                  <?php
                  if ($rows) :
                    foreach ($rows as $row) : ?>
                      <tr>
                        <th scope="row"><?= $row['id'] ?></th>
                        <td><img src="../html/image/<?= $row['image'] ?>" alt="image projet" width="500" height="300"></td>
                        <td><?= $row['nom'] ?></td>
                        <td><?= $row['lien'] ?></td>
                        <td><?= limite_caractere($row['description']) ?></td>
                        <td><a href="dashboard.php?p=delet&id=<?= $row['id'] ?>"><i class="fas fa-folder-minus"></i></a></td>
                        <td><a href="dashboard.php?p=edit&id=<?= $row['id'] ?>"> <i class="fas fa-user-edit"></i></a></td>
                      </tr>

                  <?php endforeach;
                  endif; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php else :
  header('location:index.php?p=loginuser');
endif; ?>