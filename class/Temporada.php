<?php
//Permite importar la clase Connection
require_once __DIR__.'/../helpers/connectionDB.php';

class Temporada extends Connection {
    private int $id;
    private int $numero;
    private string $titulo;
    private string $fecha_lanzamiento;
    private string $episodios;
    private string $imagen;
    private string $descripcion;

    // Setters
    public function setId(int $id): void { $this->id = $id; }
    public function setNumero(int $numero): void { $this->numero = $numero; }
    public function setTitulo(string $titulo): void { $this->titulo = $titulo; }
    public function setFechaLanzamiento(string $fecha_lanzamiento): void { $this->fecha_lanzamiento = $fecha_lanzamiento; }
    public function setEpisodios(string $episodios): void { $this->episodios = $episodios; }
    public function setImagen(string $imagen): void { $this->imagen = $imagen; }
    public function setDescripcion(string $descripcion): void { $this->descripcion = $descripcion; }

    // Getters
    public function getId(): int { return $this->id; }
    public function getNumero(): int { return $this->numero; }
    public function getTitulo(): string { return $this->titulo; }
    public function getFechaLanzamiento(): string { return $this->fecha_lanzamiento; }
    public function getEpisodios(): string { return $this->episodios; }
    public function getImagen(): string { return $this->imagen; }
    public function getDescripcion(): string { return $this->descripcion; }

    /*
    * Atributo para obtener todas las temporadas de la base de datos
    */
    public function obtener_todos(){
        $items = [];
        try{
            //Creamos la consulta para traer todos las temporadas
            $consulta = 'SELECT * FROM temporadas ORDER BY numero';

            //Generar una connection a la base de datos y ejecutar la consulta
            $this->connectToDB();
            $datos = mysqli_query($this->get_connection(), $consulta);
            if ($datos) {
                //Recorre el resultado de la base de datos y crea un arreglo de objetos que contiene todas las temporadas
                while ($fila = mysqli_fetch_array($datos)) {
                    $item = new Temporada();
                    $item->setId($fila['id']);
                    $item->setNumero($fila['numero']);
                    $item->setTitulo($fila['titulo']);
                    $item->setFechaLanzamiento($fila['fecha_lanzamiento']);
                    $item->setEpisodios($fila['episodios']);
                    $item->setImagen($fila['imagen']);
                    $item->setDescripcion($fila['descripcion']);

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