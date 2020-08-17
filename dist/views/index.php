<?php
session_start();
require '../controllers/Autoloader.php';
portfolio\Autoloader::register();
if (isset($_GET['p'])) :
  $p = $_GET['p'];
else :
  $p = 'home';
endif;


ob_start();
if ($p === 'home') :
  require '../models/acceuil/acceuil.php';
elseif ($p === 'loginuser') :
  require '../models/acceuil/login.php';
elseif ($p === 'contact') :
  require '../models/acceuil/contact.php';
else :
  require '../models/acceuil/404.php';
endif;
$page = ob_get_clean();
require '../models/demo/acceuil.php';
