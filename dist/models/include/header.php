<header class="header">

  <!-- annimation js -->

  <div id="particles-js">
  </div>

  <!-- navbar -->

  <nav class="pages">
    <a href="index.php"> <img src="../html/image/Ysb.png" alt=""></a>
    <div class="pages__links none">
      <a href="index.php?p=contact">Contact</a>
      <a href="<?php if (!isset($_SESSION['log'])) :
                  echo "index.php?p=loginuser";
                else :
                  echo "Dashboard.php";
                endif; ?>
"><?php if (!isset($_SESSION['log'])) :
    echo "Login";
  else :
    echo "dashboard";
  endif; ?></a>
    </div>
    <div class="page__humberger block">

      <i class="fas fa-align-right"></i>
    </div>
  </nav>

  <!-- contenu header -->


  <section class="header__contenu">
    <div class="header__text">

      <h1>Bienvenue sur mon portfolio</h1>
      <p>Moi c'est Youssef Salim, Développeur Web !</p>
      <div class="header__btn">
        <a href="#" class="display__menu--portfolio">Portfolio</a>
        <a href="#" class="display__menu--propos">A propos</a>
      </div>
    </div>
  </section>
</header>

<!-- navigation gauche -->


<nav class="menu none">
  <a class="display__menu display__menu--acceuil active" href="#Acceuil"><i class="fas fa-home"></i><span class="span__acceuil">Acceuil</span></a>
  <a class="display__menu display__menu--portfolio" href="#portfolio"><i class="fas fa-parking"></i><span class="span__portfolio">Portfolio</span></a>
  <a class="display__menu display__menu--propos" href="#propos"><i class="fas fa-address-card"></i><span class="span__propos">A propos</span></a>
</nav>

<!-- image social medial -->


<div class="header__social">
  <a href="#"> <img src="../html/image/github.svg" alt="github icone"></a>
  <a href="#"> <img src="../html/image/linkedin.svg" alt="linkedin icone"></a>
  <a href="#"> <img src="../html/image/twitter.svg" alt="twitter icone"></a>
  <a href="#"> <img src="../html/image/google.svg" alt="linkedin icone"></a>
  <a href="#"> <img src="../html/image/instagram.svg" alt="twitter icone"></a>
</div>
<main>