<?php 

    require_once('header.php');

if(isset($FILES['ajoutimage'])){

    //appel des variables

    $file=$files['ajoutimage'];
    $tmp_name=$file['tmp_name'];
    $size=$file['size'];
    $name=$file['name'];
    $type=$file['type'];
    
    //vérification type de fichiers

    if($type!='image/jpg'&& $type!='image/png'){
        echo 'Format incorrect';
        exit;
    }

    /*Récupère les dimensions de l'image
    $image_path='path/to/image.jpg'; // OU img.jpg???
    $image_size=getimagesize($image_path); //récupère les dimensions d'une image

    //Définir la taille maximale autorisée (en pixels)
    $max_width=1024;
    $max_height=1024;*/

    //Vérifie si l'image dépasse la taille maximale en pixels

    /*if($image_size[0] > $max_width || $image_size[1] > $max_height){
        echo "Image trop grande. La taille maximale autorisée est de $max_width x $max_height pixels";
    }
    else{
        echo "L'image est dans la bonne taille";
    } //getimagesize() renvoie un tableau contenant les dimensions de l'image, où $image_size[0] est la largeur et $image_size[1] est la hauteur.*/

    //Vérifie la taille de l'image en octet

    if ($size > 1024 * 1024) { // 1Mo
        echo 'Erreur : le fichier est trop volumineux.';
        exit;
    }

    /*$image_path="path/to/image.jpg"; // OU img.jpg???
    $image_size_bytes=filesize($image_path); //récupère taille de l'image en octet
    $max_size_bytes=1024*1024; //1Mo

    //Vérifie si l'image ne dépasse pas la taille en octet
    if($image_size_bytes>$max_size_bytes){
        echo "Image trop grande. La taille maximale autorisée est de $max_size_bytes";
    }
    else{
        echo "L'image est dans la bonne taille";
    }*/


    //définition du chemin de destination sécurisée (ça met un nom de chemin unique)

    $img_path=uniqid() . '_' . $name;
    $destination='img/' . $image_path;

    //déplacement du fichier uploadé

    if(move_uploaded_file($tmp_name, $destination)){
        echo "L'image a été téléchargé avec succès";
    }
    else{
        echo "Erreur lors du téléchargement de l'image";
    }
}

$name=$_POST['ajoutartiste'];

//INSERT un nom d'artiste s'il n'existe pas dans la base de donnée

$stmt=$dbh->prepare("INSERT INTO artist (artist_name) SELECT (:artist) WHERE NOT EXISTS (SELECT * FROM artist WHERE artist_name=:artist;");//ne peut pas mettre values quand il y a un where
$stmt->blindValue(':artist', $name);
$stmt->execute();

/*$stmt = $dbh->prepare("INSERT INTO artist (artist_name) VALUES (:artist) WHERE NOT EXISTS (SELECT 1 FROM artist WHERE artist_name = :artist)");
$stmt->bindValue(':artist', $name);
$stmt->execute();*/ //A tester si les 3 lignes du dessus ne fonctionnent pas, problème entre le SELECT et le VALUE

//recupère un id de l'artiste pour pouvoir le réutiliser après dans insert de disc

$stmt=$dbh->prepare("SELECT * FROM artist WHERE artist_name = :artist");
$stmt->bindValue(':artist', $name);
$stmt->execute();

//stock de l'id de l'artiste

$artist_id=$stock->fetch()['artist_id'];

//regarde si les données correspond à un disc déjà rentré

$stmt=$dbh->prepare("SELECT * FROM disc WHERE EXISTS (SELECT * FROM disc WHERE disc_title = :title AND disc_year = :year)");
$stmt->bindValue(':title', $_POST['ajouttitre']);
$stmt->bindValue(':year', $_POST['ajoutannee']);
$stmt->execute();
$disc_id=$stmt->fetch()['disc_id'];
echo $disc_id;

//fait l'insert si le disc n'a pas était trouvé 
if($disc_id==null){
$stmt=$dbh->prepare("INSERT INTO disc(disc_title, disc_year, disc_picture, disc_label, disc_genre, disc_price, artist_id) VALUES (:title, :year, :picture, :label, :genre, :prix, :artist_id);");
$stmt->bindValue(':title', $_POST['ajouttitre']);
$stmt->bindValue(':year', $_POST['ajoutannee']);
$stmt->bindParam(':picture', $img_path);
$stmt->bindValue(':label', $_POST['ajoutlabel']);
$stmt->bindValue(':genre', $_POST['ajoutgenre']);
$stmt->bindValue(':prix', $_POST['ajoutprix']);
$stmt->bindParam(':artist_id', $artist_id);
$stmt->execute();
}
header('Location:index.php'); //redirection à la page index










?>