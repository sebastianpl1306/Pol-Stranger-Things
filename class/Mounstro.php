<?php
    //Permite importar la clase Connection
    require_once __DIR__.'/../helpers/connectionDB.php';

    /**
    * La clase Mounstro contiene toda la información relacionada con los mounstros de la serie
    * Este clase Hereda de Conneccion que permite realizar la conexión con base de datos
    */
    class Mounstro extends Conneccion{
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
        * Atributo para obtener todos los mounstros
        */
        public function obtener_todos(){
            $items = [];
            try{
                //Creamos la consulta para traer todos los mounstros
                $consulta = 'SELECT * FROM mounstros';

                //Generar una coneccion a la base de datos y ejecutar la consulta
                $this->connectToDB();
                $datos = mysqli_query($this->get_connection(), $consulta);
                if ($datos) {
                    //Recorre el resultado de la base de datos y crea un arreglo de objetos que contiene todos los mounstros
                    while ($fila = mysqli_fetch_array($datos)) {
                        $item = new Mounstro();
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
    }