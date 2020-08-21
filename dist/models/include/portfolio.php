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