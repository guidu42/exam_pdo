<?php

class ArtistRepository
{

    private ?PDO $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=exam_pdo', 'root', '');
        }catch(Exception $e){
            $this->pdo = null;
        }
    }

    public function getAllArtist(): ?array
    {
        if(!is_null($this->pdo)){
            $query = 'SELECT * FROM `artist`';
            $response = $this->pdo->prepare($query);
            $response->execute();
            $response = $response->fetchAll(PDO::FETCH_ASSOC);
            $artists = [];
            foreach ($response as $row) {
                $artists[] = (new Artist())->hydrate($row);
            }
            return $artists;
        }
        return null;
    }

    public function getOneArtist(int $id): ?Artist
    {
        if(!is_null($this->pdo)){
            $query = 'SELECT * FROM `artist` WHERE id = :id';
            $response = $this->pdo->prepare($query);
            $response->execute([
                ':id' => $id,
            ]);
            if($response->rowCount()>0){
                $response = $response->fetch(PDO::FETCH_ASSOC);
                return (new Artist())->hydrate($response);
            }
            return null;
        }
        return null;
    }

    public function createOneArtist(string $name, int $age): void
    {
        if(!is_null($this->pdo)){
            $query = 'INSERT INTO `artist`(`name`, `age`) VALUES (:name, :age)';
            $response = $this->pdo->prepare($query);
            $response->execute([
                ':name' => $name,
                ':age' => $age
            ]);
        }
    }

    public function updateOneArtiste(int $id, string $name, int $age): void
    {
        if(!is_null($this->pdo)){
            $query = 'UPDATE `artist` SET `age` = :age, `name` = :name WHERE `id` = :id';
            $response = $this->pdo->prepare($query);
            $response->execute([
               ':age' => $age,
               ':name' => $name,
               ':id' => $id
            ]);
        }
    }

    public function deleteOneArtist(int $id): void
    {
        if(!is_null($this->pdo)){
            $query = 'DELETE FROM `artist` WHERE `id` = :id';
            $response = $this->pdo->prepare($query);
            $response->execute([
                ':id' => $id,
            ]);
        }
    }

    public function getArtistBySearch(string $search)
    {
        if(!is_null($this->pdo)){
            $query = 'SELECT * FROM `artist` WHERE `name` LIKE :search';
            $response = $this->pdo->prepare($query);
            $response->execute([
                ':search' => '%' . $search . '%',
            ]);
            if($response->rowCount()>0){
                $response = $response->fetchAll(PDO::FETCH_ASSOC);
                $artists = [];
                foreach ($response as $row) {
                    $artists[] = (new Artist())->hydrate($row);
                }
                return $artists;
            }
            return null;
        }
        return null;
    }
}