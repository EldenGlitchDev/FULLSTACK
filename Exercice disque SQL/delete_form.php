<!DOCTYPE html>
<?php 
    require_once('header.php');

    $stmt=$dbh->prepare("SELECT * FROM disc d LEFT JOIN artist a ON d.artist_id = a.artist_id WHERE disc_id=?");
            $stmt->execute(array($_GET['delete']));
            $result=$stmt->fetch();
?>

<div class='container'>
                <div class='row justify-content-center'>
                    <img src="img/<?php echo $result['disc_picture'];?>" class="img-fluid rounded-start col-6">
                    <div class="col-6">
                        <h2 class='text-white'><?php echo $result['disc_title'];?></h2>
                        <p class='text-white'>Artist : <?php echo $result['artist_name'];?></p>
                        <p class='text-white'>Label : <?php echo $result['disc_label'];?></p>
                        <p class='text-white'>Year : <?php echo $result['disc_year'];?></p>
                        <p class='text-white'>Genre : <?php echo $result['disc_genre'];?></p>
                        <p class='text-white'>Prix : <?php echo $result['disc_price'];?></p>
                    </div>

                    <form action='delete_script.php' method='POST' class='row justify-content-center'>

<label class='mt-2 text-white' for='SUPP'>Supprimer</label><br><input type='text' class='mt-2' id='delete' name='delete' required><br>
<button type='submit' name='delete' value='<?php echo $_GET['delete']; ?>' class='btn btn-primary mt-2'>Suppresion</button>

</form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>