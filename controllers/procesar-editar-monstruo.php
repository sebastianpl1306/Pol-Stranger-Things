<?php
require_once __DIR__.'/../helpers/connectionDB.php';

/**
 * Clase para modificar un monstruo existente en la base de datos
 */
class ProcesarModificarMonstruo extends Connection {
    function __construct() {
        $this->modificar();
    }

    function modificar() {
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $debilidad = $_POST["debilidad"];
        $aparicion = $_POST["aparicion"];
        $armas = $_POST["armas"];
        $descripcion = $_POST["descripcion"];
        $imagen = $_FILES["imagen"]["name"];

        // Validación de campos requeridos
        if (!$id || !$nombre || !$debilidad || !$aparicion || !$armas || !$descripcion) {
            header("Location: ../views/form-editar-monstruo.php?id=$id&mensaje=Faltan campos requeridos");
            return;
        }

        $this->connectToDB();
        $conexion = $this->get_connection();

        $sqlImagen = '';
        if (isset($imagen) && $imagen != "") {
            $tipo = $_FILES['imagen']['type'];
            $tamano = $_FILES['imagen']['size'];
            $temp = $_FILES['imagen']['tmp_name'];

            if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
                header("Location: ../views/form-editar-monstruo.php?id=$id&mensaje=Imagen inválida");
                return;
            }

            if (move_uploaded_file($temp, '../assets/images/' . $imagen)) {
                chmod('../assets/images/' . $imagen, 0777);
                $sqlImagen = ", imagen = '$imagen'";
            } else {
                header("Location: ../views/form-editar-monstruo.php?id=$id&mensaje=Error al subir la imagen");
                return;
            }
        }

        // Actualizar monstruo
        $consulta = "
            UPDATE monstruos SET
            nombre = '$nombre',
            debilidad = '$debilidad',
            aparicion = '$aparicion',
            armas = '$armas',
            descripcion = '$descripcion'
            $sqlImagen
            WHERE id = $id
        ";

        if (mysqli_query($conexion, $consulta)) {
            header("Location: ../views/monstruos.php?mensaje=Monstruo actualizado con éxito");
        } else {
            header("Location: ../views/form-editar-monstruo.php?id=$id&mensaje=Error al actualizar");
        }
    }
}

$procesarModificar = new ProcesarModificarMonstruo();