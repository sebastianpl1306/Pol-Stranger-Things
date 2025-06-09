<?php
require_once __DIR__.'/../helpers/connectionDB.php';

/**
 * Permite eliminar un monstruo de la base de datos
 */
class ProcesarEliminarMonstruo extends Connection {
    function __construct() {
        $this->eliminar();
    }

    /**
     * Elimina un monstruo por su ID
     */
    function eliminar() {
        try {
            $id = $_POST["id"];

            if (!$id) {
                header('Location: ' . "../views/monstruos.php" . "?mensaje=ID no proporcionado");
                exit;
            }

            $this->connectToDB();

            // Obtener la imagen asociada al monstruo para eliminarla del servidor
            $queryImagen = "SELECT imagen FROM monstruos WHERE id = '$id'";
            $resultado = mysqli_query($this->get_connection(), $queryImagen);

            if (!$resultado || mysqli_num_rows($resultado) === 0) {
                header('Location: ' . "../views/monstruos.php" . "?mensaje=Monstruo no encontrado");
                exit;
            }

            $fila = mysqli_fetch_assoc($resultado);
            $imagen = $fila['imagen'];

            // Eliminar el registro del monstruo
            $consulta = "DELETE FROM monstruos WHERE id = '$id'";
            if (mysqli_query($this->get_connection(), $consulta)) {
                // Eliminar la imagen del servidor si existe
                $rutaImagen = '../assets/images/' . $imagen;
                if (file_exists($rutaImagen)) {
                    unlink($rutaImagen);
                }

                header('Location: ' . "../views/monstruos.php" . "?mensaje=Monstruo eliminado con éxito");
            } else {
                header('Location: ' . "../views/monstruos.php" . "?mensaje=No se pudo eliminar el monstruo");
            }
        } catch (\Throwable $th) {
            error_log("Error al eliminar el monstruo: " . $th->getMessage());
            header('Location: ' . "../views/monstruos.php" . "?mensaje=Ocurrió un error inesperado");
        }
    }
}

$procesarEliminacion = new ProcesarEliminarMonstruo();