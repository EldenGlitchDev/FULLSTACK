<?php
require_once('header.php')
?>
<div class="container">
  <br>

  <div class="row">

    <?php
    require_once('DAO.php');
    $result = categorie();
    ?>

    <?php
    require_once('DAO.php');
    categorieForeach($result)
    ?>

  </div>

  <?php
  require_once('boutonsSuivPrec.php')
  ?>

</div>

<?php
require_once('footer.php')
?>