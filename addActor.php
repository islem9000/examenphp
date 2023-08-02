<?php

include_once __DIR__ . '/vendor/autoload.php';

use App\Models\Actor;
use App\Repository\ActorRepository;


if (isset($_POST['first-name']) && isset($_POST['last-name'])) {
    $firstName = $_POST['first-name'];
    $lastName = $_POST['last-name'];
    var_dump($lastName);
    $actorRepository = new ActorRepository();
    $actorRepository->addActor([
        'first_name' => $firstName,
        'last_name' => $lastName
    ]);
    header('location:index.php');
}
