<?php
require_once __DIR__.'/../helpers/connectionDB.php';

/**
* Permite modificar un personaje existente en la base de datos
*/
class ProcesarModificarPersonaje extends Connection {
    function __construct(){
        $this->modificar();
    }

    /**
    * Permite modificar un personaje
    */
    function modificar()
    {
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $edad = $_POST["edad"];
        $genero = $_POST["genero"];
        $temporadas = $_POST["temporadas"];
        $personaje = $_POST["personaje"];
        $rol = $_POST["rol"];
        $descripcion = $_POST["descripcion"];
        $imagen = $_FILES["imagen"]["name"];

        if (!$id || !$nombre || !$apellido || !$edad || !$genero || !$temporadas || !$personaje || !$rol || !$descripcion) {
            header('Location: '."../views/form-editar-personaje.php?id=$id&mensaje=Faltan campos requeridos");
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
                header('Location: '."../views/form-editar-personaje.php?id=$id&mensaje=Imagen inválida");
                return;
            }

            if (move_uploaded_file($temp, '../assets/images/'.$imagen)) {
                chmod('../assets/images/'.$imagen, 0777);
                $sqlImagen = ", imagen = '$imagen'";
            } else {
                header('Location: '."../views/form-editar-personaje.php?id=$id&mensaje=Error al subir la imagen");
                return;
            }
        }

        $consulta = "
            UPDATE actores SET
            nombre = '$nombre',
            apellido = '$apellido',
            edad = '$edad',
            genero = '$genero',
            temporadas = '$temporadas',
            personaje = '$personaje',
            rol = '$rol',
            descripcion = '$descripcion'
            $sqlImagen
            WHERE id = $id
        ";

        if (mysqli_query($conexion, $consulta)) {
            header('Location: '."../views/personajes.php?mensaje=Personaje actualizado con éxito");
        } else {
            header('Location: '."../views/form-editar-personaje.php?id=$id&mensaje=Error al actualizar");
        }
    }
}

$procesarModificar = new ProcesarModificarPersonaje();