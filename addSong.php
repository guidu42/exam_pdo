<?php
include "header.php";

if(isset($_GET['idArtist']) && !empty($_GET['idArtist']) && is_int(intval($_GET['idArtist']))){
    $artist = (new ArtistRepository())->getOneArtist($_GET['idArtist']);
    if(is_null($artist)){
        header('Location: index.php');
    }else{
    ?>
    <div class="container my-5">
        <h1 class="text-center mb-3">Ajouter une musique pour <?php echo $artist->getName() ?></h1>
        <form action="addSongTreatment.php" method="post">
            <div>
                <input type="hidden" class="form-control" name="artistId" required min="0" value="<?php echo $artist->getId() ?>">
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Song Title</label>
                <input type="text" class="form-control" id="title" name="title" required minlength="1">
            </div>
            <div class="mb-3">
                <label for="time" class="form-label">Song time</label>
                <input type="number" class="form-control" id="time" name="time" required min="1">
            </div>
            <div class="mb-3">
                <label for="publishedAt" class="form-label">Song release Date</label>
                <input type="date" class="form-control" id="publishedAt" name="publishedAt" required>
            </div>
            <button type="submit" class="btn btn-success">Ajouter</button>
        </form>
    </div>

    <?php
    }
}

include "footer.php";
