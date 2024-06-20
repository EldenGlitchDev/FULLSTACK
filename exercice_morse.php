<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Morse</title>
</head>
<body>
    <form method="post">
        <label for="nomme">Saisissez un mot.</label>
        <input type="textarea" name="textarea"/>
    </form>

<?php

// Récupère la chaîne d'entrée à partir de la requête POST
$string = $_POST['textarea'];


    
// Création de la fonction stringToMorse    
    function stringToMorse($string){
        $tab=array(
            "A"=>".-",
            "B"=>"-...",
            "C"=>"-.-.",
            "D"=>"-..",
            "E"=>".",
            "F"=>"..-.",
            "G"=>"--.",
            "H"=>"....",
            "I"=>"..",
            "J"=>".---",
            "K"=>"-.-",
            "L"=>".-..",
            "M"=>"--",
            "N"=>"-.",
            "O"=>"---",
            "P"=>".--.",
            "Q"=>"--.-",
            "R"=>".-.",
            "S"=>"...",
            "T"=>"-",
            "U"=>"..-",
            "V"=>"...-",
            "W"=>".--",
            "X"=>"-..-",
            "Y"=>"-.--",
            "Z"=>"--..",
            "0"=>"-----",
            "1"=>".----",
            "2"=>"..---",
            "3"=>"...--",
            "4"=>"....-",
            "5"=>".....",
            "6"=>"-....",
            "7"=>"--...",
            "8"=>"---..",
            "9"=>"----.",
        );

    
/* Affichage du tableau avec le foreach
    foreach($tab as $key => $value){
        echo $key ." : " .$value."<br>";
    };*/
    

// Etablissement de la règle pour les caractères non définis
$reg= "/[a-zA-Z0-9]/i";
$traducphrase='';
// Boucle pour compter les caractères
$i=0;
while($i!=strlen($string)){ //calcule la taille d'une chaine
    $N=strtoupper(substr($string,$i,1));  //mettre les lettres en majuscules, recherche le code morse du caractère dans le tableau $tab
    $traducphrase=$traducphrase.$tab[$N]; //concaténation
    echo substr($string,$i,1). '=>'.$tab[$N].'<br>'; //affiche le caractère actuel et son code morse correspondant
    $i++; //incrémentation compteur
}

// affiche la chaine d'entrée et son code morse correspondant
echo '<br>'.$string.' :traduit en morse : '.$traducphrase;
};
// Appel de la faction
stringToMorse($string);


?>

</body>
</html>