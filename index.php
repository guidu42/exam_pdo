<?php
include 'header.php';

$artists = (new ArtistRepository())->getAllArtist();

?>
<div class="container my-5">
    <a href="addArtist.php" class="btn btn-outline-dark mt-3">Ajouter un Artiste</a>
    <table class="table table-striped table-dark table-hover text-center mt-3">
        <thead>
        <tr>
            <th>Id</th>
            <th>Artist Name</th>
            <th>Artist Age</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($artists as $artist){
            ?>
            <tr>
                <td class="align-middle"><?php echo $artist->getId() ?></td>
                <td class="align-middle"><?php echo $artist->getName() ?></td>
                <td class="align-middle"><?php echo $artist->getAge() ?></td>
                <td class="w-25 align-middle">
                    <div class="btn-group">
                        <a href="artistDetails.php?id=<?php echo $artist->getId()?>" class="btn btn-success">Voir</a>
                        <a href="addArtist.php?id=<?php echo $artist->getId() ?>" class="btn btn-info">Edit</a>
                        <a href="addSong.php?idArtist=<?php echo $artist->getId() ?>" class="btn btn-outline-light">Add Song</a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal<?php echo $artist->getId() ?>">
                            Delete
                        </button>
                    </div>
                </td>
            </tr>
            <div class="modal fade" id="modal<?php echo $artist->getId() ?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Supprimer: <?php echo $artist->getName() ?> ?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Êtes vous sûr de vouloir supprimer cette artiste?<br> Toutes les musiques liés à cette artiste seront également supprimées.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <a class="btn btn-danger" href="deleteArtist.php?idArtist=<?php echo $artist->getId() ?>">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>




<?php
include 'footer.php';
