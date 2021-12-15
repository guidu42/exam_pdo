<?php
include "functions/isSongFormValid.php";
include "Entity/Artist.php";
include "Repository/ArtistRepository.php";
include "Repository/SongRepository.php";

if(isset($_POST['artistId'], $_POST['title'], $_POST['time'], $_POST['publishedAt'])){
    $artistId = $_POST['artistId'];
    $title = $_POST['title'];
    $time = $_POST['time'];
    $publishedAt = $_POST['publishedAt'];

    $artist = (new ArtistRepository())->getOneArtist($artistId);
    if(!is_null($artist)){
        if(isValid($title, $time, $publishedAt)){
            $publishedAt = new DateTime($publishedAt);
            (new SongRepository())->createOneSong($artist->getId(), $title, $time, $publishedAt);
            header('Location: artistDetails.php?id=' . $artist->getId());
            exit();
        }
    }
}
header('Location: index.php');