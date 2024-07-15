<?php


// récupère toutes les données de catégorie
$stmt=$dbh->prepare("SELECT * FROM categorie WHERE active=''Yes");

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
              <a href="categorie.php">
                <img src="assets/img/category/'.$row['image'].'"class="animeimage" alt="'.$row['libelle'].'">
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



<!--<div class="container">
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
  </span>-->