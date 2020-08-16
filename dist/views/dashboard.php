<?php

use portfolio\classes\Database\Functions;

session_start();
require_once "../controllers/classes/Database/Functions.php";

// setcookie('utulisateur', $_SESSION['identifiants']['login'], time() + 60 * 160 + 24);
// $name = $_SESSION['identifiants']['login'];
if (isset($_GET['p'])) :
  $p = $_GET['p'];
else :
  $p = 'home';
endif;
ob_start();
if (($p === 'home') || ($p === 'delet')) :
  // Functions::delet();
  require '../models/dashboard/dashboard.table.php';
elseif ($p === 'add') :
  require '../models/dashboard/dashboard.add.php';
elseif ($p === 'edit') :
  require '../models/dashboard/dashboard.edit.php';
elseif ($p === 'editcv') :
  require '../models/dashboard/dashboard.editcv.php';
else :
  require '../models/demo/404.php';
endif;
$contenu = ob_get_clean();
require '../models/demo/dashboard.php';
