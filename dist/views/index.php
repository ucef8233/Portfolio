<?php
session_start();
require dirname(__DIR__) . '/controllers/Autoloader.php';
portfolio\Autoloader::register();
$uri = $_SERVER['REQUEST_URI'];

define('ACCEUIL_PATH', dirname(__DIR__) . '/models/acceuil');
define('INC_PATH', dirname(__DIR__) . '/models/include');
define('MODEL_PATH', dirname(__DIR__) . '/models');
require '../../vendor/autoload.php';

// $router = new AltoRouter();

// $router->map('GET', '', function () {
//   //   require ACCEUIL_PATH . "/acceuil.php";
//   echo "acceuil";
// });
// $router->map('GET', '/contact', 'contact');
// $router->map('GET', '/login', 'login');
// $match = $router->match();
// var_dump($match);
// if ($match !== null) :
//   require  "/{$match['target']}.php";
// endif;



if (isset($_GET['p'])) :
  $p = $_GET['p'];
else :
  $p = 'home';
endif;

ob_start();
if ($p === 'home') :
  require ACCEUIL_PATH . DIRECTORY_SEPARATOR . '/acceuil.php';
elseif ($p === 'contact') :
  require ACCEUIL_PATH . '/contact.php';
elseif ($p === 'loginuser') :
  require ACCEUIL_PATH . '/login.php';
else :
  require MODEL_PATH . '/acceuil/404.php';
endif;
$page = ob_get_clean();
require MODEL_PATH . '/demo/acceuil.php';
