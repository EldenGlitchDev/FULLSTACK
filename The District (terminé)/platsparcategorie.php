<?php
require_once('header.php')
?>

<div class="container">

  <br>

  <div class="container mt-3">
    <div class="row justify-content-center">

      <?php /* $categoryName se trouve dans cette fonction */
      require_once('DAO.php');
      $result = platsParCategorieTitre();
      ?>

      <div class="container">
        <div class="row justify-content-start titreconteneur">
          <div class="col-6 col-lg-1 mb-5" id="titre">
            <h3><?php echo $categoryName; ?></h3>
          </div>
        </div>
      </div>

      <?php
      require_once('DAO.php');
      $result = platsParCategorieCorps();
      ?>

      <?php
      require_once('DAO.php');
      platsParCategorieCorpsForeach($result);
      ?>

    </div>
  </div>

  <?php
  require_once('boutonsSuivPrec.php')
  ?>

</div>

<br><br>

<?php
require_once('footer.php')
?>