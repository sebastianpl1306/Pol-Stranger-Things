<?php
    require_once __DIR__.'/../helpers/connectionDB.php';
    include_once __DIR__."/../class/Usuario.php";

    class ProcesarInicioSesion extends Conneccion{
        function __construct(){
            $this->iniciar_sesion();
        }

        function iniciar_sesion()
        {
            try{
                if (isset($_POST["correo"],$_POST["clave"])) {
                    $correo = $_POST["correo"];
                    $clave = $_POST["clave"];

                    if (!$correo || !$clave) {
                        header('Location: '."../views/form-inicio-sesion.php"."?mensaje=Ocurrio un problema");
                    }else{
                        $items = [];
                        $consulta = "SELECT id, nombre, apellido, correo, rol FROM usuarios WHERE clave='$clave' AND correo='$correo'";
                        echo $consulta;
                        $this->connectToDB();
                        $datos = mysqli_query($this->get_connection(), $consulta);
                        if ($datos) {
                            while ($fila = mysqli_fetch_array($datos)) {
                                $item = new Usuario();
                                $item->id = $fila['id'];
                                $item->nombre = $fila['nombre'];
                                $item->apellido = $fila['apellido'];
                                $item->correo = $fila['correo'];
                                $item->rol = $fila['rol'];
        
                                array_push($items, $item);
                            }

                            if (count($items) != 1) {
                                header('Location: '."../views/form-inicio-sesion.php"."?mensaje=Credenciales invalidas");
                            }else{
                                session_start();

                                $identificator = session_id();
                                $_SESSION["idSession"] = $identificator;
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