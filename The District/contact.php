<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/contact.css">
    <link rel="shortcut icon" href="assets/img/the_district_brand/favicon.png">
</head>
<body>
    
    <div class="container">

    <?php
    require_once('header.php')
  ?>
  
        <div class="container-fluid">
        <div class="row">
          <img src="assets/img/bg1.jpeg" alt="bandereau" title="bandereau" id="image" class="col-6">
          </div>
          </div>

        <section class="container" id="background-img"><br>
    
    
    <br><br><br><br><br><br>
    
    <div class="container">
        <form id="formulaire" action="scriptformulairecontact.php" method="post">
        <div class="row">
      <div class="mb-3 col-6">
        <label for="NometPrenom" class="form-label" id="NometPrenomCSS">Nom</label>
        <input type="text" name="nom" class="form-control" id="NomJS">
    <p id="couleurtxt">Ce champ est obligatoire</p>
      </div>
      <div class="mb-3 col-6">
        <label for="NometPrenom" class="form-label" id="NometPrenomCSS">Prénom</label>
        <input type="text" name="prenom" class="form-control" id="PrenomJS">
      </div>
      <div class="mb-3 col-6">
        <label for="email" class="form-label" id="emailCSS">Email</label>
        <input type="email" name="email" class="form-control" id="emailJS">
    <p id="couleurtxt">Ce champ est obligatoire</p>
      </div>
      <div class="mb-3 col-6">
        <label for="telephone" class="form-label" id="telephoneCSS">Téléphone</label>
        <input type="text" name="telephone" class="form-control" id="telephoneJS">
    <p id="couleurtxt">Ce champ est obligatoire</p>
      </div>
      <div class="mb-3">
        <label for="votreadresse" class="form-label" id="votreadresseCSS">Votre demande</label>
        <textarea class="form-control" name="votreadresse" rows="3" id="votreadresseJS"></textarea>
    <p id="couleurtxt">Ce champ est obligatoire</p>    
      </div>
    </div>
    </div>
    
    
    
    
    <div class="container">
      <div class="row justify-content-end">
      <button type="submit" class="btn btn-primary col-3">Envoyer</button>
    </div>
    </div>
    </form>
    
    <br>
    
    </section>
            
        <br>
    
        <?php
    require_once('footer.php')
?>

        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="assets/js/contact.js"></script> 
  </body>
    </html>