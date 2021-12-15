<?php
include "functions/isArtistFormValid.php";
include "Repository/ArtistRepository.php";

if(isset($_POST['name'], $_POST['age'], $_POST['id'])){
    $age = $_POST['age'];
    $name = $_POST['name'];
    $id = $_POST['id'];

    if(isValid($name, $age, $id)){
        (new ArtistRepository())->updateOneArtiste($id, $name, $age);
        header('location: index.php');
        exit();
    }
    header('location: index.php?updateError');
}
header('location: index.php?updateError');