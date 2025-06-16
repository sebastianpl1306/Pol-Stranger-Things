<?php
require_once __DIR__.'/../helpers/connectionDB.php';

/**
 * Permite eliminar un personaje de la base de datos
 */
class ProcesarCambioEstadoUsuario extends Connection {
    function __construct() {
        $this->cambiarEstado();
    }

    /**
     * Cambia el estado de un usuario en base a su ID
     */
    function cambiarEstado() {
        $id = $_POST["id"];
        $nuevoEstado = $_POST["estado"];

        if (!$id || !$nuevoEstado) {
            header('Location: ' . "../views/panel-administrador.php" . "?mensaje=ID o estado no proporcionado");
            exit;
        }

        $this->connectToDB();
        $consulta = "UPDATE usuarios SET estado = '$nuevoEstado' WHERE id = '$id'";
        if (mysqli_query($this->get_connection(), $consulta)) {
            header('Location: ' . "../views/panel-administrador.php" . "?mensaje=Estado cambiado con éxito");
        } else {
            header('Location: ' . "../views/panel-administrador.php" . "?mensaje=No se pudo cambiar el estado");
        }
    }
}

$procesarCambioEstado = new ProcesarCambioEstadoUsuario();