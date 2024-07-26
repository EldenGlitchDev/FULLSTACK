<?php
//1) Fonction SQL pour index toutes les catégories
function indexTouteslesCatégories(){
    
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
    // récupère toutes les données de catégorie
    $stmt=$dbh->prepare("SELECT * FROM categorie WHERE active='Yes'");
    
    try{
      // exécute de la requête SQL
      $stmt->execute();
    } catch (PDOException $e){
      // affiche un message d'erreur si la requête échoue
      echo 'Erreur lors de l\'exécution de posImala requête : '. $e->getMessage();
    }
    
    // récupération des résultats de la requête
    $result=$stmt->fetchAll();
    return $result;
  }
  /*appelez la fonction pour récupérer la valeur de $result*/
  $result = indexTouteslesCatégories();



//2) Fonction SQL pour index plats les plus vendus
function indexPlatslesplusVendus(){

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
    // Préparation de la requête SQL pour les plats les plus vendus
    $stmt=$dbh->prepare("SELECT p.id,p.id_categorie,c.id_plat,SUM(quantite) 
    AS quantite_vendue,SUM(quantite)*prix 
      AS rentabilite,p.libelle,p.description,p.prix,p.image 
        FROM commande c 
          LEFT JOIN plat p 
            ON c.id_plat=p.id 
              WHERE c.etat!='Annulée' 
                GROUP BY c.id_plat 
                  ORDER BY rentabilite DESC;");

try{
// Exécution de la requête SQL du dessus
$stmt->execute();            
} catch (PDOException $e){
// Affichage d'un message d'erreur si la requête échoue
echo 'Erreur lors de l\'exécution de la requête : '. $e->getMessage();
}

// Récupération des résultats de la requête
$result=$stmt->fetchAll();
return $result;
}
/*appelez la fonction pour récupérer la valeur de $result*/
$result = indexPlatslesplusVendus();



//3) Fonctions SQL pour TITRE plats par catégorie (NE FONCTIONNE PAS POUR LE MOMENT)
function platsParCategorieTitre(){

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
$stmt=$dbh->prepare("SELECT plat.libelle AS nomplat, plat.image, plat.prix, plat.description, categorie.libelle AS nomcat, plat.id, id_categorie FROM plat LEFT JOIN categorie on plat.id_categorie=categorie.id WHERE id_categorie= :id ORDER BY categorie.libelle DESC");
try{
  // exécute de la requête SQL
  $stmt->execute(array(':id' => $_GET['catplat']));
  /*$stmt->execute(array($_GET['catplat']));*/
} catch (PDOException $e){
  // affiche un message d'erreur si la requête échoue
  echo 'Erreur lors de l\'exécution de la requête : '. $e->getMessage();
}

$result=$stmt->fetchAll();
$stock=$_GET['catplat'];
return $result;
return $stock;
}
$result = platsParCategorieTitre();



//4) Fonction SQL CORPS plats par catégorie (NE FONCTIONNE PAS POUR LE MOMENT)
function platsParCategorieCorps(){

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
  $stmt = $dbh->prepare("SELECT libelle FROM categorie WHERE id = :id");
try{
  $stmt->execute(array(':id' => $_GET['catplat']));
} catch (PDOException $e){
  // affiche un message d'erreur si la requête échoue
  echo 'Erreur lors de l\'exécution de la requête : '. $e->getMessage();
}

  $result = $stmt->fetchColumn();
  return $result;
}
$result = platsParCategorieCorps();



//5)  Fonction SQL pour commande
function commande(){
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
  $stmt=$dbh->prepare("SELECT plat.libelle AS nomplat, plat.image, plat.prix, plat.description, categorie.libelle AS nomcat, plat.id, id_categorie 
                            FROM plat LEFT JOIN categorie ON plat.id_categorie=categorie.id 
                                WHERE plat.id= :id ORDER BY categorie.libelle DESC");
  try{
    $stmt->execute(array(':id' => $_GET['comm'])); /* $stmt est un objet PDOStatement, qui représente une instruction SQL préparée.
    execute() est une méthode de l'objet PDOStatement qui exécute l'instruction préparée.
    Le array(':id' => $_GET['comm']) est un tableau associatif qui mappe un espace réservé :id dans l'instruction préparée à une valeur obtenue à partir du tableau superglobal $_GET. */
  } catch (PDOException $e){
    echo 'Erreur lors de l\'exécution de la requête : '. $e->getMessage();
  }

$result=$stmt->fetchAll();
$stock=$_GET['comm'];
return $result;
return $stock;
}
$result = commande();


//6) Fonction SQL catégories
function categorie(){
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
  $stmt=$dbh->prepare("SELECT * FROM categorie WHERE active='Yes'");

try{
  // exécute de la requête SQL
  $stmt->execute();
} catch (PDOException $e){
  // affiche un message d'erreur si la requête échoue
  echo 'Erreur lors de l\'exécution de la requête : '. $e->getMessage();
}

// récupération des résultats de la requête
$result=$stmt->fetchAll();
return $result;
}
$result = categorie(); // j'en suis là !!!!!!!!!!!





// Fonction SQL tous les plats
function touslesPlats(){

}

?>