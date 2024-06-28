<?php
    $db = new PDO('mysql:host=localhost;charset=utf8;dbname=record', 'admin', 'Afpa1234');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $requete = $db->prepare("select * from disc where disc_id=?");
    $requete->execute(array($_GET["disc_id"]));
    $disc = $requete->fetch(PDO::FETCH_OBJ);
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method=get><input type=text name=disc_id></form>

<?php
if(!$disc){
    echo "Disque non trouvé";
}
else{
    echo "Disc N°" . $disc->disc_id . "<br>";
    
    echo "Disc name" . $disc->disc_title . "<br>";
    
    echo "Disc year" . $disc->disc_year . "<br>";
    
    echo "Disc price" . $disc->disc_price . "<br>";
    
    echo "Disc artist" . $disc->artist_id . "<br>";
    
    echo "Disc label" . $disc->disc_label . "<br>";
    
    echo "Disc genre" . $disc->disc_genre . "<br>";
    
    echo "Disc image" . $disc->disc_picture . "<br>";
}
?>


</body>
</html>