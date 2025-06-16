<?php
//Permite importar la clase Connection
require_once __DIR__.'/../helpers/connectionDB.php';

/**
* La clase Usuario contiene toda la información relacionada al usuario
*/
class Usuario extends Connection{
    //Propiedades de la clase usuario
    public $id, $nombre, $apellido, $correo, $rol;

    function __construct(){}

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

    //Permite modificar y obtener el apellido
    function set_apellido($apellido) {
        $this->apellido = $apellido;
    }

    function get_apellido() {
        return $this->apellido;
    }

    //Permite modificar y obtener el correo
    function set_correo($correo) {
        $this->correo = $correo;
    }

    function get_correo() {
        return $this->correo;
    }

    //Permite modificar y obtener el rol
    function set_rol($rol) {
        $this->rol = $rol;
    }

    function get_rol() {
        return $this->rol;
    }

    //Permite modificar y obtener el estado
    function set_estado($estado) {
        $this->estado = $estado;
    }

    function get_estado() {
        return $this->estado;
    }

    public function obtener_todos(){
        $items = [];
        try{
            $consulta = 'SELECT * FROM usuarios';

            $this->connectToDB();
            $datos = mysqli_query($this->get_connection(), $consulta);
            if ($datos) {
                while ($fila = mysqli_fetch_array($datos)) {
                    $item = new Usuario();
                    $item->id = $fila['id'];
                    $item->nombre = $fila['nombre'];
                    $item->apellido = $fila['apellido'];
                    $item->correo = $fila['correo'];
                    $item->rol = $fila['rol'];
                    $item->estado = $fila['estado'];

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
}