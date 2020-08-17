<?php
/*
function limit caractére a 70 + ajout ...
*/
function limite_caractere($chaine, $max = 70)
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
//name spase Use
use \portfolio\classes\Database\Utulisateur;
//require
require_once "../controllers/classes/Database/Utulisateur.php";
// 
$projet = new Utulisateur;
$cards = $projet->select('projet');
?>
<!-- // section portfolio -->
<div id="portfolio" class="main__acceuil ">
  <section class="portfolio" id="port">
    <div class="display">
      <i class="fas fa-folder-open"></i>
    </div>
    <div class="sidebar bay">
      <h2> <i class="fas fa-folder-open"></i> Portfolio</h2>
      <ul class="projets">
        <?php if ($cards) : ?>
          <?php foreach ($cards as $key => $card) : ?>
            <li class="onglets" data-anim="<?= $key + 1 ?>"> <i class="fas fa-folder"></i><?= $card['nom'] ?></li>
          <?php endforeach; ?>
        <?php endif; ?>
      </ul>
    </div>
    <?php if ($cards) : ?>
      <?php foreach ($cards as $key => $card) : ?>
        <div class="portfolio__cards contenu <?php if ($key == 0) : echo "activeContenu";
                                              endif; ?> " data-anim="<?= $key + 1 ?>">
          <div class="portfolio__card">
            <div class="portfolio__image">
              <img src="../html/image/<?= $card['image'] ?>" alt="img portfolio">
            </div>
            <div class="portfolio__text">
              <h2><?= $card['nom'] ?></h2>
              <p><?= limite_caractere($card['description']) ?></p>
            </div>
          </div>
          <a href="<?= $card['lien'] ?>" class="portfolio__btn">Découvrez le projet<i class="fas fa-angle-double-right"></i></a>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </section>
</div>