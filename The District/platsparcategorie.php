<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plats par catégorie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/platsparcatégorie.css">
    <link rel="shortcut icon" href="assets/img/the_district_brand/favicon.png">
</head>
<body>
  <div class="container">
    
  <?php
    require_once('header.php')
  ?>


  <div class="container-fluid">
    <div class="row">
      <img src="assets/img/bg1.jpeg" alt="bandereau" title="bandereau" id="image" class="col-6">
      </div>
      </div>

    


<br>

<div class="container m-3">
    <div class="row">
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





<div class="row justify-content-between">
    <button type="button" class="btn btn-secondary col-3 m-5 p-0 rounded-pill bprecsuiv">Précédent</button>
    <button type="button" class="btn btn-secondary col-3 m-5 p-0 rounded-pill bprecsuiv">Suivant</button>
    </div>
    </div>

<br><br>

<?php
    require_once('footer.php')
?>












  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>