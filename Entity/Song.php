<?php

class Song
{
    private int $id;
    private int $artistId;
    private string $title;
    private int $time;
    private DateTime $publishedAt;

    public function hydrate(array $songInAsso): Song
    {
        foreach ($songInAsso as $key => $value){
            $method = 'set' . ucwords(implode(explode('_',$key)));
            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getArtistId(): int
    {
        return $this->artistId;
    }

    /**
     * @param int $artistId
     */
    public function setArtistId(int $artistId): void
    {
        $this->artistId = $artistId;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return int
     */
    public function getTime(): int
    {
        return $this->time;
    }

    /**
     * @param int $time
     */
    public function setTime(int $time): void
    {
        $this->time = $time;
    }

    /**
     * @return DateTime
     */
    public function getPublishedAt(): DateTime
    {
        return $this->publishedAt;
    }

    /**
     * @param string $publishedAt
     */
    public function setPublishedAt(string $publishedAt): void
    {
        $this->publishedAt = new DateTime($publishedAt);
    }


}