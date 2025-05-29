<?php
//Permite importar la clase Connection
require_once __DIR__.'/../helpers/connectionDB.php';

class DatoCurioso extends Connection {
    private int $id;
    private string $titulo;
    private string $descripcion;
    private string $imagen;
    private int $temporada_id;

    // Setters
    public function setId(int $id): void { $this->id = $id; }
    public function setTitulo(string $titulo): void { $this->titulo = $titulo; }
    public function setDescripcion(string $descripcion): void { $this->descripcion = $descripcion; }
    public function setImagen(string $imagen): void { $this->imagen = $imagen; }
    public function setTemporadaId(int $temporada_id): void { $this->temporada_id = $temporada_id; }

    // Getters
    public function getId(): int { return $this->id; }
    public function getTitulo(): string { return $this->titulo; }
    public function getDescripcion(): string { return $this->descripcion; }
    public function getImagen(): string { return $this->imagen; }
    public function getTemporadaId(): int { return $this->temporada_id; }

    /*
    * Atributo para obtener todos los datos curiosos de la base de datos
    */
    public function obtener_todos(){
        $items = [];
        try{
            //Creamos la consulta para traer todos las temporadas
            $consulta = 'SELECT * FROM datos_curiosos ORDER BY temporada_id';

            //Generar una connection a la base de datos y ejecutar la consulta
            $this->connectToDB();
            $datos = mysqli_query($this->get_connection(), $consulta);
            if ($datos) {
                //Recorre el resultado de la base de datos y crea un arreglo de objetos que contiene todas las temporadas
                while ($fila = mysqli_fetch_array($datos)) {
                    $item = new DatoCurioso();
                    $item->setId($fila['id']);
                    $item->setTitulo($fila['titulo']);
                    $item->setDescripcion($fila['descripcion']);
                    $item->setImagen($fila['imagen']);
                    $item->setTemporadaId($fila['temporada_id']);
                    
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