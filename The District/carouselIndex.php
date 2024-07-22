 <!-- <div class="container">
    <div class="row">
  <div id="carouselExampleIndicators" class="carousel slide">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="assets/img/food/pizza-margherita.jpg" class="d-block w-40 animeimage" alt="pizza-margherita" id="pizzamargarita">
        <p id="plat1">Pizza Margarita</p><br>
      </div>
      <div class="carousel-item">
        <img src="assets/img/food/hamburger.jpg" class="d-block w-40 animeimage" alt="hamburger" id="hamburger">
        <p id="plat2">Hamburger Bacon</p><br>
      </div>
      <div class="carousel-item">
        <img src="assets/img/food/spaghetti-legumes.jpg" class="d-block w-40 animeimage" alt="spaghetti" id="spaghetti">
        <p id="plat3">Spaghetti Légumes</p><br>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Précédent</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden boutondefilement">Suivant</span>
    </button>
  </div>
</div>
</div> -->


<div class="container">
          <div class="row">

<h1>Les plats les plus vendus</h1>

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

    <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Précédent</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden boutondefilement">Suivant</span>
    </button>

    </div>
  </div>
</div> -->


