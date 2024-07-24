<?php
require_once('header.php')
?>
<div class="container">
  <br>

  <div class="row">



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

<?php
// affichage des catégories dans une card bootstrap pour les 6 premières catégories
  $i=0;
        foreach($result as $row){
            echo '<div class="col-sm-12 col-lg-4">
              <a href="platsparcategorie.php?catplat='.$row['id'].'">
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
/* ?catplat=' : Il s'agit du séparateur de chaîne de requête (?) suivi du nom du paramètre (catplat) et d'un signe égal (=). La valeur du paramètre sera ajoutée après le signe égal. */
?>

</div>



  <!--?php
  require_once('divcategoriePHP.php') NON UTILISE POUR LE MOMENT
  ?-->


  <?php
  require_once('boutonsSuivPrec.php')
  ?>

</div>

<?php
require_once('footer.php')
?>