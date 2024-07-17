  <?php
    require_once('header.php')
  ?>

<?php
// récupère toutes les données de catégorie
$stmt=$dbh->prepare("SELECT * FROM categorie WHERE active='Yes'");

try{
  // exécute de la requête SQL
  $stmt->execute();
} catch (PDOException $e){
  // affiche un message d'erreur si la requête échoue
  echo 'Erreur lors de l\'exécution de la requête : '. $e->getMessage();
}

// récupération des résultats de la requête
$result=$stmt->fetchAll();
?>

  <div class="container">
<div class="parallax col-14 col-sm-12">


<div class="container">
  <div class="row">

  <?php
// affichage des catégories dans une card bootstrap pour les 6 premières catégories
  $i=0;
        foreach($result as $row){
            echo '<div class="col-sm-12 col-lg-4">
              <a href="categorie.php">
                <img src="assets/img/category/'.$row['image'].'"class="animeimage posImage" alt="'.$row['libelle'].'">
                <p>'.$row['libelle'].'</p>
                <div class="card-body">
                </div>
              </a>
              </div>';
              $i++;
              if($i==6){
                break;
        }
      }

?>

  <?php
  require_once('carouselIndex.php')
  ?>

</div>
</div>

</div>

<br>

<?php
    require_once('footer.php')
?>

  

    
