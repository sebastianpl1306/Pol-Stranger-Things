<?php
//include_once './classcontroller_actor.php';
include_once __DIR__."/../class/Actor.php";
include_once __DIR__."/../class/Mounstro.php";

class Controller{
    function __construct(){
    }

    public function mostrar_actores(){
        $actor = new Actor();
        return $actor->obtener_todos();
    }

    public function mostrar_mounstros(){
        $mounstro = new Mounstro();
        return $mounstro->obtener_todos();
    }
}