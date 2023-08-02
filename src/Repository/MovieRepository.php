<?php 

namespace App\Repository; 

use App\Service\PDOService; 



class MovieRepository
{

    private PDOService $pdoService;

    public function __construct()
    {
        $this->pdoService = new PDOService();
    }

//array de movie si en objet
public function findAll():array
{
    $query = $this->pdoService->getPdo()->query('SELECT * FROM movie');
    return $query->fetchAll(\PDO::FETCH_ASSOC);
}
    public function addMovie(array $array)
    {


        $query = $this->pdoService->getPdo()->prepare(
            "INSERT INTO movie(title, release_date) VALUES (:title, :releaseDate)"
        );

        $query->bindParam(':title', $array['title']);
        $query->bindParam(':releaseDate', $array['releaseDate']);

        $query->execute();
    }
}