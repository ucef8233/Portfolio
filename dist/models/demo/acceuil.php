<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta name="description" content="Besoin de plus d'info sur moi , Youssef salim développeur web, et etudiant a youcode " />
  <meta name="keywords" content="Portfolio,projet,projets">
  <meta name="author" content="Salim Youssef">
  <script src="https://kit.fontawesome.com/5ef935a943.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../html/css/<?= $css ?>.css">
  <title>
    <?= $title ?>
  </title>
  <style>
    .page404 {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-direction: column;
      text-align: center;
    }

    .page404 h1 {
      font-size: 5em;
    }

    .page404 p {
      font-size: 3em;
    }
  </style>
</head>

<body>
  <?php if (isset($_GET['p'])) : ?>
    <nav id="Acceuil" class="pages">
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
    <?php endif; ?>
    </nav>
    <?= $page ?>
</body>
<script src="../html/scripts/<?= $js ?? '' ?>.js"></script>
<script src="../html/scripts/<?= $js2 ?? '' ?>.js"></script>

</html>