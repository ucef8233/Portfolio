<?php
session_start();

if (isset($_GET['page'])) :
  $p = $_GET['page'];
else :
  $p = '/';
endif;


ob_start();
if (($p === '/') || ($p === 'delet')) :
  require 'models/dashboard.table.php';
elseif ($p === 'add') :
  require 'models/dashboard.add.php';
elseif ($p === 'edit') :
  require 'models/dashboard.edit.php';
else :
  require 'models/demo/404.php';
endif;
$contenu = ob_get_clean();
require 'models/demo/dashboard.php';
