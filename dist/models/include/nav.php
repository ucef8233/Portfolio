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