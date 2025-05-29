<?php
include_once __DIR__."/../class/Actor.php";
include_once __DIR__."/../class/Monstruo.php";
include_once __DIR__."/../class/Temporada.php";
include_once __DIR__."/../class/DatoCurioso.php";

/**
* La clase Controller permite mostrar los actores y mostrar los monstruos
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
     * Crea un objeto de la clase actor y ejecuta la función que obtiene actores
     */
    public function mostrar_actor($id){
        $actor = new Actor();
        return $actor->obtener_actor_por_id($id);
    }

    /**
     * Crea un objeto de la clase monstruo y ejecuta la función que obtiene los monstruos
     */
    public function mostrar_monstruos(){
        $monstruo = new Monstruo();
        return $monstruo->obtener_todos();
    }

    /**
     * Crea un objeto de la clase monstruo y ejecuta la función que obtiene un monstruo por id
     */
    public function mostrar_monstruo($id){
        $monstruo = new Monstruo();
        return $monstruo->obtener_monstruo_por_id($id);
    }

    /**
     * Crea un objeto de la clase temporada y ejecuta la función que obtiene las temporadas
     */
    public function mostrar_temporadas(){
        $temporada = new Temporada();
        return $temporada->obtener_todos();
    }

    /**
     * Crea un objeto de la clase dato curioso y ejecuta la función que obtiene los datos curiosos
     */
    public function mostrar_datos_curiosos(){
        $datoCurioso = new DatoCurioso();
        return $datoCurioso->obtener_todos();
    }
}