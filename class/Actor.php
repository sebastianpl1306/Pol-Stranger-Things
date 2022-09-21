<?php
    //Permite importar la clase Connection
    require_once __DIR__.'/../helpers/connectionDB.php';

    /**
    * La clase Actor contiene toda la información relacionada con los actores y sus papeles en la serie
    * Este clase Hereda de Conneccion que permite realizar la conexión con base de datos
    */
    class Actor extends Conneccion{
        //Propiedades de la clase actor
        public $id, $nombre, $apellido, $edad, $genero, $numeroTemporadas, $personaje, $rol, $imagen, $descripcion;

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

        //Permite modificar y obtener la edad
        function set_edad($edad) {
            $this->edad = $edad;
        }

        function get_edad() {
            return $this->edad;
        }

        //Permite modificar y obtener el genero
        function set_genero($genero) {
            $this->genero = $genero;
        }

        function get_genero() {
            return $this->genero;
        }

        //Permite modificar y obtener el numero de temporadas
        function set_numeroTemporadas($numeroTemporadas) {
            $this->numeroTemporadas = $numeroTemporadas;
        }

        function get_numeroTemporadas() {
            return $this->numeroTemporadas;
        }

        //Permite modificar y obtener el personaje
        function set_personaje($personaje) {
            $this->personaje = $personaje;
        }

        function get_personaje() {
            return $this->personaje;
        }

        //Permite modificar y obtener el rol
        function set_rol($rol) {
            $this->rol = $rol;
        }

        function get_rol() {
            return $this->rol;
        }

        //Permite modificar y obtener la imagen
        function set_imagen($imagen) {
            $this->imagen = $imagen;
        }

        function get_imagen() {
            return $this->imagen;
        }

        //Permite modificar y obtener la descripción
        function set_descripcion($descripcion) {
            $this->descripcion = $descripcion;
        }

        function get_descripcion() {
            return $this->descripcion;
        }

        /*
        * Atributo para obtener todos los actores
        */
        public function obtener_todos(){
            $items = [];
            try{
                //Creamos la consulta para traer todos los actores
                $consulta = 'SELECT * FROM actores';

                //Generar una coneccion a la base de datos y ejecutar la consulta
                $this->connectToDB();
                $datos = mysqli_query($this->get_connection(), $consulta);
                if ($datos) {
                    //Recorre el resultado de la base de datos y crea un arreglo de objetos que contiene todos los actores
                    while ($fila = mysqli_fetch_array($datos)) {
                        $item = new Actor();
                        $item->id = $fila['id'];
                        $item->nombre = $fila['nombre'];
                        $item->apellido = $fila['apellido'];
                        $item->edad = $fila['edad'];
                        $item->genero = $fila['genero'];
                        $item->numeroTemporadas = $fila['temporadas'];
                        $item->personaje = $fila['personaje'];
                        $item->rol = $fila['rol'];
                        $item->imagen = $fila['imagen'];
                        $item->descripcion = $fila['descripcion'];

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