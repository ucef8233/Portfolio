<?php
///require manmespace use

use \portfolio\classes\HTML\Error;

$css = '<link rel="stylesheet" href="../html/css/login.css">';
$title = 'page Login';
?>
<div class="container">

  <!-- form login -->

  <form class="login__box" method="POST">
    <?= Error::error_cnx(); ?>
    <input type="text" name="username" class="field" placeholder="Username" required><br>
    <input type="password" name="password" class="field" placeholder="Password" required><br>
    <input class="field" type="submit" name="connexion" value="Connexion">
  </form>
</div>