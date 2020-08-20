<?php
session_start();
require dirname(__DIR__) . '/controllers/Autoloader.php';
portfolio\Autoloader::register();
if (isset($_GET['p'])) :
  $p = $_GET['p'];
else :
  $p = 'home';
endif;
define('DASH_PATH', dirname(__DIR__) . '/models/dashboard');
define('MODEL_PATH', dirname(__DIR__) . '/models');
ob_start();
if (($p === 'home') || ($p === 'delet')) :
  require DASH_PATH . '/dashboard.table.php';
elseif ($p === 'add') :
  require DASH_PATH . '/dashboard.add.php';
elseif ($p === 'edit') :
  require DASH_PATH . '/dashboard.edit.php';
elseif ($p === 'editcv') :
  require DASH_PATH . '/dashboard.editcv.php';
else :
  require MODEL_PATH . '/acceuil/404.php';
endif;
$contenu = ob_get_clean();
require MODEL_PATH . '/demo/dashboard.php';
