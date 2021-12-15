<?php
include 'header.php';
if(isset($_GET['id']) && !empty($_GET['id']) && is_int(intval($_GET['id']))){
    $artist = (new ArtistRepository())->getOneArtist($_GET['id']);
    if(!is_null($artist)){
        $songs = (new SongRepository())->getAllSongByArtist($artist->getId());
    }
}else{
    $artist = null;
    $songs = null;
}
?>

<div class="container my-5">
    <h1 class="text-center mb-3">Page de profil Artiste</h1>
    <?php
    if(!is_null($artist)){
    ?>
    <h2>Artiste: </h2>
    <table class="table table-dark table-striped table-hover text-center">
        <tbody>
        <tr>
            <th>Id</th>
            <td><?php echo $artist->getId() ?></td>
        </tr>
        <tr>
            <th>Full Name</th>
            <td><?php echo $artist->getName() ?></td>
        </tr>
        <tr>
            <th>Age</th>
            <td><?php echo $artist->getAge() ?></td>
        </tr>
        </tbody>
    </table>
    <div class="btn-group mb-3">
        <a href="addArtist.php?id=<?php echo $artist->getId() ?>" class="btn btn-info">Edit</a>
    </div>
        <h2>Musiques: </h2>
        <?php
        if(!is_null($songs)){
            ?>
            <table class="table table-dark table-hover table-striped text-center my-4">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title Song</th>
                        <th>Duration</th>
                        <th>Published At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach ($songs as $song){
                ?>
                    <tr>
                        <td><?php echo $song->getId(); ?></td>
                        <td><?php echo $song->getTitle(); ?></td>
                        <td><?php echo $song->getTime(); ?></td>
                        <td><?php echo $song->getPublishedAt()->format('d-m-Y'); ?></td>
                        <td>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal<?php echo $song->getId() ?>">
                                Delete
                            </button>
                        </td>
                    </tr>
                    <div class="modal fade" id="modal<?php echo $song->getId() ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Supprimer la musique <?php echo $song->getTitle() ?> ?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Êtes vous sûr de vouloir supprimer cette musique?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <a class="btn btn-danger" href="deleteSong.php?idSong=<?php echo $song->getId() ?>&idArtist=<?php echo $artist->getId() ?>">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    }
                ?>
                </tbody>
            </table>
            <?php
        }else{
            ?>
                <div class="text-center bg-dark text-light p-3 rounded my-4">Cet artiste ne possede aucune musique</div>
            <?php
        }
        ?>
        <a href="addSong.php?idArtist=<?php echo $artist->getId() ?>" class="btn btn-info">Ajouter une musique</a>

    <?php
    }else{
        header('Location: index.php');
    }
    ?>
    <?php

    ?>
</div>

<?php
include "footer.php";
