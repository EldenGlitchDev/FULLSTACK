<?php
session_start();

$servername = "localhost";
$username = "admin";
$password = "Afpa1234";
$dbname = "the_district";

try {
  $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
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
  $pages = [
    '/index.php' => 'Accueil',
    '/categorie.php' => 'Catégories',
    '/touslesplats.php' => 'Plats',
    '/commande.php' => 'Commande',
    '/contact.php' => 'Contact',
    '/platsparcategorie.php' => 'Plats par catégories',
    '/politique_de_confidentialite.php' => 'Politique de confidentialité',
    '/mentions_legales.php' => 'Mentions légales',
    /* AJOUTER DES PAGES ICI EN CAS DE RAJOUT */
  ];

  $plats = [
    4 => 'Pizzas',
    5 => 'Burgers',
    9 => 'Wraps',
    10 => 'Pastas',
    11 => 'Sandwichs',
    13 => 'Salades',
    /* AJOUTER DES PLATS ICI EN CAS DE RAJOUT */
  ];

  $commandes = [
    5 => 'Pizza Bianca',
    14 => 'Pizza Margherita',
    4 => 'District Burger',
    10 => 'Cheeseburger',
    9 => 'Buffalo Chicken Wrap',
    12 => 'Spaghetti aux légumes',
    16 => 'Lasagnes',
    17 => 'Tagliatelles au saumon',
    13 => 'Salade César',
    15 => 'Courgettes farcies au quinoa et duxelles de champignons'
    /* AJOUTER DES COMMANDES ICI EN CAS DE RAJOUT */
  ];

  $url = $_SERVER['REQUEST_URI'];

  if (isset($pages[$url])) {
    echo '<title>' . $pages[$url] . '</title>';
  } elseif (strpos($url, '/platsparcategorie.php') !== false) {
    $catplat = $_GET['catplat'];
    if (isset($plats[$catplat])) {
      echo '<title>' . $plats[$catplat] . '</title>';
    } else {
      echo '<title>Plats par catégories</title>';
    }
  } elseif (strpos($url, '/commande.php') !== false) {
    $comm = $_GET['comm'];
    if (isset($commandes[$comm])) {
      echo '<title>' . $commandes[$comm] . '</title>';
    } else {
      echo '<title>Commandes</title>';
    }
  } else {
    echo '<title>NoPage</title>';
  }
  ?>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/styles.css">
  <link rel="shortcut icon" href="assets/img/the_district_brand/favicon.png">

</head>

<body>

  <header>
    <div class="container">
      <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
          <a href="index.php"><img src="assets/img/the_district_brand/logo.png" alt="logo" width="150" height="110" class="mx-3" class="img-fluid"></a>
          <button class="navbar-toggler couleurbouton boutonderoulant" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link mx-5 px-4 couleurbouton" aria-current="page" href="index.php">Accueil</a>
              <a class="nav-link mx-5 px-4 couleurbouton" href="categorie.php">Catégorie</a>
              <a class="nav-link mx-5 px-4 couleurbouton" href="touslesplats.php">Plats</a>
              <a class="nav-link mx-5 px-4 couleurbouton" href="contact.php">Contact</a>
              <form class="d-flex d-lg-none">
                <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Rechercher">
                <button class="btn btn-outline-light" type="submit">Rechercher</button>
              </form>
            </div>
          </div>
        </div>
      </nav>
    </div>

    <?php
    if ($_SERVER['REQUEST_URI'] == "/index.php") {
      echo '<section>
<div class="container">
  <div class="row">
    <label for="recherche" class="form-label d-none d-md-block"></label>
    <input type="text" class="form-control-sm col-2 d-none d-md-block" id="recherche" placeholder="Recherche...">
  </div>
</div>

  <div class="container">
<div class="row">
  <video src="assets/img/852299-hd_1280_720_30fps.mp4" loop autoplay muted alt="video_pizza" title="bandereau" id="video" class="object-fit-cover">
  </div>
  </div>
  </section>';
    } elseif (!in_array($_SERVER['REQUEST_URI'], ["/commande.php", "/scriptformulairecommande.php", "/politique_de_confidentialite.php", "/mentions_legales.php"]) && !isset($_GET['platcommande'])) {
      echo '<div class="container-fluid">
    <div class="row justify-content-center">
      <img src="assets/img/bg1.jpeg" alt="bandereau" title="bandereau" id="imageBandereau" >
    </div>
</div>';
    } else {
      // ne pas afficher de bannière sur la page commande
    }
    ?>
    
  </header>