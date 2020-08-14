<?php
session_start();

if (isset($_GET['page'])) :
  $p = $_GET['page'];
else :
  $p = '/';
endif;


// ob_start();
if ($p === '/') :
  require 'views/acceuil.php';
elseif ($p === 'loginuser') :
  require 'views/login.php';
elseif ($p === 'contact') :
  require 'views/contact.php';
elseif ($p === 'adminlog') :
  require 'views/admin.php';
else :
  require 'views/404.php';
endif;
// $page = ob_get_clean();
// require 'models/template/demo.php';
