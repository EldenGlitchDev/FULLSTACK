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

<div class="backgroundTitle">
<h1>Les catégories</h1>
</div>

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

<div class="container">
          <div class="row">

<div class="backgroundTitle">
<h1>Les plats les plus vendus</h1>
</div>

        <?php
            // Préparation de la requête SQL pour les plats les plus vendus
         $stmt=$dbh->prepare("SELECT p.id,p.id_categorie,c.id_plat,SUM(quantite) as quantite_vendue,SUM(quantite)*prix as rentabilite,p.libelle,p.description,p.prix,p.image FROM commande c LEFT JOIN plat p ON c.id_plat=p.id WHERE c.etat!='Annulée' GROUP BY c.id_plat ORDER BY rentabilite DESC;");
          
          try{
            // Exécution de la requête SQL du dessus
            $stmt->execute();            
          } catch (PDOException $e){
            // Affichage d'un message d'erreur si la requête échoue
            echo 'Erreur lors de l\'exécution de la requête : '. $e->getMessage();
          }

        // Récupération des résultats de la requête
        $result=$stmt->fetchAll();
        ?>
        
        
       <?php
       $i=0;
        foreach($result as $row){
          echo '<div class="col-sm-12 col-lg-4">
              <a href="commande.php">
                <img src="assets/img/food/'.$row['image'].'"class="animeimage posImage" alt="'.$row['libelle'].'">
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
          </div>
        </div>

  </div>
</div>

<br>

  <!--php
  require_once('carouselIndex.php') /*CASSE POUR LE MOMENT*/
  ?>-->


</div>
</div>



<br>

<?php
    require_once('footer.php')
?>

  

    
