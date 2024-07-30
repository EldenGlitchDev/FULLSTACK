  <?php
    require_once('header.php')
  ?>

<?php
  require_once('DAO.php');
  $result=indexTouteslesCategories();
?>

  <div class="container">
<div class="parallax col-14 col-sm-12">


<div class="container">
  <div class="row">

<div class="backgroundTitle mb-3">
<h1>Les catégories</h1>
</div>

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

<div class="container">
          <div class="row">

<div class="backgroundTitle mb-3 mt-5">
<h1>Les plats les plus vendus</h1>
</div>

        <?php
  require_once('DAO.php');
  $result=indexPlatslesplusVendus();
?>

       <?php
       $i=0;
        foreach($result as $row){
          echo '<div class="col-sm-12 col-lg-4">
              <a href="commande.php?comm='.$row['id'].'">
                <img src="assets/img/food/'.$row['image'].'"class="animeimage posImage" alt="'.$row['libelle'].'">
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
        </div>

  </div>
</div>

<br>

</div>
</div>





<?php
    require_once('footer.php')
?>

  

    
