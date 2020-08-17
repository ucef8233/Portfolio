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
if (($p === 'home') || ($p === 'delet')) :
  require '../models/dashboard/dashboard.table.php';
elseif ($p === 'add') :
  require '../models/dashboard/dashboard.add.php';
elseif ($p === 'edit') :
  require '../models/dashboard/dashboard.edit.php';
elseif ($p === 'editcv') :
  require '../models/dashboard/dashboard.editcv.php';
else :
  require '../models/acceuil/404.php';
endif;
$contenu = ob_get_clean();
require '../models/demo/dashboard.php';
