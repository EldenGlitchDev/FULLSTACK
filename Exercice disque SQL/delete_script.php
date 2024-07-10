<?php 
    require_once('header.php');

if($_POST['suppression'] == 'Taper "Confirmer" pour valider la suppression du disque'){
    $stmt = $dbh->prepare('DELETE FROM disc WHERE disc_id = :id');
    $stmt->bindValue(':id', $_POST['delete']);
    $stmt->execute();
    header('Location: index.php');
}
else{
    header('Location: index.php');
}

?>