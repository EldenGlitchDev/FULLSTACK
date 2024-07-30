  <?php
  require_once('header.php');
  ?>

  <br>

  <?php
  require_once('DAO.php');
  $result = touslesPlats();
  ?>

  <div class="container">
    <div class="row justify-content-center g-0">

      <?php
      require_once('DAO.php');
      touslesPlatsForeach($result)
      ?>

      <?php
      require_once('boutonsSuivPrec.php');
      ?>

    </div>

    <?php
    require_once('footer.php');
    ?>