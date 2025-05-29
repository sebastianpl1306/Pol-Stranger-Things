<?php
//Permite importar la clase Connection
require_once __DIR__.'/../helpers/connectionDB.php';

/**
* La clase Monstruo contiene toda la información relacionada con los monstrous de la serie
* Este clase Hereda de Conneccion que permite realizar la conexión con base de datos
*/
class Monstruo extends Connection{
    //Propiedades de la clase actor
    public $id, $nombre, $debilidad, $aparicion, $armas, $descripcion, $imagen;

    //Permite modificar y obtener el id
    function set_id($id) {
        $this->id = $id;
    }

    function get_id() {
        return $this->id;
    }
    
    //Permite modificar y obtener el nombre
    function set_nombre($nombre) {
        $this->nombre = $nombre;
    }

    function get_nombre() {
        return $this->nombre;
    }

    //Permite modificar y obtener la debilidad
    function set_debilidad($debilidad) {
        $this->debilidad = $debilidad;
    }

    function get_debilidad() {
        return $this->debilidad;
    }

    //Permite modificar y obtener la aparicion
    function set_aparicion($aparicion) {
        $this->aparicion = $aparicion;
    }

    function get_aparicion() {
        return $this->aparicion;
    }

    //Permite modificar y obtener las armas
    function set_armas($armas) {
        $this->armas = $armas;
    }

    function get_armas() {
        return $this->armas;
    }

    //Permite modificar y obtener una descripción
    function set_descripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function get_descripcion() {
        return $this->descripcion;
    }
    
    //Permite modificar y obtener la imagen
    function set_imagen($imagen) {
        $this->imagen = $imagen;
    }

    function get_imagen() {
        return $this->imagen;
    }

    /*
    * Atributo para obtener todos los monstrous
    */
    public function obtener_todos(){
        $items = [];
        try{
            //Creamos la consulta para traer todos los monstrous
            $consulta = 'SELECT * FROM monstruos';

            //Generar una coneccion a la base de datos y ejecutar la consulta
            $this->connectToDB();
            $datos = mysqli_query($this->get_connection(), $consulta);
            if ($datos) {
                //Recorre el resultado de la base de datos y crea un arreglo de objetos que contiene todos los mounstros
                while ($fila = mysqli_fetch_array($datos)) {
                    $item = new Monstruo();
                    $item->id = $fila['id'];
                    $item->nombre = $fila['nombre'];
                    $item->debilidad = $fila['debilidad'];
                    $item->aparicion = $fila['aparicion'];
                    $item->armas = $fila['armas'];
                    $item->descripcion = $fila['descripcion'];
                    $item->imagen = $fila['imagen'];

                    array_push($items, $item);
                }
            }else{
                echo "ha ocurrido un problema";
            }

            return $items;
        }catch(PDOException $e){
            return [];
        }
    }

    public function obtener_monstruo_por_id($id){
        $item = new Monstruo();
        try{
            //Creamos la consulta para traer un monstruo por id
            $consulta = 'SELECT * FROM monstruos WHERE id = ?';

            //Generar una coneccion a la base de datos y ejecutar la consulta
            $this->connectToDB();
            $stmt = mysqli_prepare($this->get_connection(), $consulta);
            mysqli_stmt_bind_param($stmt, 'i', $id);
            mysqli_stmt_execute($stmt);
            $datos = mysqli_stmt_get_result($stmt);

            if ($datos) {
                $fila = mysqli_fetch_array($datos);
                if ($fila) {
                    $item->set_id($fila['id']);
                    $item->set_nombre($fila['nombre']);
                    $item->set_debilidad($fila['debilidad']);
                    $item->set_aparicion($fila['aparicion']);
                    $item->set_armas($fila['armas']);
                    $item->set_descripcion($fila['descripcion']);
                    $item->set_imagen($fila['imagen']);
                }
            }else{
                echo "ha ocurrido un problema";
            }

            return $item;
        }catch(PDOException $e){
            return null;
        }
    }
}