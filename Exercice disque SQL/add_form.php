<!DOCTYPE html>
<?php 
    require_once('header.php');
?>

<div class="container">

<h1>Ajouter un vinyle</h1><hr><br>

<form action="add_script.php" method="post" enctype="multipart/form-data"> <!-- enctype="multipart/form-data -> Cette valeur est nécessaire si l'utilisateur télécharge un fichier via le formulaire -->

    <div class="mb-3">
    <label for="title" class="form-label">Titre</label>
    <input type="text" class="form-control" id="title">
    </div>


    <div class="mb-3">
      <label for="artiste" class="form-label">Artiste</label>
      <select id="artiste" class="form-select">
        <option>??????</option>
      </select>
    </div>

    <div class="mb-3">
    <label for="annee" class="form-label">Année</label>
    <input type="text" class="form-control" id="annee">
  </div>


  <div class="mb-3">
    <label for="genre" class="form-label">Genre</label>
    <input type="text" class="form-control" id="genre">
  </div>


  <div class="mb-3">
    <label for="label" class="form-label">Label</label>
    <input type="text" class="form-control" id="label">
  </div>


  <div class="mb-3">
    <label for="prix" class="form-label">Prix</label>
    <input type="text" class="form-control" id="prix">
  </div>


  <div class="mb-3">
  <label for="formFile" class="form-label">Image</label>
  <input class="form-control" type="file" id="formFile">
</div>


  <button type="button" class="btn btn-primary">Ajouter</button>
  <a href="index.php"><button type="button" class="btn btn-primary">Retour</button></a>


</form>










</div>