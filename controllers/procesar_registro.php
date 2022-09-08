<?php
    require_once __DIR__.'/../helpers/connectionDB.php';

    class ProcesarRegistro extends Conneccion{
        function __construct(){
            $this->registrar();
        }

        function registrar()
        {
            if (isset($_POST["nombre"],$_POST["apellido"],$_POST["correo"],$_POST["clave"],$_POST["confirmar"])) {
                $nombre = $_POST["nombre"];
                $apellido = $_POST["apellido"];
                $correo = $_POST["correo"];
                $clave = $_POST["clave"];
                $confirmar = $_POST["confirmar"];

                if (!$nombre || !$apellido || !$correo || !$clave || !$confirmar) {
                    header('Location: '."../views/form-registro.php"."?mensaje=Ocurrio un problema");
                }else{
                    $consulta = "INSERT INTO usuarios (nombre, apellido, correo, clave, rol) VALUES('$nombre','$apellido','$correo','$clave','VISITANT')";
                    
                    $this->connectToDB();
                    if (mysqli_query($this->get_connection(), $consulta)) {
                        header('Location: '."../views/form-registro.php"."?mensaje=Registro creado con exito");
                    } else {
                        header('Location: '."../views/form-registro.php"."?mensaje=Ocurrio un problema");
                    }
                    
                }
            }
        }
    }

    $procesarRegistro = new ProcesarRegistro();