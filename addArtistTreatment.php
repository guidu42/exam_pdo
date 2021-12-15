<?php
include "functions/isArtistFormValid.php";
include "Repository/ArtistRepository.php";

if(isset($_POST['name'], $_POST['age'])){
    $age = $_POST['age'];
    $name = $_POST['name'];

    if(isValid($name, $age)){
        (new ArtistRepository())->createOneArtist($name, $age);
        header('location: index.php');
        exit();
    }
    header('location: index.php?creationError');
}

header('location: index.php?creationError');
