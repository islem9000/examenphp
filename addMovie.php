<?php

include_once __DIR__ . '/vendor/autoload.php';

use App\Models\Movie;
use App\Repository\MovieRepository;

var_dump($_POST);
$movieRepository = new MovieRepository();

if (isset($_POST['title']) && isset($_POST['releaseDate'])) {
    $title = $_POST['title'];
    $date = $_POST['releaseDate'];
    $movieRepository->addMovie([
        "title" => $title,
        "releaseDate" => $date
    ]);
}

header('location:index.php');
exit;