<?php
session_start();

if (isset($_GET['p'])) :
  $p = $_GET['p'];
else :
  $p = 'home';
endif;


ob_start();
if ($p === 'home') :
  $css = 'acceuil';
  $js = 'acceuil';
  require '../models/acceuil/acceuil.php';
elseif ($p === 'loginuser') :
  $css = 'login';
  require '../models/acceuil/login.php';
elseif ($p === 'contact') :
  $css = 'contact';
  require '../models/acceuil/contact.php';
// elseif ($p === 'adminlog') :
//   require '../models/acceuil/login.php';
endif;
$page = ob_get_clean();
require '../models/demo/acceuil.php';
