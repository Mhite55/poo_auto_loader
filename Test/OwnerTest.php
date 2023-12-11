<?php


use PHPUnit\Framework\TestCase;
use App\Animal\Animal;
use App\Owner\Owner;

// final , permet à une class de ne pas être un class mère
final class OwnerTest extends TestCase
{
    public function testAddAnimalsToCheckIsAnimal()
    {
        // On test ici le fait que uniquement un objet animal puissent rentrer dans la méthode
        $animal = New Animal("Grégory", "Rat Taupe Nu", null);
        $owner = new Owner("Vivien le démon des enfers profonde");

        $this->assertEqualsCanonicalizing($owner->addAnimals($animal), [$animal]);

    }
    public function testAddAnimalsShowExceptionWhenIsNotAnimal()
    {
        // On test ici l'erreur que fait le php quand on rentre un animal dans addAnimal

        // Les test d'exception doivent être places avant le code qui le test
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage("tu est obligé d'être un propriétaire d'animaux");

        
        $owner = new Owner("Vivien le démon des enfers profonde");
        $owner->addAnimals("h");
    }
    public function testAddAnimalsIsNotTheSameInstance()
    {
        // On test  ici si l'animal q'on tente de rentrer dans le propriétaire est la meme instance
        $animal = New Animal("Grégory", "Rat Taupe Nu", null);
        $animal2 = New Animal("Pierre il est gentil =) ", "Blob", null);
        $owner = new Owner("Vivien le démon des enfers profonde");
        $owner->addAnimals($animal);
        $this->assertEqualsCanonicalizing($owner->addAnimals($animal2), [$animal, $animal2]);
    }
    public function testAddAnimalsShowExceptionWhenIsNotTheSameInstance()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage("il ne peut pas avoir plusieur fois le même");

        $animal = New Animal("Grégory", "Rat Taupe Nu", null);
        $owner = new Owner("Vivien le démon des enfers profonde");
        $owner->addAnimals($animal);
        $owner->addAnimals($animal);
        // On test  ici si l'erreur de la methode add animals quand l'animal n'est pas la même instance
    }
    public function testAddAnimalsWhenAnimalHaveAlreadyAnOner()
    {
        // on test ici la nullité de l'animal pour savoir s'il a un propriétaire
        $animal = New Animal("Grégory", "Rat Taupe Nu", null);
        $owner = new Owner("Vivien le démon des enfers profonde");

        $this->assertEqualsCanonicalizing($owner->addAnimals($animal), [$animal]);
    }
    public function testAddAnimalsShowExceptionWhenAnimalHaveAlreadyAnOner()
    {
        // on test ici l'exception lors du test de la nullité de l'animal pour savoir s'il a un propriétaire
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage("Tu essayes de voler, l'animal d'un autre");

        $animal = New Animal("Grégory", "Rat Taupe Nu", null);
        $owner = new Owner("Vivien le démon des enfers profonde");
        $owner2 = new Owner("Vivien le formateur des enfers");
        $owner->addAnimals($animal);
        $owner2->addAnimals($animal);

    }
}
