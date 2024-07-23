<?php
    require_once('header.php')
    ?>

<div class="container">
<br>

<?php
    $stmt=$dbh->prepare("SELECT plat.libelle AS nomplat, plat.image, plat.prix, plat.description, categorie.libelle AS nomcat, plat.id, id_categorie FROM plat LEFT JOIN categorie on plat.id_categorie=categorie.id WHERE id_categorie= :id ORDER BY categorie.libelle DESC");
try{
  // exécute de la requête SQL
  $stmt->execute(array(':id' => $_GET['catplat']));
  /*$stmt->execute(array($_GET['catplat']));*/
} catch (PDOException $e){
  // affiche un message d'erreur si la requête échoue
  echo 'Erreur lors de l\'exécution de la requête : '. $e->getMessage();
}

$result=$stmt->fetchAll();
$stock=$_GET['catplat'];
?>

<div class="container mt-3">
  <div class="row justify-content-center">

<?php
  $stmtCat = $dbh->prepare("SELECT libelle FROM categorie WHERE id = :id");
  $stmtCat->execute(array(':id' => $_GET['catplat']));
  $categoryName = $stmtCat->fetchColumn();
?>

<div class="container">
    <div class="row justify-content-start titreconteneur">
<div class="col-6 col-lg-1 mb-5" id="titre">
<h3><?php echo $categoryName; ?></h3>
</div>
</div>
  </div>

<?php

$i=0;
foreach($result as $row){
  echo '<div class=container>
  <div class="row g-0 justify-content-center">
  <div class="card mb-3" style="max-width: 750px;">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="assets/img/food/'.$row['image'].'" class="img-fluid rounded-start border border-dark border-4" id="image" alt="'.$row['nomplat'].'">
      </div>
      <div class="col-md-8 cardscolor">
        <div class="card-body">
          <h5 class="card-title txtcolor">'.$row['nomplat'].'</h5>
          <p class="card-text txtcolor">'.$row['description'].'</p>
          <p class="card-text txtcolor">Prix : '.$row['prix'].' €</
          <div class="d-flex justify-content-end">
            <a href="#" class="btn btn-primary " id="boutoncommander">Commander</a>
              </div>
        </div>
      </div>
    </div>
  </div></div><div>';
      $i++;
      if($i==6){
        break;
      }
}

?>


  </div>
</div>





<!--?php
    require_once('cardPlatsParCategoriePHP.php') NON UTILISE POUR LE MOMENT
?-->



<?php
    require_once('boutonsSuivPrec.php')
?>

</div>

<br><br>

<?php
    require_once('footer.php')
?>

  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>