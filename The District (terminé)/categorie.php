<?php
require_once('header.php')
?>
<div class="container">
  <br>

  <div class="row">

<?php
  require_once('DAO.php');
  $result=categorie();
?>

<?php
  $i=0;
        foreach($result as $row){
            echo '<div class="col-sm-12 col-lg-4">
              <a href="platsparcategorie.php?catplat='.$row['id'].'">
                <img src="assets/img/category/'.$row['image'].'"class="animeimage posImage" alt="'.$row['libelle'].'">
                <div class="row justify-content-center">
                <p class="pCouleurtxt col-7">'.$row['libelle'].'</p>
                </div>
                <div class="card-body">
                </div>
              </a>
              </div>';
              $i++;
              if($i==6){
                break;
        }
      }
?>

</div>

  <?php
  require_once('boutonsSuivPrec.php')
  ?>

</div>

<?php
require_once('footer.php')
?>