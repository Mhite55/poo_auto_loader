<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
    include "vendor/autoload.php";
    use App\Animal\Animal;
    use App\Owner\Owner;

    $owner = new Owner("Vivien le démon des enfers profonde");
    $owner2 = new Owner("Jojo");

    $animal = New Animal("Grégory", "Rat Taupe Nu", null);
    echo "<p>" . $animal->getName() . "</p>";

    $animal2 = New Animal("Pierre il est gentil =) ", "Blob", null);
    echo $animal->getName();

    $owner->addAnimals($animal);
    $owner->addAnimals($animal2);
    $owner->showAnimals();
    $owner2->showAnimals();

    $owner->removeAnimals($animal2);
    $owner->showAnimals();

    ?>
</body>
</html>