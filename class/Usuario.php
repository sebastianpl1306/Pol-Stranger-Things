<?php
    class Usuario{
        public $id, $nombre, $apellido, $correo, $rol;

        function __construct(){}

        function set_id($id) {
            $this->id = $id;
        }

        function get_id() {
            return $this->id;
        }
        
        function set_nombre($nombre) {
            $this->nombre = $nombre;
        }

        function get_nombre() {
            return $this->nombre;
        }

        function set_apellido($apellido) {
            $this->apellido = $apellido;
        }

        function get_apellido() {
            return $this->apellido;
        }

        function set_correo($correo) {
            $this->correo = $correo;
        }

        function get_correo() {
            return $this->correo;
        }

        function set_rol($rol) {
            $this->rol = $rol;
        }

        function get_rol() {
            return $this->rol;
        }
    }