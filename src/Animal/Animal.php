<?php

    namespace App\Animal;

    use App\Owner\Owner;

class Animal {
    private string $name;
    // Chaque animal a un propriétaire.
    private ?Owner $owner;
    private string $species;

    // Un type de variable ayant un ? avant signifie qu'il à le droit d'être null
    // Par exemple ?owner correspont à l'union Owner|null
    public function __construct(string $name, string $species, ?Owner $owner)
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
     * Get the value of owner
     */ 
    public function getOwner(): ?Owner
    {
        return $this->owner;
    }

    /**
     * Set the value of owner
     *
     * @return  self
     */ 
    public function setOwner(?Owner $owner)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get the value of species
     */ 
    public function getSpecies()
    {
        return $this->species;
    }
}