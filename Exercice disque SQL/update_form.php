<!DOCTYPE html>
<?php 
    require_once('header.php');
?>

<?php
$stmt=$conn->prepare("SELECT * FROM disc d LEFT JOIN artist a ON d.artist_id = a.artist_id WHERE disc_id=?");
            $stmt->execute(array($_GET['modif']));
            $result=$stmt->fetch();
?>


<div class="container">

<h1>Modifier un vinyle</h1><hr><br>

<form action="update_script.php" method="post" class="justify-content-center" enctype="multipart/form-data"> <!-- enctype="multipart/form-data -> Cette valeur est nécessaire si l'utilisateur télécharge un fichier via le formulaire -->

<div class="mb-3">
    <label for="title" class="form-label">Titre</label><br>
    <input type="text" name="ajout_titre" class="form-control" id="title" value="<?php echo $result['disc_title'];?>" required>
</div>

<div class="mb-3">
      <label for="artiste" class="form-label">Artiste</label><br>
      <select id="artiste" name="ajout_artiste" class="form-select" value="<?php echo $result['artist_name'];?>" required>
        <option>??????</option>
      </select>
</div>

<div class="mb-3">
    <label for="annee" class="form-label">Année</label><br>
    <input type="text" name="ajout_annee" class="form-control" id="annee" value="<?php echo $result['disc_year'];?>" required>
</div>

<div class="mb-3">
    <label for="genre" class="form-label">Genre</label><br>
    <input type="text" name="ajout_genre" class="form-control" id="genre" value="<?php echo $result['disc_genre'];?>" required>
</div>

<div class="mb-3">
    <label for="label" class="form-label">Label</label><br>
    <input type="text" name="ajout_label" class="form-control" id="label" value="<?php echo $result['disc_label'];?>" required>
</div>

<div class="mb-3">
    <label for="prix" class="form-label">Prix</label><br>
    <input type="text" name="ajout_prix" class="form-control" id="prix" value="<?php echo $result['disc_price'];?>" required>
</div>




<div class="mb-3">
  <label for="formFile" class="form-label">Image</label><br>
  <input class="form-control" name="ajout_image" type="file" id="formFile"><br>
  <img src="img/<?php echo $result['disc_picture'];?>" alt="<?php echo $result['disc_title'];?>" style="max-width: 540px" class='mt-2 img-fluid'><br>
</div>





  <button type="submit" name="modif" class="btn btn-primary" value="<?php echo $_GET['modif'];?>">Modifier</button>
  <a href="index.php"><button type="button" class="btn btn-primary">Retour</button></a>

</form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>