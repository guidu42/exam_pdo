<?php
include "Entity/Artist.php";
include "Entity/Song.php";
include "Repository/ArtistRepository.php";
include "Repository/SongRepository.php";

if(isset($_GET['idArtist']) && preg_match('/[0-9]+/', $_GET['idArtist']) == 1){
    $artist = (new ArtistRepository())->getOneArtist($_GET['idArtist']);
    if(!is_null($artist)){
        $songs = (new SongRepository())->getAllSongByArtist($artist->getId());
        if(!is_null($songs)){
            foreach ($songs as $song){
                (new SongRepository()) ->deleteOneSong($song->getId());
            }
        }
        (new ArtistRepository())->deleteOneArtist($artist->getId());
        header('Location: index.php');
        exit();
    }
    header('Location: index.php');
    exit();
}
header('Location: index.php');
exit();
