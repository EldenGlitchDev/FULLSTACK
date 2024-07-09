<?php 
    require_once('header.php');

// Récupération des valeurs des champs des formulaires

$nomartiste=$_POST['ajout_artiste'];
$nomtitre=$_POST['ajout_titre'];

// Vérification si un fichier est uploadé et différent de l'image actuelle

$stmt=$dbh->prepare("SELECT disc_picture FROM disc WHERE disc_title = :name OR disc_id = :id"); //:id pas en bleu ?
$stmt->bindParam(':name', $nomartiste);
$stmt->bindValue(':id', $_POST['modif']);
$stmt->execute();
$disc_picture=$stmt->fetch()['disc_picture'];


// Récupération de l'ID de l'artiste

$stock=$dbh->prepare("SELECT * artist WHERE artist_name = :artist");
$stock->bindValue(':artist', $nomartiste);
$stock->execute();
$artist_id=$stock->fetch()['artist_id'];


//Traitement de l'upload de fichier

if($_FILES['ajout_image']['name']!=NULL){
    $file=$_FILES['ajout_image'];
    $tmp_name=$file['tmp_name'];
    $name=$file['name'];
    $type=$file['type'];
    $size=$file['size'];

    echo $type;

//Récupère les dimensions de l'image
$image_path='path/to/image.jpg'; // OU img.jpg???
$image_size=getimagesize($image_path); //récupère les dimensions d'une image
//Définir la taille maximale autorisée (en pixels)
$max_width=1024;
$max_height=1024;
//Vérifie si l'image dépasse la taille maximale en pixels
if($image_size[0] > $max_width || $image_size[1] > $max_height){
    echo "Image trop grande. La taille maximale autorisée est de $max_width x $max_height pixels";
}
else{
    echo "L'image est dans la bonne taille";
} //getimagesize() renvoie un tableau contenant les dimensions de l'image, où $image_size[0] est la largeur et $image_size[1] est la hauteur.

//Vérifie la taille de l'image en octet
$image_path="path/to/image.jpg"; // OU img.jpg???
$image_size_bytes=filesize($image_path); //récupère taille de l'image en octet
$max_size_bytes=1024*1024; //1Mo
//Vérifie si l'image ne dépasse pas la taille en octet
if($image_size_bytes>$max_size_bytes){
    echo "Image trop grande. La taille maximale autorisée est de $max_size_bytes";
}
else{
    echo "L'image est dans la bonne taille";
}

//définition du chemin de destination sécurisée (ça met un nom de chemin unique)

$img_path=uniqid() . '_' . $name;
$destination='img/' . $image_path;


// Déplacement du fichier uploadé

if (move_uploaded_file($tmp_name, $destination)) {

    echo 'Fichier uploadé avec succès !';

} else {

    echo 'Erreur lors de l\'upload du fichier.';

    }

}

// Insertion de l'artiste dans la base de données

$stmt=$dbh->prepare("INSERT INTO artist (artist_name) SELECT (:artist) WHERE NOT EXISTS (SELECT * FROM artist WHERE artist_name = :artist);");
$stmt->bindValue(':artist', $nomartiste);
$stmt->execute();

// Remise de l'ancienne image s'il n'y en a pas de nouvelles

if($destination == NULL){
    $destination = $disc_picture;
}

// Mise à jour du disque dans la base de données

$stmt=$dbh->prepare("UPDATE disc SET disc_title = :title, disc_year = :year, artist_id = :artist_id, disc_picture = :picture, disc_label = :label, disc_genre = :genre, disc_price = :prix WHERE disc_id = :id");

$stmt->bindValue(':id', $_POST['modif']);
$stmt->bindValue(':title', $_POST['ajout_titre']);
$stmt->bindValue(':year', $_POST['ajout_annee']);
$stmt->bindValue(':prix', $_POST['ajout_prix']);
$stmt->bindValue(':picture', $img_path);
$stmt->bindValue(':label', $_POST['ajout_label']);
$stmt->bindValue(':genre', $_POST['ajout_genre']);
$stmt->bindValue(':artiste_id', $artist_id);

// Affichage d'un message d'erreur s'il y a un problème

try {

    $stmt->execute();

} catch (PDOException $e) {

    echo 'Erreur lors de l\'exécution de la requête : ' . $e->getMessage();

}
    header('Location:index.php'); // redirection à la page index

?>

