<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catégorie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/categorie.css">
    <link rel="shortcut icon" href="assets/img/the_district_brand/favicon.png">
</head>
<body>
  <div class="container">
    
  <?php
    require_once('header.php')
  ?>

  <div class="container-fluid">
    <div class="row">
      <img src="assets/img/bg1.jpeg" alt="bandereau" title="bandereau" id="image" class="col-sm-6 col-lg-6">
      </div>
      </div>

    


<br>

<div class="container">
  <div class="row">

<span class="col-sm-12 col-lg-4">
  <div id="categorie1">
  <img src="assets/img/category/wrap_cat.jpg" id="wrap" alt="wrap" title="wrap">
  <p>Wrap</p>
  </div>
</span>

<span class="col-sm-12 col-lg-4">
  <div id="categorie2">
  <img src="assets/img/category/sandwich_cat.jpg" id="sandwichcat" alt="sandwich" title="sandwich">
  <p>Sandwich</p>
</div>
</span>
    
<span class="col-sm-12 col-lg-4">
<div id="categorie3">
  <img src="assets/img/category/pizza_cat.jpg" id="pizzacat" alt="pizza" title="pizza">
  <p>Pizza</p>
</div>
</span>

<span class="col-sm-12 col-lg-4">
  <div id="categorie4">
    <img src="assets/img/category/pasta_cat.jpg" id="pastacat" alt="pate" title="pate">
    <p>Pâte</p>
  </div>
  </span>


<span class="col-sm-12 col-lg-4">
  <div id="categorie5">
    <img src="assets/img/category/burger_cat.jpg" id="brugercat" alt="burger" title="burger">
    <p>Burger</p>
  </div>
  </span>



<span class="col-sm-12 col-lg-4">
  <div id="categorie6">
    <img src="assets/img/category/asian_food_cat.jpg" id="asianfood" alt="asianfood" title="asianfood">
    <p>Asiatique</p>
  </div>
</span>
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