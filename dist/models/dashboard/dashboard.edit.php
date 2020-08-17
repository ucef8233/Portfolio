<?php

use portfolio\classes\Database\Functions;

$result = Functions::edit('projet');
?>


<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Ajouter un projet</h4>
          </div>
          <div class="card-body">
            <form method="POST">
              <input class="x" type="text" name="id" value="<?= $result['id'] ?>" required>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Mon du projet : </label>
                    <input type="text" class="form-control" name="projet_name" value="<?= $result['nom'] ?>" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">lien Github :</label>
                    <input type="text" class="form-control" name="projet_lien" value="<?= $result['lien'] ?>" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="validatedCustomFile" name="projet_image" accept="image/png, image/jpeg" required>
                    <label class="custom-file-label" for="validatedCustomFile">Ajouter une image pour le projet</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Description</label>
                    <div class="form-group">
                      <label class="bmd-label-floating"> </label>
                      <textarea class="form-control" rows="5" name="projet_description"><?= $result['description'] ?></textarea>
                    </div>
                  </div>
                </div>
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