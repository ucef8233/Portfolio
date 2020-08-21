<?php
// namece use

use portfolio\classes\HTML\Error;
// use portfolio\classes\Database\Getter;
// use portfolio\classes\Database\Crud;


// Getter::get_delet('projet', 'id');
// $tableau = new Crud('projet');
// $rows = $tableau->Read();
?>

<div class="content">
  <div class="container-fluid">

    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Tableau des Projets</h4>
            <?= Error::valid_edit("projet"); ?>
            <?= Error::valid_add("projet") ?>
            <?= Error::valid_delet("projet") ?>
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
                  foreach ($rows as $key => $row) : ?>
                    <tr>
                      <th scope="row"><?= $key + 1 ?></th>
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