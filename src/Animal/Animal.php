<?php

    namespace App\Animal;

    use App\Owner\Owner;

class Animal {
    private string $name;
    private Owner $owner;
    private string $species;

    public function __construct($name, $species, ?Owner $owner)
    {
        $this->name = $name;
        $this->species = $species;
        $this->owner = $owner;
    }


    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of species
     */ 
    public function getSpecies()
    {
        return $this->species;
    }
}