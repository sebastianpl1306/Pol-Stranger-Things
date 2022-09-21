<?php
/**
* La clase connneccion permite al usuario conectarse a la base de datos
*/
class Conneccion{
    public $connection;

    //Permite cambiar o obtener la conección
    function get_connection(){
        return $this->connection;
    }

    function set_connection($connection) {
        $this->connection = $connection;
    }

    //Permite conectarse con la base de datos y guardar la conección
    function connectToDB(){
        $this->set_connection(mysqli_connect("localhost","root","12345","strangerthings"));
        if (!$this->get_connection()) {
            echo "Conneccion erronea";
        }else{
            echo "Conneccion establecida";
        }
    }
}