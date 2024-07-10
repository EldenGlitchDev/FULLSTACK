<!DOCTYPE html>
<?php 
    require_once('header.php');
?>

<div class="container">

<h1>Ajouter un vinyle</h1><hr><br>

<form action="add_script.php" method="post" enctype="multipart/form-data"> <!-- enctype="multipart/form-data -> Cette valeur est nécessaire si l'utilisateur télécharge un fichier via le formulaire -->

    <div class="mb-3">
    <label for="title" class="form-label">Titre</label>
    <input type="text" class="form-control" id="title" name='ajouttitre'>
    </div>


    <!--<div class="mb-3">
      <label for="artiste" class="form-label">Artiste</label>
      <select id="artiste" class="form-select" name='ajoutartiste'>
        <option></option>
      </select>
    </div>-->

    <div class="mb-3">
    <label for="title" class="form-label">Artiste</label>
    <input type="text" class="form-control" id="title" name='ajoutartiste'>
    </div>

    <div class="mb-3">
    <label for="annee" class="form-label">Année</label>
    <input type="text" class="form-control" id="annee" name='ajoutannee'>
  </div>


  <div class="mb-3">
    <label for="genre" class="form-label">Genre</label>
    <input type="text" class="form-control" id="genre" name='ajoutgenre'>
  </div>


  <div class="mb-3">
    <label for="label" class="form-label">Label</label>
    <input type="text" class="form-control" id="label" name='ajoutlabel'>
  </div>


  <div class="mb-3">
    <label for="prix" class="form-label">Prix</label>
    <input type="text" class="form-control" id="prix" name='ajoutprix'>
  </div>


  <div class="mb-3">
  <label for="formFile" class="form-label">Image</label>
  <input class="form-control" type="file" id="formFile" name='ajoutimage'>
</div>


  <button type="submit" class="btn btn-primary">Ajouter</button>
  <a href="index.php"><button type="button" class="btn btn-primary">Retour</button></a>


</form>










</div>