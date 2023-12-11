<?php

    namespace App\Owner;

    use App\Animal\Animal;

    class Owner 
    {
        private string $name;
        // Un propriétaire a le droit d'avoir plusieur animaux de compagnies, donc les animaus
        // du propriétaires se mettent dans un tableaux
        private array $animals;

        public function __construct($name)
        {
            $this->name = $name;
            $this->animals = [];
        }
    
        /**
         * Get the value of name
         */ 
        public function getName()
        {
            return $this->name;
        }
        
        // Cette methode ajoute un animal de compagnie, un par un à son propriétaire.
        // Cependant nous devons faire plusieurs verification afin de garder une cohérance des données
        public function addAnimals( $animal) : array
        {
            // On vérifie premièrement que la variable que l'on transmet à la méthode est bien un animal
            if ( $animal instanceof Animal) 
            {
                // On verifie que le même animal n'est pas déja dans le tableau
                if( $this->containAnimal($animal))
                {
                    // On vérifie que l'animal n'a pas déja un propriétaire
                    if ( $animal->getOwner() == null) 
                    {
                        // On ajoute l'animal à sont propriétaire.
                        $this->animals[] = $animal;
                        // On ajoute le propriétaire à l'animal.
                        $animal->setOwner($this);
                        return $this->animals;
                    }
                    else
                    {
                        throw new \Exception ("Tu essayes de voler, l'animal d'un autre");  
                    }
                }
                else 
                {
                    throw new \Exception ("il ne peut pas avoir plusieur fois le même"); 
                }
            }
            else 
            {
                throw new \Exception ("tu est obligé d'être un propriétaire d'animaux");
            }
        }

        // Cette methode est en privée, car on ne l'utilise pas à l'extérieur, elle est uniquement utilisé internement.
        private function containAnimal($animalToCheck)
        {
            foreach ($this->animals as $animal) 
            {
                if ( $animalToCheck === $animal ) 
                {
                    return false ;
                }
            }
            return true;
        }

        /**
         * Get the value of animals
         */ 
        public function showAnimals()
        {
            if ( count($this->animals) > 0) 
            {
                echo "<ul>";
                    foreach ($this->animals as $animal) 
                    {
                       echo "<li>" . $animal->getName() . ", Espèce : " . $animal->getSpecies() . "</li>" ;
                    }
                echo "</ul>";
            }else 
            {
                $name = $this->name;
                echo "<h2>$name n'a pas d'animaux de compagnies.</h2>";
            }
        }

        public function removeAnimals($AnimalRemove)
        {
           unset($animals[array_search($AnimalRemove, $this->animals)]);
           echo "animal $AnimalRemove bien supprimé";
        }
    }
    