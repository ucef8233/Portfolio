<?php

use \portfolio\classes\Database\Functions;
use \portfolio\classes\HTML\Error;

require_once "../controllers/classes/Database/Functions.php";
require_once "../controllers/classes/HTML/Error.php";
Functions::insert('projet');
?>
<section class="p-5 contenu">
  <form method="POST">
    <?= Error::error_exist() ?>
    <label>Mon du projet :</label>
    <input type="text" name="projet_name"> <br>
    <label>lien Github :</label>
    <input type="text" name="projet_lien"> <br>
    <label>description</label><br>
    <textarea name="projet_description"></textarea> <br>
    <label>Choose a profile picture:</label>
    <input type="file" name="projet_image" accept="image/png, image/jpeg"> <br>
    <button type="submit" name="add" class="btn btn-primary">Ajouter un projet</button>
  </form>
</section>