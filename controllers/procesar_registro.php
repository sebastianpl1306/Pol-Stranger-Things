<?php
    require_once __DIR__.'/../helpers/connectionDB.php';

    /**
    * La clase ProcesarRegistro permite procesar la creación de un usuario
    */
    class ProcesarRegistro extends Conneccion{
        //Permite inicializar la función de registrar un usuario
        function __construct(){
            $this->registrar();
        }

        /**
        * Permite registrar a un nuevo usuario en la base de datos
        */
        function registrar()
        {
            //comprueba que los datos no esten vacios
            if (isset($_POST["nombre"],$_POST["apellido"],$_POST["correo"],$_POST["clave"],$_POST["confirmar"])) {
                //variables que guardaran la información del formulario
                $nombre = $_POST["nombre"];
                $apellido = $_POST["apellido"];
                $correo = $_POST["correo"];
                $clave = $_POST["clave"];
                $confirmar = $_POST["confirmar"];

                if (!$nombre || !$apellido || !$correo || !$clave || !$confirmar) {
                    //Redirige a la pagina de registro y envia un mensaje de error
                    header('Location: '."../views/form-registro.php"."?mensaje=Ocurrio un problema");
                }else{
                    //consulta que inserta un nuevo usuario a la base de datos
                    $consulta = "INSERT INTO usuarios (nombre, apellido, correo, clave, rol) VALUES('$nombre','$apellido','$correo','$clave','VISITANT')";
                    
                    //Generar una coneccion a la base de datos y ejecutar la consulta
                    $this->connectToDB();
                    if (mysqli_query($this->get_connection(), $consulta)) {
                        //Redirige a la pagina de inicio de sesion
                        header('Location: '."../views/form-inicio-sesion.php"."?mensaje=Registro creado con exito");
                    } else {
                        //Redirige a la pagina de registro con un mensaje de error
                        header('Location: '."../views/form-registro.php"."?mensaje=Ocurrio un problema");
                    }
                    
                }
            }
        }
    }

    $procesarRegistro = new ProcesarRegistro();