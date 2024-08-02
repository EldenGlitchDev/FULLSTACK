<?php
  require_once('header.php');
  $_SESSION['comm'] = $_GET['comm'];
  ?>
  <div class="container">

    <div class="container" id="background-img"><br>
      <div class="row justify-content-center">

        <?php
        require_once('DAO.php');
        $result = commande();
        ?>

        <?php
        require_once('DAO.php');
        commandeForeach($result);
        ?>

      </div>

      <br><br>

      <div class="container">
        <form id="formulaire" action="scriptformulairecommandeMAIL.php" method="post">
          <div class="row">
            <div class="mb-3">
              <label for="NometPrenom" class="form-label coordonneesCSS">Nom et prénom</label>
              <input type="text" name="NometPrenom" class="form-control" id="NometPrenomJS">
              <p id="couleurtxt">Ce champ est obligatoire</p>
            </div>
            <div class="mb-3 col-6">
              <label for="email" class="form-label coordonneesCSS">Email</label>
              <input type="email" name="email" class="form-control" id="emailJS">
              <p id="couleurtxt">Ce champ est obligatoire</p>
            </div>
            <div class="mb-3 col-6">
              <label for="telephone" class="form-label coordonneesCSS">Téléphone</label>
              <input type="text" name="telephone" class="form-control" id="telephoneJS">
              <p id="couleurtxt">Ce champ est obligatoire</p>
            </div>
            <div class="mb-3">
              <label for="votreadresse" class="form-label coordonneesCSS">Votre adresse</label>
              <textarea class="form-control" name="votreadresse" rows="3" id="votreadresseJS"></textarea>
              <p id="couleurtxt">Ce champ est obligatoire</p>
            </div>
          </div>
      </div>

      <div class="container">
        <div class="row justify-content-end">
          <button class="btn btn-primary col-3" type="submit">Envoyer</button>
        </div>
      </div>
      </form>

      <br>

    </div>

  </div>

  <?php
  require_once('footer.php')
  ?>

  <script src="assets/js/commande.js"></script>
  </body>

  </html>