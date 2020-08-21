<?php

use \portfolio\classes\Database\Crud;
use \portfolio\classes\Database\Connexion_exec;


session_start();
require dirname(__DIR__) . '/controllers/Autoloader.php';
portfolio\Autoloader::register();

define('ACCEUIL_PATH', dirname(__DIR__) . '/models/acceuil');
define('INC_PATH', dirname(__DIR__) . '/models/include');
define('MODEL_PATH', dirname(__DIR__) . '/models');


if (isset($_GET['p'])) :
  $p = $_GET['p'];
else :
  $p = 'home';
endif;
function limite_caractere($chaine, $max = 70)
{
  $chaine = strip_tags($chaine);
  if (strlen($chaine) >= $max) {
    $chaine = substr($chaine, 0, $max);
    $espace = strrpos($chaine, " ");
    $chaine = substr($chaine, 0, $espace) . " ...";
  }
  echo $chaine;
}

ob_start();

//// page home
if ($p === 'home') :
  /// affichage des projet 
  $projet = new Crud('projet');
  $cards = $projet->Read();
  // require contenu page acceuil 

  /// affichage des information Cv
  $cv = new Crud('info_admin');
  $softskills = $cv->Read('softskills');
  $experiances = $cv->Read("experiances");
  $etudes = $cv->Read("etudes");
  $langages = $cv->Read("langages");
  $infos = $cv->Read();


  require ACCEUIL_PATH  . '/acceuil.php';

/// page contact
elseif ($p === 'contact') :
  require ACCEUIL_PATH . '/contact.php';
/// page login 
elseif ($p === 'loginuser') :
  if (!isset($_SESSION['log'])) :
    /// connection 
    Connexion_exec::set_Cnx();
  else :
    header('location:index.php');
  endif;
  require ACCEUIL_PATH . '/login.php';

//// page 404 
else :
  require MODEL_PATH . '/acceuil/404.php';
endif;
$page = ob_get_clean();
require MODEL_PATH . '/demo/acceuil.php';
