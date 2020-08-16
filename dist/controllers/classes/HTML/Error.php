<?php

namespace portfolio\classes\HTML;
// classe qui genere des erreur html
class Error
{
  public static function error_cnx()
  {
    if (isset($_GET['p']) && isset($_GET['erreur'])) :
      if ($_GET['erreur'] == 'ko') :
        return ' <p class="bg-danger p-3 text-center mx-auto w-50">adress mail ou mots de pass incorrect</p>';
      endif;
    endif;
  }
  public static function error_exist()
  {
    if (isset($_GET['p']) && isset($_GET['error'])) :
      if ($_GET['error'] == 'exist') :
        return '<div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <i class="material-icons">close</i>
        </button>
        <span> Projet deja existant !</span>
      </div>';
      endif;
    endif;
  }
  public static function valid_edit()
  {
    if (isset($_GET['p']) && isset($_GET['edit'])) :
      if ($_GET['edit'] == 'ok') :
        return '<div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <i class="material-icons">close</i>
        </button>
        <span> Projet modifier !</span>
      </div>';
      endif;
    endif;
  }
  public static function valid_delet()
  {
    if (isset($_GET['p']) && isset($_GET['delet'])) :
      if ($_GET['delet'] == 'ok') :
        return '<div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <i class="material-icons">close</i>
        </button>
        <span> Projet Supprimer !</span>
      </div>';
      endif;
    endif;
  }
  public static function valid_add()
  {
    if (isset($_GET['p']) && isset($_GET['add'])) :
      if ($_GET['add'] == 'ok') :
        return '<div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <i class="material-icons">close</i>
        </button>
        <span> Projet Ajouter !</span>
      </div>';
      endif;
    endif;
  }
}
