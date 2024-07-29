  <?php
  require_once('header.php');
  ?>

<br>

<!--?php
  $stmt=$dbh->prepare("SELECT plat.libelle AS nomplat, plat.image, plat.prix, plat.description, categorie.libelle
                          AS nomcat, plat.id, id_categorie FROM plat LEFT JOIN categorie ON plat.id_categorie = categorie.id
                              WHERE id_categorie ORDER BY categorie.libelle DESC");
  try{
    $stmt->execute();
  } catch (PDOException $e){
    echo 'Erreur lors de l\'exécution de la requête : '. $e->getMessage(); 
  }
  $result=$stmt->fetchAll();
  ?-->

<?php
require_once('DAO.php');
$result=touslesPlats();
?>

<div class="container">
  <div class="row justify-content-center g-0">
<?php

$i=0;
foreach($result as $row){
  echo '<div class="col-md-6">
  <div class="card mb-3" style="max-width: 680px;">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="assets/img/food/'.$row['image'].'" class="img-fluid rounded-start border border-dark border-4" id="image" alt="'.$row['nomplat'].'">
      </div>
      <div class="col-md-8 cardscolor">
        <div class="card-body">
          <h5 class="card-title txtcolor">'.$row['nomplat'].'</h5>
          <p class="card-text txtcolor">'.$row['description'].'</p>
          <p class="card-text txtcolor">Prix :<b> '.$row['prix'].' €</b></p>
          <div class="d-flex justify-content-end">
            <form action="commande.php" method="GET">
              <button type="submit" name="comm" class="btn btn-primary" value="'.$row['id'].'" id="boutoncommander">Commander</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div></div>';
      $i++;
      if($i==6){
        break;
      }
}

?>

    <!--?php
    require_once('divplatsPHP.php');    NON UTILISE POUR LE MOMENT
    ?-->


    <?php
    require_once('boutonsSuivPrec.php');
    ?>

  </div>


  <?php
  require_once('footer.php');
  ?>