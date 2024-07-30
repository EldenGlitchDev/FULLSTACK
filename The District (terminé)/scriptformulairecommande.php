<?php

session_start();

$information_commande="\nnom et prénom :".$_REQUEST['NometPrenom'].", email :".$_REQUEST['email'].", téléphone :".$_REQUEST['telephone'].", votre adresse :".$_REQUEST['votreadresse'];

//Ouverture en écriture seule (impossible d'écrire sur le fichier .txt)
$txt=fopen("AAAA-MM-JJ-HH-MM-SS.txt", "a");

//Ecriture du contenu
fputs($txt, $information_commande);

//Fermeture du fichier
fclose($txt);

?>