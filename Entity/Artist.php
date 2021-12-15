<?php

class Artist
{

    private ?int $id;
    private ?string $name;
    private ?int $age;

    public function __construct($id = null, $name = null, $age = null)
    {
        $this->id = $id;
        $this->age = $age;
        $this->name = $name;
    }

    public function hydrate(array $artistInAsso): Artist
    {
        foreach ($artistInAsso as $key => $value){
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
    public function getId(): ?int
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
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getAge(): ?int
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age): void
    {
        $this->age = $age;
    }

}