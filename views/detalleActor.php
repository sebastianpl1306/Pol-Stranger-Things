<?php 
    include "../app/class/Actor.php";

    $once = new Actor();

    $once->set_nombre('Millie');
    $once->set_apellido('Bobby Brown');
    $once->set_edad(18);
    $once->set_genero('F');
    $once->set_numeroTemporadas(4);
    $once->set_personaje('once');
    $once->set_rol('principal');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?php echo strval($once->get_nombre())?></h1>
</body>
</html>