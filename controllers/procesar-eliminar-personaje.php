<?php
require_once __DIR__.'/../helpers/connectionDB.php';

/**
 * Permite eliminar un personaje de la base de datos
 */
class ProcesarEliminarPersonaje extends Connection {
    function __construct() {
        $this->eliminar();
    }

    /**
     * Elimina un personaje en base a su ID
     */
    function eliminar() {
        $id = $_POST["id"];

        if (!$id) {
            header('Location: ' . "../views/personajes.php" . "?mensaje=ID no proporcionado");
            exit;
        }

        // Obtener la imagen asociada para eliminarla del servidor
        $this->connectToDB();
        $queryImagen = "SELECT imagen FROM actores WHERE id = '$id'";
        $resultado = mysqli_query($this->get_connection(), $queryImagen);
        $fila = mysqli_fetch_assoc($resultado);
        $imagen = $fila['imagen'];

        // Eliminar el personaje
        $consulta = "DELETE FROM actores WHERE id = '$id'";
        if (mysqli_query($this->get_connection(), $consulta)) {
            // Eliminar la imagen del servidor si existe
            $rutaImagen = '../assets/images/' . $imagen;
            if (file_exists($rutaImagen)) {
                unlink($rutaImagen);
            }
            header('Location: ' . "../views/personajes.php" . "?mensaje=Personaje eliminado con éxito");
        } else {
            header('Location: ' . "../views/personajes.php" . "?mensaje=No se pudo eliminar el personaje");
        }
    }
}

$procesarEliminacion = new ProcesarEliminarPersonaje();