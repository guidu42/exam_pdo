<?php
include 'header.php';

if(isset($_GET['id']) && preg_match('/[0-9]+/', $_GET['id']) == 1){
    $artist = (new ArtistRepository())->getOneArtist($_GET['id']);
    if(is_null($artist)){
        $artist = new Artist();
    }
}else{
    $artist = new Artist();
}

?>

<div class="container my-5">
    <?php
    if(is_null($artist->getId())){
        ?>
        <h1 class="text-center mb-3">Ajouter un nouvel artiste</h1>
        <?php
    }else{
        ?>
        <h1 class="text-center mb-3">Modifier les informations de <?php echo $artist->getName() ?></h1>
        <?php
    }
    ?>
    <h1></h1>
    <form method="post"
            <?php
              if (is_null($artist->getId())){
            ?>
                  action="addArtistTreatment.php">
            <?php
             }else{
            ?>
                action="modifyArtistTreatment.php">
            <?php
             }
              ?>
        <div class="mb-3">
            <label for="name" class="form-label">Artist full Name</label>
            <input type="text" class="form-control" id="name" name="name" required minlength="1" value="<?php echo $artist->getName() ?>">
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Artiste age</label>
            <input type="number" class="form-control" id="age" name="age" required min="1" max="150" value="<?php echo $artist->getAge() ?>">
        </div>
        <?php
        if (is_null($artist->getId())){
            ?>
            <button type="submit" class="btn btn-primary">Ajouter</button>
            <?php
        }else{
            ?>
                <div>
                    <input type="hidden" id="id" name="id" value="<?php echo $artist->getId() ?>">
                </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
            <?php
        }
        ?>
    </form>
</div>

<?php
include "footer.php";
