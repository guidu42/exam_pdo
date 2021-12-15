<?php
include "Entity/Artist.php";
include "Repository/SongRepository.php";
include "Repository/ArtistRepository.php";

if(isset($_GET['idSong'], $_GET['idArtist']) && is_int(intval($_GET['idSong'])) && is_int(intval($_GET['idArtist']))){
    (new SongRepository())->deleteOneSong($_GET['idSong']);

    if(!is_null((new ArtistRepository())->getOneArtist($_GET['idArtist']))){
        header('Location: artistDetails.php?id=' . $_GET['idArtist']);
        exit();
    }
    header('Location: index.php');
}

header('Location: index.php');