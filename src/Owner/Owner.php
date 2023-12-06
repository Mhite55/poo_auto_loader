<?php

    namespace App\Owner;

    class Owner 
    {
        private string $name;
        private array $animals;

        public function __construct($name)
        {
            $this->name = $name;
        }
    
        /**
         * Get the value of name
         */ 
        public function getName()
        {
            return $this->name;
        }
        
        public function addAnimals($animal){
            if ( is_a($animal, "Animal") ) 
            {
                if( $animal->getOwner() == null)
                {
                    if ($this->containAnimal($animal)) 
                    {
                        $this->animals[] = $animal;
                        $animal->setOwner($this);
                    }
                    else
                    {
                        throw new Exception ("il ne peut pas avoir plusieur fois le même");  
                    }
                }
                else 
                {
                    throw new Exception ("Tu essayes de voler, l'animal d'un autre");   
                }
            }
            else 
            {
                throw new Exception ("Tu n'es autorisé qu'a être un propriètaire d'animaux");
            }
        }

        private function containAnimal($animalToCheck)
        {
            foreach ($this->animals as $animal) 
            {
                if ( $animalToCheck === $animal ) 
                {
                    return false ;
                }
                return true;
            }
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
                       echo "<li>" . $animal-getName() . ", Espèce : " . $animal->getSpecies() . "</li>" ;
                    }
                echo "</ul>";
            }else 
            {
                $name = $this->name;
                echo "<h2>$name n'a pas d'animaux de compagnies.</h2>";
            }
        }
    }
    