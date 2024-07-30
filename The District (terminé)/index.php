  <?php
  require_once('header.php')
  ?>

  <?php
  require_once('DAO.php');
  $result = indexTouteslesCategories();
  ?>

  <div class="container">
    <div class="parallax col-14 col-sm-12">


      <div class="container">
        <div class="row">

          <div class="backgroundTitle mb-3">
            <h1>Les catégories</h1>
          </div>

          <?php
          require_once('DAO.php');
          indexTouteslesCategoriesForeach($result);
          ?>

          <div class="container">
            <div class="row">

              <div class="backgroundTitle mb-3 mt-5">
                <h1>Les plats les plus vendus</h1>
              </div>

              <?php
              require_once('DAO.php');
              $result = indexPlatslesplusVendus();
              ?>

              <?php
              require_once('DAO.php');
              indexPlatslesplusVendusForeach($result);
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