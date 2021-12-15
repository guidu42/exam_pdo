<?php
include "header.php";

if(isset($_POST['search']) && $_POST['search'] != ''){
    $songs = (new SongRepository())->getSongBySearch($_POST['search']);
}else{
    $songs = (new SongRepository())->getAllSong();
}
?>

<div class="container my-5">
    <form class="d-flex my-2" method="post" action="allSongs.php">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    <?php
    if(!is_null($songs)){
        ?>
        <table class="table table-dark table-hover table-striped text-center my-4">
            <thead>
            <tr>
                <th>Id</th>
                <th>Artist Id</th>
                <th>Title Song</th>
                <th>Duration</th>
                <th>Published At</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($songs as $song){
                ?>
                <tr>
                    <td class="align-middle"><?php echo $song->getId(); ?></td>
                    <td class="align-middle"><a href="artistDetails.php?id=<?php echo $song->getArtistId(); ?>" class="btn btn-primary px-5"><?php echo $song->getArtistId(); ?></a></td>
                    <td class="align-middle"><?php echo $song->getTitle(); ?></td>
                    <td class="align-middle"><?php echo $song->getTime(); ?></td>
                    <td class="align-middle"><?php echo $song->getPublishedAt()->format('d-m-Y'); ?></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <?php
    }else{

    }
    ?>
</div>

<?php
include "footer.php";
