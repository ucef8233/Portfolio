<?php

use \portfolio\classes\Database\Utulisateur;

require_once "../controllers/classes/Database/Utulisateur.php";
$projets = new Utulisateur;
$rows = $projets->select('projet');
?>
<section class="p-5 contenu">
  <h1> Mes projet </h1>
  <table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Mon du projet</th>
        <th scope="col">Lien Github</th>
        <th scope="col">description</th>
        <th scope="col">image</th>
        <th scope="col">delet</th>
        <th scope="col">update</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($rows as $row) : ?>
        <tr>
          <th scope="row"><?= $row['id'] ?></th>
          <td><?= $row['nom'] ?></td>
          <td><?= $row['lien'] ?></td>
          <td><?= $row['description'] ?></td>
          <td><img src="<?= $row['image'] ?>" alt="image projet"></td>
          <td><a href="dashboard.php?id=<?= $row['id'] ?>"><i class="fas fa-folder-minus"></i></a></td>
          <td><a href="dashboard.php?p=edit&id=<?= $row['id'] ?>"> <i class="fas fa-user-edit"></i></a></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</section>