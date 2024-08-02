<?php
  require_once('header.php');
  require_once('DAO.php');
  require_once('phpmailer.php');


$total=$stmt['prix'] * $_REQUEST['quantite']; // peut être problème ici pour le total des produits en euros

$information_commande="\nnom et prénom :".$_REQUEST['NometPrenom'].", email :".$_REQUEST['email'].", téléphone :".$_REQUEST['telephone'].", votre adresse :".$_REQUEST['votreadresse'];

mailCommande($_REQUEST['votreadresse'],$_REQUEST['email'],$total,$_REQUEST['quantite'],$_REQUEST['NometPrenom'],$stmt['libelle']);

//Ouverture en écriture seule (impossible d'écrire sur le fichier .txt)
$txt=fopen("AAAA-MM-JJ-HH-MM-SS.txt", "a");

//Ecriture du contenu
fputs($txt, $information_commande);

//Fermeture du fichier
fclose($txt);
?>
<!-- Ajouter un tag meta pour rediriger vers index.php après 30 secondes -->
<meta http-equiv="refresh" content="2; URL=index.php">

<?php
  require_once('footer.php')
?>