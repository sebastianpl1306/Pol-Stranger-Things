<?php
require_once __DIR__.'/../helpers/connectionDB.php';

/**
 * La clase ProcesarRegistro permite procesar la creación de un usuario
 */
class ProcesarRegistro extends Connection {
    //Permite inicializar la función de registrar un usuario
    function __construct() {
        $this->registrar();
    }

    /**
     * Permite registrar a un nuevo usuario en la base de datos
     */
    function registrar() {
        if (isset($_POST["nombre"], $_POST["apellido"], $_POST["correo"], $_POST["clave"], $_POST["confirmar"])) {
            $nombre = trim($_POST["nombre"]);
            $apellido = trim($_POST["apellido"]);
            $correo = trim($_POST["correo"]);
            $clave = $_POST["clave"];
            $confirmar = $_POST["confirmar"];

            // Validaciones del lado del servidor
            $errores = [];

            if ($nombre === "" || $apellido === "" || $correo === "" || $clave === "" || $confirmar === "") {
                $errores[] = "Todos los campos son obligatorios.";
            }

            if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/", $nombre)) {
                $errores[] = "El nombre no debe contener números ni caracteres especiales.";
            }

            if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/", $apellido)) {
                $errores[] = "El apellido no debe contener números ni caracteres especiales.";
            }

            if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                $errores[] = "El correo no tiene un formato válido.";
            }

            if (strlen($clave) < 6) {
                $errores[] = "La contraseña debe tener al menos 6 caracteres.";
            }

            if ($clave !== $confirmar) {
                $errores[] = "Las contraseñas no coinciden.";
            }

            if (!empty($errores)) {
                // Redirigir con errores concatenados
                $mensaje = urlencode(implode(" ", $errores));
                header("Location: ../views/form-registro.php?mensaje=$mensaje");
                exit;
            }

            //TODO: Insertar nuevo usuario en la base de datos
            // $claveSegura = password_hash($clave, PASSWORD_DEFAULT); // Recomendado para guardar contraseñas

            // $consulta = "INSERT INTO usuarios (nombre, apellido, correo, clave, rol) VALUES (?, ?, ?, ?, 'VISITANT')";
            $consulta = "INSERT INTO usuarios (nombre, apellido, correo, clave, rol) VALUES('$nombre','$apellido','$correo','$clave','VISITANT')";

            $this->connectToDB();
            $conn = $this->get_connection();

            echo $consulta;
            if (mysqli_query($this->get_connection(), $consulta)) {
                //Redirige a la pagina de inicio de sesion
                header('Location: '."../views/form-registro.php"."?mensaje=Registro creado con éxito");
            } else {
                //Redirige a la pagina de registro con un mensaje de error
                header('Location: '."../views/form-registro.php"."?mensaje=$consulta");
            }
        } else {
            header('Location: ../views/form-registro.php?mensaje=Datos incompletos');
            exit;
        }
    }
}

$procesarRegistro = new ProcesarRegistro();