  <?php
    require_once('header.php')
  ?>

<!--?php
// récupère toutes les données de catégorie
$stmt=$dbh->prepare("SELECT * FROM categorie WHERE active='Yes'");

try{
  // exécute de la requête SQL
  $stmt->execute();
} catch (PDOException $e){
  // affiche un message d'erreur si la requête échoue
  echo 'Erreur lors de l\'exécution de posImala requête : '. $e->getMessage();
}

// récupération des résultats de la requête
$result=$stmt->fetchAll();
?-->

<?php
  require_once('DAO.php');
  $result=indexTouteslesCatégories();
?>

  <div class="container">
<div class="parallax col-14 col-sm-12">


<div class="container">
  <div class="row">

<div class="backgroundTitle mb-3">
<h1>Les catégories</h1>
</div>

  <?php
// affichage des catégories dans une card bootstrap pour les 6 premières catégories
  $i=0;
        foreach($result as $row){
            echo '<div class="col-sm-12 col-lg-4">
              <a href="platsparcategorie.php?catplat='.$row['id'].'">
                <img src="assets/img/category/'.$row['image'].'"class="animeimage posImage" alt="'.$row['libelle'].'">
                <p class="pCouleurtxt">'.$row['libelle'].'</p>
                <div class="card-body">
                </div>
              </a>
              </div>';
              $i++;
              if($i==6){
                break;
        }
      }
/* ?catplat= : Il s'agit d'un paramètre de chaîne de requête nommé comm. Le ? caractère sépare le nom du fichier de la chaîne de requête. */
?>

<div class="container">
          <div class="row">

<div class="backgroundTitle mb-3 mt-5">
<h1>Les plats les plus vendus</h1>
</div>

        <?php
  require_once('DAO.php');
  $result=indexPlatslesplusVendus();
?>
        <!--?php
            // Préparation de la requête SQL pour les plats les plus vendus
         $stmt=$dbh->prepare("SELECT p.id,p.id_categorie,c.id_plat,SUM(quantite) 
                                AS quantite_vendue,SUM(quantite)*prix 
                                  AS rentabilite,p.libelle,p.description,p.prix,p.image 
                                    FROM commande c 
                                      LEFT JOIN plat p 
                                        ON c.id_plat=p.id 
                                          WHERE c.etat!='Annulée' 
                                            GROUP BY c.id_plat 
                                              ORDER BY rentabilite DESC;");
          
          try{
            // Exécution de la requête SQL du dessus
            $stmt->execute();            
          } catch (PDOException $e){
            // Affichage d'un message d'erreur si la requête échoue
            echo 'Erreur lors de l\'exécution de la requête : '. $e->getMessage();
          }

        // Récupération des résultats de la requête
        $result=$stmt->fetchAll();
        ?-->

        
        
       <?php
       $i=0;
        foreach($result as $row){
          echo '<div class="col-sm-12 col-lg-4">
              <a href="commande.php?comm='.$row['id'].'">
                <img src="assets/img/food/'.$row['image'].'"class="animeimage posImage" alt="'.$row['libelle'].'">
                <p class="pCouleurtxt">'.$row['libelle'].'</p>
                <div class="card-body">
                </div>
              </a>
              </div>';
              $i++;
              if($i==6){
                break;
              }
        } /* ?comm= : Il s'agit d'un paramètre de chaîne de requête nommé comm. Le ? caractère sépare le nom du fichier de la chaîne de requête. */
        ?>
          </div>
        </div>

  </div>
</div>

<br>

</div>
</div>





<?php
    require_once('footer.php')
?>

  

    
