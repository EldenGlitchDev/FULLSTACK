<!DOCTYPE html>
<?php 
    require_once('header.php');
?>

<?php

$stmt=$dbh->prepare("SELECT * FROM disc d LEFT JOIN artist a ON d.artist_id = a.artist_id WHERE disc_id=?");
            $stmt->execute(array($_GET['nodiscs']));
            $result=$stmt->fetch();
            $stock=$_GET['nodiscs'];
?>

<div class="container mt-3">
  <div class="row justify-content-center">
    
    <div class="col-6">
      <h3>Titre : <?php echo $result['disc_title'];?></h3>
      <p>Artiste : <?php echo $result['artist_name'];?></p>
      <p>Année : <?php echo $result['disc_year'];?></p>
      <p>Genre : <?php echo $result['disc_genre'];?></p>
      <p>Label : <?php echo $result['disc_label'];?></p>
      <p>Prix : <?php echo $result['disc_price'];?> euros</p>
    </div>
    <img src="img/<?php echo $result['disc_picture'];?>" class="img-fluid rounded-start col-6">

<form action="update_form.php" method="GET" class="col-6 mt-5">
  <button type="submit" name="modif" class="btn btn-primary" value="<?php echo $result['disc_id'];?>">Modifier</button>
</form>

<form action="delete_form.php" method="GET" class="col-6 mt-5">
  <button type="submit" name="delete" class="btn btn-primary" value="<?php echo $result['disc_id'];?>">Supprimer</button>
</form>

<div class="col-6">
  <a href="index.php"><button type="button" class="btn btn-primary">Retour</button></a>
</div>

</div>
</div>







<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>