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


<?php
    require_once('bandereau.php')
?>

<br>

<?php
    require_once('cardPlatsParCategoriePHP.php')
?>



<?php
    require_once('boutonsSuivPrec.php')
?>

</div>

<br><br>

<?php
    require_once('footer.php')
?>

  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>