<?php
session_start();
require_once('DAO.php');

$servername = "localhost";
$username = "admin";
$password = "Afpa1234";
$dbname = "the_district";

try {
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // configurer le mode d'erreur PDO pour générer des exceptions
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Erreur de connexion à la base de données: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">


  <?php
  switch ($_SERVER['REQUEST_URI']) {
    case '/index.php':
      echo '<title>Accueil</title>';
      break;
    case '/touslesplats.php':
      echo '<title>Plats</title>';
      break;
    case '/contact.php':
      echo '<title>Contact</title>';
      break;
    case '/categorie.php':
      echo '<title>Catégories</title>';
      break;
    case '/platsparcategorie.php':
      echo '<title>Plats par catégories</title>';
      break;
    case '/commande.php':
      echo '<title>Commande</title>';
      break;


    default:
      echo '<title>NoPage</title>';
  }

  ?>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="shortcut icon" href="assets/img/the_district_brand/favicon.png">


  <?php
  switch ($_SERVER['REQUEST_URI']) {
    case '/index.php':
      echo '<link rel="stylesheet" href="assets/css/index.css">';
      break;
    case '/touslesplats.php':
      echo '<link rel="stylesheet" href="assets/css/touslesplats.css">';
      break;
    case '/contact.php':
      echo '<link rel="stylesheet" href="assets/css/contact.css">';
      break;
    case '/categorie.php':
      echo '<link rel="stylesheet" href="assets/css/categorie.css">';
      break;
    case '/platsparcategorie.php':
      echo '<link rel="stylesheet" href="assets/css/platsparcategorie.css">';
      break;
    case '/commande.php':
      echo '<link rel="stylesheet" href="assets/css/commande.css">';
      break;


    default:
      echo '<link rel="stylesheet" href="assets/css/index.css">';
  }



  ?>


</head>

<body>


  <header>
    <div class="container">
      <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
          <img src="assets/img/the_district_brand/logo.png" alt="logo" width="150" height="110" class="mx-3" class="img-fluid">
          <button class="navbar-toggler couleurbouton" id="boutonderoulant" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link mx-5 px-4 couleurbouton" aria-current="page" href="index.php">Accueil</a>
              <a class="nav-link mx-5 px-4 couleurbouton" href="categorie.php">Catégorie</a>
              <a class="nav-link mx-5 px-4 couleurbouton" href="touslesplats.php">Plats</a>
              <a class="nav-link mx-5 px-4 couleurbouton" href="contact.php">Contact</a>
            </div>
          </div>
        </div>
      </nav>
    </div>

    <?php
    if ($_SERVER['REQUEST_URI'] == "/index.php") { // affiche la vidéo sur la page index avec sa barre de recherche
      echo '<section>
  <div class="container">
    <div class="row">
    <label for="recherche" class="form-label"></label>
    <input type="text" class="form-control-sm col-2" id="recherche" placeholder="Recherche...">
  </div>
</div>

  <div class="container">
<div class="row">
  <video src="assets/img/852299-hd_1280_720_30fps.mp4" loop autoplay muted alt="video_pizza" title="bandereau" id="video" class="object-fit-cover">
  </div>
  </div>
  </section>';
    }
    // in_array : indique si une valeur appatient à un tableau
    // isset : indique si une variable est déclarée et est différente de null
    // !!!!!!!! intégrer ['platcommande'] dans le 'execute' de la page commande' -> $GET_['platcommande'] !!!!!!!!!
    elseif (!in_array($_SERVER['REQUEST_URI'], ["/commande.php", "/scriptformulairecommande.php"]) && !isset($_GET['platcommande'])) {
      // afficher la banière image sur les autres pages hotmis la page de commande
      echo '<div class="container-fluid">
    <div class="row justify-content-center">
      <img src="assets/img/bg1.jpeg" alt="bandereau" title="bandereau" id="image" >
    </div>
</div>';
    } else {
      // ne pas afficher de bannière sur la page commande
    }
    ?>


  </header>