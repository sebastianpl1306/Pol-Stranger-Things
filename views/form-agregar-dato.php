<?php
session_start();


if (!isset($_SESSION["rol"]) || $_SESSION["rol"] !== "ADMIN") { 
    header("Location: ../index.php");
    exit();
}


?>
<!DOCTYPE html>
<html lang="es"> <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>StrangerThings - Agregar Dato Curioso</title> </head>
<body>
    <?php include_once './partials/header.php'; ?>
    
    <section class="container my-5">
        <h2 class="mb-4">Agregar Nuevo Dato Curioso</h2> <?php
      
        if (isset($_SESSION['mensaje'])) {
            $alert_class = $_SESSION['tipo_mensaje'] === 'success' ? 'alert-success' : 'alert-danger';
            echo '<div class="alert ' . $alert_class . ' alert-dismissible fade show" role="alert">';
            echo htmlspecialchars($_SESSION['mensaje']); 
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo '</div>';
            
            unset($_SESSION['mensaje']);
            unset($_SESSION['tipo_mensaje']);
        }
        ?>
        
        <form action="../controllers/procesar-crear-dato.php" method="POST" enctype="multipart/form-data" class="mt-4">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" class="form-control" id="titulo" name="titulo" required 
                       value="<?php echo isset($_SESSION['form_data']['titulo']) ? htmlspecialchars($_SESSION['form_data']['titulo']) : ''; ?>">
                </div>
            
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="5" required>
<?php echo isset($_SESSION['form_data']['descripcion']) ? htmlspecialchars($_SESSION['form_data']['descripcion']) : ''; ?></textarea>
            </div>
            
            <div class="mb-3">
                <label for="temporada_id" class="form-label">Temporada:</label>
                <select class="form-select" id="temporada_id" name="temporada_id" required>
                    <option value="">Seleccione una temporada</option>
                    <?php
                    
                    $temporadas = [1, 2, 3, 4]; 
                    foreach ($temporadas as $temp) {
                        $selected = (isset($_SESSION['form_data']['temporada_id']) && $_SESSION['form_data']['temporada_id'] == $temp) ? 'selected' : '';
                        echo '<option value="'.$temp.'" '.$selected.'>Temporada '.$temp.'</option>';
                    }

                    ?>
                </select>
            </div>
            
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen:</label>
                <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" required>
                <div class="form-text">Formatos permitidos: JPG, JPEG, PNG, GIF. Tamaño máximo: 2MB.</div>
            </div>
            
            <button type="submit" class="btn btn-primary">Guardar Dato Curioso</button>
            <a href="datos-curiosos.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </section>
    
    <?php include_once './partials/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>