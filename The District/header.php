<?php
session_start();
/*require_once('DAO.php');*/

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


                                                      <!-- EXPLICATION DU CODE DU DESSOUS -->

<!-- Ce code PHP est utilisé pour générer dynamiquement le titre d'une page Web en fonction de l'URL actuelle et de certains tableaux prédéfinis. Voici un aperçu de ce que fait le code :
- Il vérifie d'abord si l'URL actuelle est présente dans le tableau $pages. Si tel est le cas, il définit le titre de la page sur la valeur correspondante dans le tableau.
- Si l'URL n'est pas trouvée dans le tableau $pages, il vérifie si l'URL contient la chaîne '/platsparcategorie.php'. Si c'est le cas, il récupère le paramètre 'catplat' de la chaîne de requête URL et vérifie s'il est présent dans le tableau $plats. Si tel est le cas, il définit le titre sur la valeur correspondante dans le tableau. Dans le cas contraire, il définit le titre sur « Plats par catégories ».
- Si l'URL ne contient pas '/platsparcategorie.php', il vérifie si elle contient '/commande.php'. Si c'est le cas, il récupère le paramètre 'comm' de la chaîne de requête URL et vérifie s'il est présent dans le tableau $commandes. Si tel est le cas, il définit le titre sur la valeur correspondante dans le tableau. Sinon, il définit le titre sur « Commandes ».
- Si l'URL ne correspond à aucune des conditions ci-dessus, le titre est défini sur « NoPage ».
- Les tableaux $pages, $plats et $commandes ne sont pas définis dans cet extrait de code, mais ils doivent contenir respectivement les valeurs de titre pour différentes URL, catégories et commandes. -->

<?php
$pages=[
  '/index.php'=>'Accueil',
  '/categorie.php'=>'Catégories',
  '/touslesplats.php'=>'Plats',
  '/commande.php'=>'Commande',
  '/contact.php'=>'Contact',
  '/platsparcategorie.php'=>'Plats par catégories',
  '/politique_de_confidentialite.php'=>'Politique de confidentialité',
  '/mentions_legales.php'=>'Mentions légales',
];

$plats=[
  4 => 'Pizzas',
  5 => 'Burgers',
  9 => 'Wraps',
  10 => 'Pastas',
  11 => 'Sandwichs',
  13 => 'Salades',
];

$commandes=[
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
];

$url = $_SERVER['REQUEST_URI'];

// isset -> détermine si une variable est déclarée et est différente de NULL
// strpos -> cherche la position de la première occurence dans une chaîne de caractères
if (isset($pages[$url])){
  echo '<title>'.$pages[$url].'</title>';
} elseif (strpos($url, '/platsparcategorie.php') !== false){
  $catplat = $_GET['catplat'];
  if (isset($plats[$catplat])){
    echo '<title>'.$plats[$catplat].'</title>';
  } else {
    echo '<title>Plats par catégories</title>';
  }
} elseif (strpos($url, '/commande.php') !== false){
  $comm = $_GET['comm'];
  if(isset($commandes[$comm])){
    echo '<title>'.$commandes[$comm].'</title>';
  } else {
    echo '<title>Commandes</title>';
  }
} else {
  echo '<title>NoPage</title>';
}
?>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="shortcut icon" href="assets/img/the_district_brand/favicon.png">


  <?php
  switch ($_SERVER['REQUEST_URI']) { // Il s'agit d'une variable superglobale PHP qui renvoie l'URL actuelle de la page Web.
    case '/index.php':               // L'instruction switch est utilisée pour vérifier la valeur de $_SERVER['REQUEST_URI'] et exécuter différents blocs de code en fonction de l'URL.
      echo '<link rel="stylesheet" href="assets/css/index.css">';
      break;
    case '/touslesplats.php':        // Pour chaque cas, le code vérifie si l'URL actuelle correspond à l'URL spécifiée. Si tel est le cas, il fait écho à une balise <link> qui renvoie à une feuille de style CSS spécifique.
      echo '<link rel="stylesheet" href="assets/css/touslesplats.css">';
      break;
    case '/contact.php':
      echo '<link rel="stylesheet" href="assets/css/contact.css">'; // La feuille de style CSS liée dans chaque cas est spécifique à la page Web correspondante. Par exemple, lorsque l'URL est /touslesplats.php, le code renvoie à assets/css/touslesplats.css
      break;
    case '/categorie.php':
      echo '<link rel="stylesheet" href="assets/css/categorie.css">';
      break;
    case '/commande.php':
      echo '<link rel="stylesheet" href="assets/css/commande.css">';
      break;
    case '/politique_de_confidentialite.php':
      echo '<link rel="stylesheet" href="assets/css/mention_polCon.css">';
      break;
    case '/mentions_legales.php':
      echo '<link rel="stylesheet" href="assets/css/mention_polCon.css">';
      break;
    case '/platsparcategorie.php?catplat=4':
        echo '<link rel="stylesheet" href="assets/css/platsparcategorie.css">';
      break;
    case '/platsparcategorie.php?catplat=5':
        echo '<link rel="stylesheet" href="assets/css/platsparcategorie.css">';
      break;
    case '/platsparcategorie.php?catplat=9':
        echo '<link rel="stylesheet" href="assets/css/platsparcategorie.css">';
      break;
    case '/platsparcategorie.php?catplat=10':
        echo '<link rel="stylesheet" href="assets/css/platsparcategorie.css">';
      break;
    case '/platsparcategorie.php?catplat=11':
        echo '<link rel="stylesheet" href="assets/css/platsparcategorie.css">';
      break;
    case '/platsparcategorie.php?catplat=13':
        echo '<link rel="stylesheet" href="assets/css/platsparcategorie.css">';
      break;
      case '/commande.php?comm=5':
        echo '<link rel="stylesheet" href="assets/css/commande.css">';
        break;
        case '/commande.php?comm=14':
          echo '<link rel="stylesheet" href="assets/css/commande.css">';
          break;
          case '/commande.php?comm=4':
            echo '<link rel="stylesheet" href="assets/css/commande.css">';
            break;
            case '/commande.php?comm=10':
              echo '<link rel="stylesheet" href="assets/css/commande.css">';
              break;
              case '/commande.php?comm=9':
                echo '<link rel="stylesheet" href="assets/css/commande.css">';
                break;
                case '/commande.php?comm=12':
                  echo '<link rel="stylesheet" href="assets/css/commande.css">';
                  break;
                  case '/commande.php?comm=16':
                    echo '<link rel="stylesheet" href="assets/css/commande.css">';
                    break;
                    case '/commande.php?comm=17':
                      echo '<link rel="stylesheet" href="assets/css/commande.css">';
                      break;
                      case '/commande.php?comm=13':
                        echo '<link rel="stylesheet" href="assets/css/commande.css">';
                        break;
                        case '/commande.php?comm=15':
                          echo '<link rel="stylesheet" href="assets/css/commande.css">';
                          break;

    default: // The default case is used to specify a fallback CSS stylesheet if the current URL does not match any of the specified URLs. In this case, it links to assets/css/index.css
      echo '<link rel="stylesheet" href="assets/css/index.css">';
  }
?>


</head>

<body>


  <header>
    <div class="container">
      <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
          <a href="index.php"><img src="assets/img/the_district_brand/logo.png" alt="logo" width="150" height="110" class="mx-3" class="img-fluid"></a>
          <button class="navbar-toggler couleurbouton" id="boutonderoulant" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
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
    if ($_SERVER['REQUEST_URI'] == "/index.php") { // affiche la vidéo sur la page index avec sa barre de recherche
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
    }
    // in_array : indique si une valeur appatient à un tableau
    // isset : indique si une variable est déclarée et est différente de null
    // !!!!!!!! intégrer ['platcommande'] dans le 'execute' de la page commande' -> $GET_['platcommande'] !!!!!!!!!
    elseif (!in_array($_SERVER['REQUEST_URI'], ["/commande.php", "/scriptformulairecommande.php", "/politique_de_confidentialite.php", "/mentions_legales.php"]) && !isset($_GET['platcommande'])) {
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