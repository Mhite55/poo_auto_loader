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

    $animal = New Animal("Grégory");
    echo "<p>" . $animal->getName() . "</p>";

    $animal = New Animal("Pierre il est gentil =) ");
    echo $animal->getName();


    ?>
</body>
</html>