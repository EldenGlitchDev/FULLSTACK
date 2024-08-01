<?php
//1) Fonction SQL pour index toutes les catégories
function indexTouteslesCategories()
{
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
  $stmt = $dbh->prepare("SELECT * FROM categorie WHERE active='Yes'");
  try {
    $stmt->execute();
  } catch (PDOException $e) {
    echo 'Erreur lors de l\'exécution de posImala requête : ' . $e->getMessage();
  }
  $result = $stmt->fetchAll();
  return $result;
}
$result = indexTouteslesCategories();

//  Fonction pour foreach index toutes les catégories
function indexTouteslesCategoriesForeach($result)
{
  $i = 0;
  foreach ($result as $row) {
    echo '<div class="col-sm-12 col-lg-4">
              <a href="platsparcategorie.php?catplat=' . $row['id'] . '">
                <img src="assets/img/category/' . $row['image'] . '"class="animeimage posImage" alt="' . $row['libelle'] . '">
                <div class="row justify-content-center">
                <p class="pCouleurtxt col-7">' . $row['libelle'] . '</p>
                </div>
                <div class="card-body">
                </div>
              </a>
              </div>';
    $i++;
    if ($i == 6) {
      break;
    }
  }
}


/* ---------------------------------------------------------------------------------------------------------------------------------------------------------------- */


//2) Fonction SQL pour index plats les plus vendus
function indexPlatslesplusVendus()
{
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
  $stmt = $dbh->prepare("SELECT p.id,p.id_categorie,c.id_plat,SUM(quantite) 
    AS quantite_vendue,SUM(quantite)*prix 
      AS rentabilite,p.libelle,p.description,p.prix,p.image 
        FROM commande c 
          LEFT JOIN plat p 
            ON c.id_plat=p.id 
              WHERE c.etat!='Annulée' 
                GROUP BY c.id_plat 
                  ORDER BY rentabilite DESC;");

  try {
    $stmt->execute();
  } catch (PDOException $e) {
    echo 'Erreur lors de l\'exécution de la requête : ' . $e->getMessage();
  }
  $result = $stmt->fetchAll();
  return $result;
}
$result = indexPlatslesplusVendus();

// Fonction pour foreach index plats les plus vendus
function indexPlatslesplusVendusForeach($result)
{
  $i = 0;
  foreach ($result as $row) {
    echo '<div class="col-sm-12 col-lg-4">
              <a href="commande.php?comm=' . $row['id'] . '">
                <img src="assets/img/food/' . $row['image'] . '"class="animeimage posImage" alt="' . $row['libelle'] . '">
                <div class="row justify-content-center">
                <p class="pCouleurtxt col-7">' . $row['libelle'] . '</p>
                </div>
                <div class="card-body">
                </div>
              </a>
              </div>';
    $i++;
    if ($i == 6) {
      break;
    }
  }
}


/* ---------------------------------------------------------------------------------------------------------------------------------------------------------------- */


//3) Fonction SQL TITRE plats par catégorie
function platsParCategorieTitre()
{
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
  $stmtCat = $dbh->prepare("SELECT libelle FROM categorie WHERE id = :id");
  try {
    $stmtCat->execute(array(':id' => $_GET['catplat']));
  } catch (PDOException $e) {
    echo 'Erreur lors de l\'exécution de la requête : ' . $e->getMessage();
  }
  $categoryName = $stmtCat->fetchColumn();
  return $categoryName;
}
$categoryName = platsParCategorieTitre();


/* ---------------------------------------------------------------------------------------------------------------------------------------------------------------- */


//4) Fonctions SQL CORPS plats par catégorie
function platsParCategorieCorps()
{
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
  $stmt = $dbh->prepare("SELECT plat.libelle AS nomplat, plat.image, plat.prix, plat.description, categorie.libelle AS nomcat, plat.id, id_categorie FROM plat LEFT JOIN categorie on plat.id_categorie=categorie.id WHERE id_categorie= :id ORDER BY categorie.libelle DESC");
  try {
    $stmt->execute(array(':id' => $_GET['catplat']));
  } catch (PDOException $e) {
    echo 'Erreur lors de l\'exécution de la requête : ' . $e->getMessage();
  }

  $result = $stmt->fetchAll();
  $stock = $_GET['catplat'];
  return $result;
  return $stock;
}
$result = platsParCategorieCorps();

// Fonction pour foreach plats par catégorie corps
function platsParCategorieCorpsForeach($result)
{
  $i = 0;
  foreach ($result as $row) {
    echo '<div class=container>
  <div class="row justify-content-center g-0">
  <div class="card mb-3" style="max-width: 1000px;">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="assets/img/food/' . $row['image'] . '" class="img-fluid rounded-start border border-dark border-4 imageComm" alt="' . $row['nomplat'] . '">
      </div>
      <div class="col-md-8 cardscolor">
        <div class="card-body">
          <h5 class="card-title txtcolor">' . $row['nomplat'] . '</h5>
          <p class="card-text txtcolor">' . $row['description'] . '</p>
          <p class="card-text txtcolor">Prix :<b> ' . $row['prix'] . ' €</b></p>
          <div class="d-flex justify-content-end">
            <form action="commande.php" method="GET" class="col-6">
              <button type="submit" name="comm" class="btn btn-primary" value="' . $row['id'] . '" id="boutoncommander">Commander</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div></div><div>';
    $i++;
    if ($i == 6) {
      break;
    }
  }
}


/* ---------------------------------------------------------------------------------------------------------------------------------------------------------------- */


//5)  Fonction SQL pour commande
function commande()
{
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
  $stmt = $dbh->prepare("SELECT plat.libelle AS nomplat, plat.image, plat.prix, plat.description, categorie.libelle AS nomcat, plat.id, id_categorie 
                            FROM plat LEFT JOIN categorie ON plat.id_categorie=categorie.id 
                                WHERE plat.id= :id ORDER BY categorie.libelle DESC");
  try {
    $stmt->execute(array(':id' => $_GET['comm']));
  } catch (PDOException $e) {
    echo 'Erreur lors de l\'exécution de la requête : ' . $e->getMessage();
  }

  $result = $stmt->fetchAll();
  $stock = $_GET['comm'];
  return $result;
  return $stock;
}
$result = commande();

// Fonction pour foreach commande
function commandeForeach($result)
{
  $i = 0;
  foreach ($result as $row) {
    echo '<div class="container">
  <div class="row justify-content-center g-0">
  <div class="card mb-3" style="max-width: 1000px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="assets/img/food/' . $row['image'] . '" class="img-fluid border border-dark border-4 imageComm" alt="' . $row['nomplat'] . '">
    </div>
    <div class="col-md-8 cardscolor">
      <div class="card-body">
        <h5 class="card-title txtcolor">' . $row['nomplat'] . '</h5>
        <p class="card-text txtcolor">' . $row['description'] . '</p>
        <p class="card-text txtcolor">Prix :<b> ' . $row['prix'] . ' €</b></p>
        <p class="txtcolor quantite fs-4">Quantité :</p>
              <input class="input_style barrequantite" type="number" tabindex="5" min="1" max="500" value="1" name="quantite" required>
      </div>
    </div>
  </div>
</div>
</div>
</div>';
    $i++;
    if ($i == 1) {
      break;
    }
  }
}


/* ---------------------------------------------------------------------------------------------------------------------------------------------------------------- */


//6) Fonction SQL catégories
function categorie()
{
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
  $stmt = $dbh->prepare("SELECT * FROM categorie WHERE active='Yes'");

  try {
    $stmt->execute();
  } catch (PDOException $e) {
    echo 'Erreur lors de l\'exécution de la requête : ' . $e->getMessage();
  }
  $result = $stmt->fetchAll();
  return $result;
}
$result = categorie();

// Fonction pour foreach catégories
function categorieForeach($result)
{
  $i = 0;
  foreach ($result as $row) {
    echo '<div class="col-sm-12 col-lg-4">
        <a href="platsparcategorie.php?catplat=' . $row['id'] . '">
          <img src="assets/img/category/' . $row['image'] . '"class="animeimage posImage" alt="' . $row['libelle'] . '">
          <div class="row justify-content-center">
          <p class="pCouleurtxt col-7">' . $row['libelle'] . '</p>
          </div>
          <div class="card-body">
          </div>
        </a>
        </div>';
    $i++;
    if ($i == 6) {
      break;
    }
  }
}


/* ---------------------------------------------------------------------------------------------------------------------------------------------------------------- */


//7) Fonction SQL tous les plats
function touslesPlats()
{
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
  $stmt = $dbh->prepare("SELECT plat.libelle AS nomplat, plat.image, plat.prix, plat.description, categorie.libelle
                          AS nomcat, plat.id, id_categorie FROM plat LEFT JOIN categorie ON plat.id_categorie = categorie.id
                              WHERE id_categorie ORDER BY categorie.libelle DESC");
  try {
    $stmt->execute();
  } catch (PDOException $e) {
    echo 'Erreur lors de l\'exécution de la requête : ' . $e->getMessage();
  }
  $result = $stmt->fetchAll();
  return $result;
}
$result = touslesPlats();

// Fonction pour foreach tous les plats
function touslesPlatsForeach($result)
{
  $i = 0;
  foreach ($result as $row) {
    echo '<div class="col-md-6">
  <div class="card mb-3" style="max-width: 630px;">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="assets/img/food/' . $row['image'] . '" class="img-fluid rounded-start border border-dark border-4" id="imageTouslesPlats" alt="' . $row['nomplat'] . '">
      </div>
      <div class="col-md-8 cardscolor">
        <div class="card-body">
          <h5 class="card-title txtcolor">' . $row['nomplat'] . '</h5>
          <p class="card-text txtcolor">' . $row['description'] . '</p>
          <p class="card-text txtcolor">Prix :<b> ' . $row['prix'] . ' €</b></p>
          <div class="d-flex justify-content-end">
            <form action="commande.php" method="GET">
              <button type="submit" name="comm" class="btn btn-primary" value="' . $row['id'] . '" id="boutoncommander">Commander</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div></div>';
    $i++;
    if ($i == 6) {
      break;
    }
  }
}