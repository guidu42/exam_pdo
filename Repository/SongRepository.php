<?php

class SongRepository
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

    public function getAllSong(): ?array
    {
        if(!is_null($this->pdo)){
            $query = 'SELECT * FROM `song`';
            $response = $this->pdo->prepare($query);
            $response->execute();
            if($response->rowCount()>0){
                $response = $response->fetchAll(PDO::FETCH_ASSOC);
                $songs = [];
                foreach ($response as $row) {
                    $songs[] = (new Song())->hydrate($row);
                }
                return $songs;
            }
            return null;
        }
        return null;
    }

    public function getSongBySearch(string $search): ?array
    {
        if(!is_null($this->pdo)){
            $query = 'SELECT * FROM `song` WHERE `title` LIKE :search';
            $response = $this->pdo->prepare($query);
            $response->execute([
                ':search' => '%' . $search . '%',
            ]);
            if($response->rowCount()>0){
                $response = $response->fetchAll(PDO::FETCH_ASSOC);
                $songs = [];
                foreach ($response as $row) {
                    $songs[] = (new Song())->hydrate($row);
                }
                return $songs;
            }
            return null;
        }
        return null;
    }

    public function getAllSongByArtist(int $artistId): ?array
    {
        if(!is_null($this->pdo)){
            $query = 'SELECT * FROM `song` WHERE `artist_id` = :artist_id';
            $response = $this->pdo->prepare($query);
            $response->execute([
               ':artist_id' => $artistId,
            ]);
            if($response->rowCount()>0){
                $response = $response->fetchAll(PDO::FETCH_ASSOC);
                $songs = [];
                foreach ($response as $row) {
                    $songs[] = (new Song())->hydrate($row);
                }
                return $songs;
            }
            return null;
        }
        return null;
    }

    public function deleteOneSong(int $id): void
    {
        if(!is_null($this->pdo)){
            $query = 'DELETE FROM `song` WHERE `id` = :id';
            $response = $this->pdo->prepare($query);
            $response->execute([
                ':id' => $id,
            ]);
        }
    }
}