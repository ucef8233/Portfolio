<?php

use portfolio\classes\Database\Getter;

use portfolio\classes\Database\Crud;

session_start();
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
  Getter::get_delet('projet', 'id');
  $tableau = new Crud('projet');
  $rows = $tableau->Read();
  require DASH_PATH . '/dashboard.table.php';

elseif ($p === 'add') :
  require DASH_PATH . '/dashboard.add.php';
  Getter::get_create();




elseif ($p === 'edit') :
  $result = Getter::get_update('projet');
  require DASH_PATH . '/dashboard.edit.php';



elseif ($p === 'editcv') :
  $cv = new Crud('info_admin');
  $softskills = $cv->Read('softskills');
  $experiances = $cv->Read("experiances");
  $etudes = $cv->Read("etudes");
  $langages = $cv->Read("langages");
  $infos = $cv->Read();
  Getter::get_updateCv();
  Getter::get_createCv('experiances');
  Getter::get_createCv('softskills');
  Getter::get_createCv('etudes');
  Getter::get_createCv('langages');


  if (isset($_GET['type'])) :
    if ($_GET['type'] == "softskills") :
      Getter::get_delet("softskills", "id_softskills");
    endif;
    if ($_GET['type'] == "experiances") :
      Getter::get_delet("experiances", "id_experiance");
    endif;
    if ($_GET['type'] == "etudes") :
      Getter::get_delet("etudes", "id_etude");
    endif;
    if ($_GET['type'] == "langages") :
      Getter::get_delet("langages", "id_langage");
    endif;
  endif;
  require DASH_PATH . '/dashboard.editcv.php';
else :
  require MODEL_PATH . '/acceuil/404.php';
endif;
$contenu = ob_get_clean();
require MODEL_PATH . '/demo/dashboard.php';
