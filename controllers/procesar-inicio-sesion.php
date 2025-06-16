<?php
    require_once __DIR__.'/../helpers/connectionDB.php';
    include_once __DIR__."/../class/Usuario.php";

    /**
    * Permite procesar el formulario de inicio de sesión
    */
    class ProcesarInicioSesion extends Connection{
        //Permite ejecutar la función de inicio de sesion
        function __construct(){
            $this->iniciar_sesion();
        }

        /**
        * Permite iniciar sesion en el aplicativo
        */
        function iniciar_sesion()
        {
            try{
                //comprobar que venga el correo y la clave
                if (isset($_POST["correo"],$_POST["clave"])) {
                    $correo = $_POST["correo"];
                    $clave = $_POST["clave"];

                    if (!$correo || !$clave) {
                        header('Location: '."../views/form-inicio-sesion.php"."?mensaje=Ocurrió un problema");
                    }else{
                        $items = [];

                        //Creamos la consulta para obtener el usuario que conincida con el correo y clave
                        $consulta = "SELECT id, nombre, apellido, correo, rol FROM usuarios WHERE clave='$clave' AND correo='$correo'";

                        //Generar una coneccion a la base de datos y ejecutar la consulta
                        $this->connectToDB();
                        $datos = mysqli_query($this->get_connection(), $consulta);
                        if ($datos) {
                            //Recorre el resultado de la base de datos y crea un arreglo de objetos que contiene el objeto de un usuario
                            while ($fila = mysqli_fetch_array($datos)) {
                                $item = new Usuario();
                                $item->id = $fila['id'];
                                $item->nombre = $fila['nombre'];
                                $item->apellido = $fila['apellido'];
                                $item->correo = $fila['correo'];
                                $item->rol = $fila['rol'];
        
                                array_push($items, $item);
                            }

                            //Recorre el resultado de la base de datos y crea un arreglo de objetos que contiene el objeto de un usuario
                            if (count($items) != 1) {
                                header('Location: '."../views/form-inicio-sesion.php"."?mensaje=Credenciales invalidas");
                            }else{
                                if($items[0]->get_estado() == "Inactivo"){
                                    header('Location: '."../views/form-inicio-sesion.php"."?mensaje=Usuario inactivo");
                                    exit;
                                }

                                session_start();

                                $identificator = session_id();
                                $_SESSION["idSession"] = $identificator;
                                $_SESSION["usuario_id"] = $item->get_id();
                                $_SESSION["nombre"] = $item->get_nombre()." ".$item->get_apellido();
                                $_SESSION["correo"] = $item->get_correo();
                                $_SESSION["rol"] = $item->get_rol();
                                header('Location: '."../"."?mensaje=Inicio de sesion correcto");
                            }
                        } else {
                            header('Location: '."../views/form-inicio-sesion.php"."?mensaje=Inicio de sesion incorrecto");
                        }
                        
                    }
                }
            }catch(PDOException $e){
                return [];
            }
        }
    }

    $procesarInicioDeSesion = new ProcesarInicioSesion();