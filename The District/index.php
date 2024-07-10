<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <title>Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/accueil.css">
    <link rel="shortcut icon" href="assets/img/the_district_brand/favicon.png">
</head>
<body>
  <div class="container">
    
  <?php
    require_once('header.php')
  ?>



<section>
  <div class="container">
    <div class="row">
  <!--<div class="mb-3">-->
    <label for="recherche" class="form-label"></label>
    <input type="text" class="form-control-sm col-2" id="recherche" placeholder="Recherche...">
  </div>
</div>

  
<!-- <form method="post" id="recherche">                                      rajouter form="action"
  <input type="text" name="recherche" placeholder="Recherche...">
</form> -->
<div class="container-fluid">
<div class="row">
  <video src="assets/img/852299-hd_1280_720_30fps.mp4" loop autoplay muted alt="video_pizza" title="bandereau" id="video" class="object-fit-cover border border-primary-subtle rounded">
  </div>
  </div>
  </section>

<div class="parallax col-14 col-sm-12">

<div class="container">
  <div class="row">

<span class="col-sm-12 col-lg-4">
  <div id="categorie1">
  <img src="assets/img/category/wrap_cat.jpg" id="wrap" alt="wrap" title="wrap" class="animeimage">
  <p>Wrap</p>
  </div>
</span>

<span class="col-sm-12 col-lg-4">
  <div id="categorie2">
  <img src="assets/img/category/sandwich_cat.jpg" id="sandwichcat" alt="sandwich" title="sandwich" class="animeimage">
  <p>Sandwich</p>
</div>
</span>

<span class="col-sm-12 col-lg-4">
<div id="categorie3">
  <img src="assets/img/category/pizza_cat.jpg" id="pizzacat" alt="pizza" title="pizza" class="animeimage">
  <p>Pizza</p>
</div>
</span>

<span class="col-sm-12 col-lg-4">
  <div id="categorie4">
    <img src="assets/img/category/pasta_cat.jpg" id="pastacat" alt="pate" title="pate" class="animeimage">
    <p>Pâte</p>
  </div>
  </span>


<span class="col-sm-12 col-lg-4">
  <div id="categorie5">
    <img src="assets/img/category/burger_cat.jpg" id="brugercat" alt="burger" title="burger" class="animeimage">
    <p>Burger</p>
  </div>
  </span>



<span class="col-sm-12 col-lg-4">
  <div id="categorie6">
    <img src="assets/img/category/asian_food_cat.jpg" id="asianfood" alt="asianfood" title="asianfood" class="animeimage">
    <p>Asiatique</p>
  </div>
  </span>


  <div class="container">
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
</div>




<!--<span class="col-4">
  <div id="plat1">
    <img src="assets/img/food/pizza-margherita.jpg" id="pizzamargarita" alt="pizzamargarita" title="pizzamargarita">
    <p>Plat 1</p>
  </div>
  </span>


<span class="col-4">
  <div id="plat2">
    <img src="assets/img/food/hamburger.jpg" id="hamburger" alt="hamburger" title="hamburger">
  <p>Plat 2</p>
  </div>
  </span>

<span class="col-4">
  <div id="plat3">
    <img src="assets/img/food/spaghetti-legumes.jpg" id="spaghetti" alt="spaghetti" title="spaghetti">
    <p>Plat 3</p>
  </div>
  </span>-->


</div>
</div>

</div>

<br>

<?php
    require_once('footer.php')
?>

<!--<footer>
  <div class="container">
    <div class="row">

    <div class="d-flex justify-content-center">
      <img src="assets/img/Icones/icons8-logo-google-48.png" id="logogoogle" alt="googlelogo" title="googlelogo" class="col-sm-6 col-lg-1">
      
      <img src="assets/img/Icones/icons8-reddit-48.png" id="logoreddit" alt="redditlogo" title="redditlogo" class="col-sm-6 col-lg-1">
      
      <img src="assets/img/Icones/icons8-youtube-48.png" id="logoyoutube" alt="youtubelogo" title="youtubelogo" class="col-sm-6 col-lg-1">

      <img src="assets/img/the_district_brand/facebook_cover_photo_1-removebg-preview.png" id="bandereaubas" alt="bandereaubas" title="bandereaubas" class="col-sm-1 col-lg-6">

      <img src="assets/img/Icones/icons8-instagram-48.png" id="logoinstagram" alt="instagramlogo" title="instagramlogo" class="col-sm-6 col-lg-1">

      <img src="assets/img/Icones/icons8-facebook-48.png" id="logofacebook" alt="facebooklogo" title="facebooklogo" class="col-sm-6 col-lg-1">

      <img src="assets/img/Icones/icons8-twitter-48.png" id="logotwitter" alt="twitterlogo" title="twitterlogo" class="col-sm-6 col-lg-1">
    </div>

    </div>
  </div>
</footer>-->

  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</body>
</html>