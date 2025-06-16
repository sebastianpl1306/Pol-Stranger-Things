<?php
require_once __DIR__.'/../helpers/connectionDB.php';
require_once __DIR__.'/../class/DatoCurioso.php'; 


class ProcesarCrearDato extends Connection {
    function __construct() {
        $this->crear();
    }

   
    function crear() {
        
        $titulo = isset($_POST["titulo"]) ? trim($_POST["titulo"]) : '';
        $descripcion = isset($_POST["descripcion"]) ? trim($_POST["descripcion"]) : '';
        $temporada_id = isset($_POST["temporada_id"]) ? (int)$_POST["temporada_id"] : 0;
        $imagen = isset($_FILES["imagen"]["name"]) ? $_FILES["imagen"]["name"] : '';

        
        if (empty($titulo) || empty($descripcion) || $temporada_id === 0 || empty($imagen)) {
            header('Location: '."../views/form-agregar-dato.php"."?mensaje=".urlencode("Todos los campos son obligatorios."));
            exit();
        }

        
        if (!isset($_FILES["imagen"]) || $_FILES["imagen"]["error"] !== UPLOAD_ERR_OK) {
            header('Location: '."../views/form-agregar-dato.php"."?mensaje=".urlencode("Error al subir la imagen."));
            exit();
        }

        $tipo = $_FILES['imagen']['type'];
        $tamano = $_FILES['imagen']['size'];
        $temp = $_FILES['imagen']['tmp_name'];

      
        $allowed_types = ['image/gif', 'image/jpeg', 'image/jpg', 'image/png'];
        $max_size = 2000000; // 2 MB

        if (!in_array($tipo, $allowed_types) || $tamano > $max_size) {
            header('Location: '."../views/form-agregar-dato.php"."?mensaje=".urlencode("Error: La extensión o el tamaño de la imagen no es correcta. Se permiten archivos .gif, .jpg, .png y de 2 MB como máximo."));
            exit();
        }

       
        $target_dir = '../assets/images/';
        $target_file = $target_dir . basename($imagen);

        if (!move_uploaded_file($temp, $target_file)) {
            
            header('Location: '."../views/form-agregar-dato.php"."?mensaje=".urlencode("Ocurrió un error al subir el fichero. No pudo guardarse."));
            exit();
        }

        $this->connectToDB();
        $conn = $this->get_connection();

        
        $consulta = "INSERT INTO datos_curiosos (titulo, descripcion, imagen, temporada_id) VALUES (?, ?, ?, ?)";
        
        $stmt = mysqli_prepare($conn, $consulta);

        if ($stmt === false) {
            
            header('Location: '."../views/form-agregar-dato.php"."?mensaje=".urlencode("Error interno del servidor al preparar la consulta."));
            exit();
        }

        
        mysqli_stmt_bind_param($stmt, "sssi", $titulo, $descripcion, $imagen, $temporada_id); // s=string, i=integer

        if (mysqli_stmt_execute($stmt)) {
           
            header('Location: '."../views/datos-curiosos.php"."?mensaje=".urlencode("Dato curioso creado con éxito."));
            exit();
        } else {
            
            header('Location: '."../views/form-agregar-dato.php"."?mensaje=".urlencode("Ocurrió un problema al guardar el dato curioso: ".mysqli_error($conn)));
            exit();
        }

        mysqli_stmt_close($stmt);
        $this->closeConnection(); 
    }
}


$procesarDato = new ProcesarCrearDato();
?>