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
<div id="portfolio" class="main__acceuil display ">
  <!-- nav -->
  <?php require 'nav.php' ?>
  <!-- cards -->
  <section class="portfolio" id="port">
    <h2 class="portfolio__title">Portfolio</h2>
    <div class="portfolio__cards">
      <?php if ($cards) : ?>
        <?php foreach ($cards as $card) : ?>
          <div class="portfolio__card ">
            <div class="portfolio__image">
              <img src="../html/image/<?= $card['image'] ?>" alt="img portfolio">
            </div>
            <h2><?= $card['nom'] ?></h2>
            <p><?= limite_caractere($card['description']) ?></p>
            <a href="<?= $card['lien'] ?>" class="portfolio__btn">Découvrez le projet</a>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </section>
</div>