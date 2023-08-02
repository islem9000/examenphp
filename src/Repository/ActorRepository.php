<?php 

namespace App\Repository; 

use App\Service\PDOService; 



class ActorRepository
{

    private PDOService $pdoService;

    public function __construct()
    {
        $this->pdoService = new PDOService();
    }

    
    //array d'Actor si en objet
    public function findAll():array
    {
        $query = $this->pdoService->getPdo()->query('SELECT * FROM actor');
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function addActor(array $array)
    {
        $query = $this->pdoService->getPdo()->prepare(
            "INSERT INTO actor(first_name, last_name) VALUES (:first_name, :last_name)" );
        
        $query->bindParam(':first_name', $array['first_name']);
        $query->bindParam(':last_name', $array['last_name']);

        $query->execute();
    }
}