<?php
    require_once __DIR__.'/../helpers/connectionDB.php';

    /**
    * Permite registrar a un nuevo usuario en la base de datos
    */
    class ProcesarCrearPersonaje extends Connection{
        function __construct(){
            $this->crear();
        }

        /**
        * Permite crear un nuevo personaje
        */
        function crear()
        {
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $edad = $_POST["edad"];
            $genero = $_POST["genero"];
            $temporadas = $_POST["temporadas"];
            $personaje = $_POST["personaje"];
            $rol = $_POST["rol"];
            $imagen = $_FILES["imagen"]["name"];
            $descripcion = $_POST["descripcion"];

            if (!$nombre || !$apellido || !$edad || !$genero || !$temporadas || !$personaje || !$rol || !$imagen || !$descripcion) {
                header('Location: '."../views/form-agregar-personaje.php"."?mensaje=Ocurrio un problema");
            }else{
                if (isset($imagen) && $imagen != "") {
                    //Obtenemos algunos datos necesarios sobre el archivo
                    $tipo = $_FILES['imagen']['type'];
                    $tamano = $_FILES['imagen']['size'];
                    $temp = $_FILES['imagen']['tmp_name'];
                    if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
                        return '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
                        - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
                    }
                    else{
                        //Si la imagen es correcta en tamaño y tipo
                        //Se intenta subir al servidor
                        if (move_uploaded_file($temp, '../assets/images/'.$imagen)) {
                            //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                            chmod('../assets/images/'.$imagen, 0777);
                            
                            //Creamos la consulta para crear un nuevo personaje
                            $consulta = "
                                INSERT INTO actores 
                                (nombre, apellido, edad, genero, temporadas, personaje, rol, imagen, descripcion) 
                                VALUES('$nombre','$apellido','$edad','$genero','$temporadas','$personaje','$rol','$imagen','$descripcion')
                            ";
                            
                            //Generar una coneccion a la base de datos y ejecutar la consulta
                            $this->connectToDB();
                            if (mysqli_query($this->get_connection(), $consulta)) {
                                header('Location: '."../views/personajes.php"."?mensaje=Registro creado con exito");
                            } else {
                                header('Location: '."../views/form-registro.php"."?mensaje=Ocurrio un problema");
                            }
                        }
                        else {
                           //Si no se ha podido subir la imagen, mostramos un mensaje de error
                           header('Location: '."../views/form-registro.php"."?mensaje=Ocurrió algún error al subir el fichero. No pudo guardarse.");
                        }
                    }
                }
            }
        }
    }

    $procesarRegistro = new ProcesarCrearPersonaje();