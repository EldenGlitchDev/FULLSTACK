<?php
    require_once('header.php')
    ?>

<div class="container">
<br>

<?php
    $stmt=$dbh->prepare("SELECT plat.libelle AS nomplat, plat.image, plat.prix, plat.description, categorie.libelle AS nomcat, plat.id, id_categorie FROM plat LEFT JOIN categorie on plat.id_categorie=categorie.id WHERE id_categorie= :id ORDER BY categorie.libelle DESC");
try{
  $stmt->execute(array(':id' => $_GET['catplat']));
} catch (PDOException $e){
  echo 'Erreur lors de l\'exécution de la requête : '. $e->getMessage();
}

$result=$stmt->fetchAll();
$stock=$_GET['catplat'];
?>


<div class="container mt-3">
  <div class="row justify-content-center">

<?php
  $stmtCat = $dbh->prepare("SELECT libelle FROM categorie WHERE id = :id");
try{
  $stmtCat->execute(array(':id' => $_GET['catplat']));
} catch (PDOException $e) {
  echo 'Erreur lors de l\'exécution de la requête : '. $e->getMessage();
}
  $categoryName = $stmtCat->fetchColumn();
  ?>

  <!--?php
    require_once('DAO.php');
    $result=platsParCategorieTitre(); (!!! NE FONCTIONNE PAS POUR LE MOMENT !!!)
  ?-->

<div class="container">
  <div class="row justify-content-start titreconteneur">
    <div class="col-6 col-lg-1 mb-5" id="titre">
      <h3><?php echo $categoryName; ?></h3>
    </div>
  </div>
</div>

<!--?php
  require_once('DAO.php');
  $result=platsParCategorieCorps(); (!!! NE FONCTIONNE PAS POUR LE MOMENT !!!)
?-->

<?php

$i=0;
foreach($result as $row){
  echo '<div class=container>
  <div class="row justify-content-center g-0">
  <div class="card mb-3" style="max-width: 1000px;">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="assets/img/food/'.$row['image'].'" class="img-fluid rounded-start border border-dark border-4 imageComm" alt="'.$row['nomplat'].'">
      </div>
      <div class="col-md-8 cardscolor">
        <div class="card-body">
          <h5 class="card-title txtcolor">'.$row['nomplat'].'</h5>
          <p class="card-text txtcolor">'.$row['description'].'</p>
          <p class="card-text txtcolor">Prix :<b> '.$row['prix'].' €</b></p>
          <div class="d-flex justify-content-end">
            <form action="commande.php" method="GET" class="col-6">
              <button type="submit" name="comm" class="btn btn-primary" value="'.$row['id'].'" id="boutoncommander">Commander</button>
            </form>
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

<?php
    require_once('boutonsSuivPrec.php')
?>

</div>

<br><br>

<?php
    require_once('footer.php')
?>