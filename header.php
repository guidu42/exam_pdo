<?php
include "functions/isArtistFormValid.php";
include "Entity/Artist.php";
include "Entity/Song.php";
include "Repository/ArtistRepository.php";
include "Repository/SongRepository.php";
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="assets/styles.css" type="text/css" rel="stylesheet">
    <title>exam_pdo</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Spotiguy</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav me-0 mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/index.php">All Artists</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/allSongs.php">All Songs</a>
                </li>

            </ul>
        </div>
    </div>
</nav>