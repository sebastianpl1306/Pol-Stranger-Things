<?php
include_once __DIR__."/../class/Actor.php";
include_once __DIR__."/../class/Mounstro.php";

/**
* La clase Controller permite mostrar los actores y mostrar los mounstros
*/
class Controller{
    function __construct(){
    }

    /**
     * Crea un objeto de la clase actor y ejecuta la función que obtiene actores
     */
    public function mostrar_actores(){
        $actor = new Actor();
        return $actor->obtener_todos();
    }

    /**
     * Crea un objeto de la clase mounstro y ejecuta la función que obtiene los mosuntros
     */
    public function mostrar_mounstros(){
        $mounstro = new Mounstro();
        return $mounstro->obtener_todos();
    }
}