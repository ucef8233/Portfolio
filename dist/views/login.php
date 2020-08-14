<?php

use \portfolio\classes\Database\Connexion_exec;
use \portfolio\classes\HTML\Error;

require_once "../controllers/classes/Database/Connexion_exec.php";
require_once "../controllers/classes/HTML/Error.php";
Connexion_exec::Cnx();
?>


  <form method="POST" class="login__add login">
    <div class="popup__login popup__display">
      <?= Error::error_cnx() ?>
      <i class="fas fa-window-close"></i>
      <input type="text" name="username" class="field" placeholder="Username"><br>
      <input type="password" name="password" class="field" placeholder="Password"><br>
      <input type="submit" name="connexion" value="Connexion" class="popup__btn">
    </div>
  </form>
