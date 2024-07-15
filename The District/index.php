<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <title>Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/index.css">
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

<?php
  require_once('selCatIndex.php')
  ?>


  <?php
  require_once('carouselIndex.php')
  ?>

</div>
</div>

</div>

<br>

<?php
    require_once('footer.php')
?>

  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</body>
</html>