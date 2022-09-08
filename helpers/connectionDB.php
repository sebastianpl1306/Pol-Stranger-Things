<?php
class Conneccion{
    public $connection;

    function get_connection(){
        return $this->connection;
    }

    function set_connection($connection) {
        $this->connection = $connection;
    }

    function connectToDB(){
        $this->set_connection(mysqli_connect("localhost","root","12345","strangerthings"));
        if (!$this->get_connection()) {
            echo "Conneccion erronea";
        }else{
            echo "Conneccion establecida";
        }
    }
}