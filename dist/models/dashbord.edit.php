<?php
?>
<form method="POST">
  <label>Mon du projet :</label>
  <input type="text" name="projet_name"> <br>
  <label>lien Github :</label>
  <input type="text" name="projet_lien"> <br>
  <label>description</label><br>
  <textarea name="projet_description"></textarea> <br>
  <label>Choose a profile picture:</label>
  <input type="file" name="projet_image" accept="image/png, image/jpeg"> <br>
  <button type="submit" name="edit" class="btn btn-primary">modifier un projet</button>
</form>
</section>