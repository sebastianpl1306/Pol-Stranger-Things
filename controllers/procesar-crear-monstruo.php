<?php
require_once __DIR__.'/../helpers/connectionDB.php';

/**
* Permite registrar a un nuevo usuario en la base de datos
*/
class ProcesarCrearMonstruo extends Connection{
    function __construct(){
        $this->crear();
    }

    /**
    * Permite crear un nuevo monstruo
    */
    function crear()
    {
        try {
            $nombreMonstruo = $_POST["nombreMonstruo"];
            $descripcionMonstruo = $_POST["descripcionMonstruo"];
            $debilidad = $_POST["debilidad"];
            $primeraAparicion = $_POST["primeraAparicion"];
            $armas = $_POST["armas"];
            $imagenMonstruo = $_FILES["imagenMonstruo"]["name"];

            if (!$nombreMonstruo || !$debilidad || !$primeraAparicion || !$armas || !$imagenMonstruo || !$descripcionMonstruo) {
                echo '<div><b>Error. Todos los campos son obligatorios.</b></div>';
                header('Location: '."../views/form-agregar-monstruo.php"."?mensaje=Ocurrió un problema");
            }else{
                if (isset($imagenMonstruo) && $imagenMonstruo != "") {
                    //Obtenemos algunos datos necesarios sobre el archivo
                    $tipo = $_FILES['imagenMonstruo']['type'];
                    $tamano = $_FILES['imagenMonstruo']['size'];
                    $temp = $_FILES['imagenMonstruo']['tmp_name'];
                    if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
                        return '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
                        - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
                    }
                    else{
                        //Si la imagen es correcta en tamaño y tipo
                        //Se intenta subir al servidor
                        if (move_uploaded_file($temp, '../assets/images/'.$imagenMonstruo)) {
                            //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                            chmod('../assets/images/'.$imagenMonstruo, 0777);

                            //Creamos la consulta para crear un nuevo monstruo
                            $consulta = "
                                INSERT INTO monstruos 
                                (nombre, debilidad, aparicion, first_appearance_season_id, armas, imagen, descripcion) 
                                VALUES('$nombreMonstruo','$debilidad','$primeraAparicion','$primeraAparicion','$armas','$imagenMonstruo','$descripcionMonstruo')
                            ";
                            //Ejecutar la consulta
                            $this->connectToDB();
                            if (mysqli_query($this->get_connection(), $consulta)) {
                                header('Location: '."../views/monstruos.php"."?mensaje=Registro creado con éxito");
                            } else {
                                header('Location: '."../views/form-agregar-monstruo.php"."?mensaje=Ocurrió un problema" . mysqli_error($this->get_connection()));
                            }
                        } else {
                            //Si no se ha podido subir la imagen, mostramos un mensaje de error
                            header('Location: '."../views/form-agregar-monstruo.php"."?mensaje=Ocurrió algún error al subir el fichero. No pudo guardarse.");
                        }
                    }
                }
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
            // Si ocurre un error, lo capturamos y redirigimos a la página de agregar monstruo con un mensaje de error
            error_log("Error al crear el monstruo: " . $th->getMessage());
            // Redirigimos a la página de agregar monstruo con un mensaje de error
            header('Location: '."../views/form-agregar-monstruo.php"."?mensaje=Ocurrió un problema");
        }

    }
}

$procesarRegistro = new ProcesarCrearMonstruo();