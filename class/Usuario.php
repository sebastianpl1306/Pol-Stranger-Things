<?php

    /**
    * La clase Usuario contiene toda la información relacionada al usuario
    */
    class Usuario{
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
    }