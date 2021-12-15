<?php
include "Entity/Artist.php";
include "Repository/SongRepository.php";
include "Repository/ArtistRepository.php";

if(isset($_GET['idSong'], $_GET['idArtist'])  && preg_match('/[0-9]+/', $_GET['idSong']) == 1  && preg_match('/[0-9]+/', $_GET['idArtist']) == 1){
    (new SongRepository())->deleteOneSong($_GET['idSong']);

    if(!is_null((new ArtistRepository())->getOneArtist($_GET['idArtist']))){
        header('Location: artistDetails.php?id=' . $_GET['idArtist']);
        exit();
    }
    header('Location: index.php');
}

header('Location: index.php');