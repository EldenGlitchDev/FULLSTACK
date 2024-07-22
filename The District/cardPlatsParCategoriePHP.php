<div class="container m-3">
    <div class="row">

<?php
if(isset($_GET['numcat'])){ // Vérification si le paramètre 'numcat' est défini dans l'URL
  // Préparation de la requête SQL pour récupérer les plats d'une catégorie spécifique
  $stmt=$dbh->prepare("SELECT plat.libelle AS nomplat, plat.image, plat.description, categorie.libelle AS nomcat, plat.id, id_categorie FROM plat LEFT JOIN categorie on plat.id_categorie=categorie.id WHERE id_categorie= :id ORDER BY categorie.libelle DESC");

  // Liaison du paramètre :id avec la valeur de $_GET['numcat']
  $stmt->bindParam(':id', $_GET['numcat']);
} else {
  
}
?>









    <p class="col-6 col-lg-1" id="titre">Pizzas</p>
</div>
</div>


<div class="container">
    <div class="row justify-content-between g-0">
                <div class="card mb-3" style="max-width: 580px;">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="assets/img/food/pizza-margherita.jpg" class="img-fluid rounded-start border border-dark border-4" alt="pizza-margherita">
                      </div>
                      <div class="col-md-8 cardscolor">
                        <div class="card-body">
                          <h5 class="card-title txtcolor">Pizza Margarita</h5>
                          <p class="card-text txtcolor">Booooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooof ?</p>
                            <div class="d-flex justify-content-end">
                          <a href="#" class="btn btn-primary">Commander</a>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="card mb-3" style="max-width: 580px;">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="assets/img/food/pizza-salmon.png" class="img-fluid rounded-start border border-dark border-4" alt="pizza-salmon">
                      </div>
                      <div class="col-md-8 cardscolor">
                        <div class="card-body">
                          <h5 class="card-title txtcolor">Pizza Saumon</h5>
                          <p class="card-text txtcolor">Booooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooof ?</p>
                          <div class="d-flex justify-content-end">
                            <a href="#" class="btn btn-primary">Commander</a>
                              </div>
                        </div>
                      </div>
                    </div>
                  </div>
    </div>
</div>



<div class="container">
    <div class="row justify-content-between g-0">


  <div class="card mb-3" style="max-width: 580px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="assets/img/category/pizza_cat.jpg" class="img-fluid rounded-start border border-dark border-4" alt="pizzaPPO">
    </div>
    <div class="col-md-8 cardscolor">
      <div class="card-body">
        <h5 class="card-title txtcolor">Pizza PPO Poulet-Patates-Oignons</h5>
        <p class="card-text txtcolor">Booooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooof ?</p>
        <div class="d-flex justify-content-end">
          <a href="#" class="btn btn-primary">Commander</a>
            </div>
      </div>
    </div>
  </div>
</div>
  

<div class="card mb-3" style="max-width: 580px;">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="assets/img/food/Food-Name-8298.jpg" class="img-fluid rounded-start border border-dark border-4" alt="pizzaVeggie">
      </div>
      <div class="col-md-8 cardscolor">
        <div class="card-body">
          <h5 class="card-title txtcolor">Pizza Veggie</h5>
          <p class="card-text txtcolor">Booooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooof ?</p>
          <div class="d-flex justify-content-end">
            <a href="#" class="btn btn-primary">Commander</a>
              </div>
        </div>
      </div>
    </div>
  </div>

</div>
</div>