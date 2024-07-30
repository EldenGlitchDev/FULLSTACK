<?php
//1) Fonction SQL pour index toutes les catégories
function indexTouteslesCategories(){
    
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
  // récupère toutes les données de catégorie
    $stmt=$dbh->prepare("SELECT * FROM categorie WHERE active='Yes'");
    
    try{
      $stmt->execute();
    } catch (PDOException $e){
      echo 'Erreur lors de l\'exécution de posImala requête : '. $e->getMessage();
    }
    $result=$stmt->fetchAll();
    return $result;
  }
  $result = indexTouteslesCategories();


  
//2) Fonction SQL pour index plats les plus vendus
function indexPlatslesplusVendus(){

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
$stmt->execute();            
} catch (PDOException $e){
echo 'Erreur lors de l\'exécution de la requête : '. $e->getMessage();
}
$result=$stmt->fetchAll();
return $result;
}
$result = indexPlatslesplusVendus();



//3) Fonctions SQL CORPS plats par catégorie (!!! NE FONCTIONNE PAS POUR LE MOMENT !!!)
function platsParCategorieCorps(){}






//4) Fonction SQL TITRE plats par catégorie (!!! NE FONCTIONNE PAS POUR LE MOMENT !!!)
function platsParCategorieTitre(){}





//5)  Fonction SQL pour commande
function commande(){
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
  $stmt=$dbh->prepare("SELECT plat.libelle AS nomplat, plat.image, plat.prix, plat.description, categorie.libelle AS nomcat, plat.id, id_categorie 
                            FROM plat LEFT JOIN categorie ON plat.id_categorie=categorie.id 
                                WHERE plat.id= :id ORDER BY categorie.libelle DESC");
  try{
    $stmt->execute(array(':id' => $_GET['comm']));
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
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    echo "Erreur de connexion à la base de données: " . $e->getMessage();
  }
  $stmt=$dbh->prepare("SELECT * FROM categorie WHERE active='Yes'");

try{
  $stmt->execute();
} catch (PDOException $e){
  echo 'Erreur lors de l\'exécution de la requête : '. $e->getMessage();
}
$result=$stmt->fetchAll();
return $result;
}
$result = categorie();


//7) Fonction SQL tous les plats
function touslesPlats(){
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
  $stmt=$dbh->prepare("SELECT plat.libelle AS nomplat, plat.image, plat.prix, plat.description, categorie.libelle
                          AS nomcat, plat.id, id_categorie FROM plat LEFT JOIN categorie ON plat.id_categorie = categorie.id
                              WHERE id_categorie ORDER BY categorie.libelle DESC");
  try{
    $stmt->execute();
  } catch (PDOException $e){
    echo 'Erreur lors de l\'exécution de la requête : '. $e->getMessage(); 
  }
  $result=$stmt->fetchAll();
  return $result;
}
$result = touslesPlats();
?>