<?php
///require manmespace use


use \portfolio\classes\Database\Connexion_exec;
use \portfolio\classes\HTML\Error;


///require classes
if (!isset($_SESSION['log'])) :

  require_once "../controllers/classes/Database/Connexion_exec.php";
  require_once "../controllers/classes/HTML/Error.php";
  Connexion_exec::Cnx();
?>
  <div class="container">

    <!-- form login -->

    <form class="login__box" method="POST">
      <?= Error::error_cnx(); ?>
      <input type="text" name="username" class="field" placeholder="Username"><br>
      <input type="password" name="password" class="field" placeholder="Password"><br>
      <input class="field" type="submit" name="connexion" value="Connexion">
    </form>
  </div>
<?php else :
  header('location:index.php');
endif; ?>