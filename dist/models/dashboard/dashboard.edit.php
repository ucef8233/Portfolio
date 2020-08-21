<?php


use \portfolio\classes\HTML\Form;


?>


<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Modifier le projet</h4>
          </div>
          <div class="card-body">
            <form method="POST">
              <input class="x" type="text" name="id" value="<?= $result['id'] ?>" required>
              <div class="row">
                <?= Form::input("6", "Mon du projet", "projet_name", $result['nom']) ?>
                <?= Form::input("6", "lien Github", "projet_lien", $result['lien']) ?>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="custom-file">
                    <label class="custom-file-label" for="validatedCustomFile">Ajouter une image pour le projet</label>
                    <input type="file" class="custom-file-input" id="validatedCustomFile" name="projet_image" accept="image/png, image/jpeg" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <?= Form::textarea("projet_description", $result['description']) ?>
              </div>
              <button type="submit" class="btn btn-primary pull-right" name="edit">Modifier Projet</button>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>