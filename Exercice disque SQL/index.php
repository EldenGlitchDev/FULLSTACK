<!DOCTYPE html>
<?php 
    require_once('header.php');
?>

<body>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-6 fs-3">Liste des disques</div><button type="button" class="btn btn-primary col-5" style="max-width: 240px" onclick='window.location="add_script.php"'>Ajouter</button>
        </div>

        <form method='GET' action='details.php' class='mt-3 row justify-content-center'>

        <?php
        //recupère tous les disc dans la base de données
            $stmt=$conn->prepare("SELECT * FROM disc d LEFT JOIN artist a ON d.artist_id = a.artist_id");
            $stmt->execute();
            $result=$stmt->fetchAll();

        //affichage des disc dans une card bootstrap
        foreach($result as $row){
            echo '<div class="card mb-3 col-5" id="'.$row['disc.id'].'" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="img/'.$row['disc_picture'].'" class="img-fluid rounded-start" alt="'.$row['disc_title'].'">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h3 class="card-title">'.$row['disc_title'].'</h3>
        <h5 class="card-text">'.$row['artist_name'].'</h5>
        <p class="card-text">Label : '.$row['disc_label'].'</p>
        <p class="card-text">Année : '.$row['disc_year'].'</p>
        <p class="card-text">Genre : '.$row['disc_genre'].'</p>
        <button type="button" class="btn btn-primary">Détails</button>
      </div>
    </div>
  </div>
</div>';
        }
  ?>
  </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>