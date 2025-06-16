<?php
session_start();

require_once __DIR__.'/../class/DatoCurioso.php'; 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>StrangerThings - Datos Curiosos</title>
</head>
<body>
    <?php include_once './partials/header.php'; ?>
    
    <section class="container mt-4 text-dark"> 
        <h2 class="mb-4">Lista de Datos Curiosos</h2> 
        <article class="col-12 text-end mb-4"> 
            <?php 
            if(isset($_SESSION["rol"]) && $_SESSION["rol"] === "ADMIN") { 
            ?>
                <a href="form-agregar-dato.php" class="btn btn-primary">Agregar Nuevo Dato Curioso</a>
            <?php } ?>
        </article>
        
        <?php
        if (isset($_SESSION['mensaje'])) {
            $alert_class = $_SESSION['tipo_mensaje'] === 'success' ? 'alert-success' : 'alert-danger';
            echo '<div class="alert '.$alert_class.' alert-dismissible fade show" role="alert">';
            echo htmlspecialchars($_SESSION['mensaje']); 
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo '</div>';
            
            unset($_SESSION['mensaje']);
            unset($_SESSION['tipo_mensaje']);
        }
        
        $datoModel = new DatoCurioso();
        $datos = $datoModel->obtener_todos();
        
        if (!empty($datos)) {
            echo '<div class="row">'; 
            foreach($datos as $dato) {
        ?>
                <article class="col-md-6 mb-4"> 
                    <div class="card h-100"> 
                        <div class="row g-0"> 
                            <div class="col-md-4">
                                <img src="../assets/images/<?php echo htmlspecialchars($dato->getImagen()); ?>" 
                                     alt="Imagen de <?php echo htmlspecialchars($dato->getTitulo()); ?>" 
                                     class="img-fluid rounded-start h-100 object-fit-cover" style="max-height: 200px; width: 100%;"> 
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo htmlspecialchars($dato->getTitulo()); ?></h5>
                                    <p class="card-text text-muted small">Temporada: <?php echo htmlspecialchars($dato->getTemporadaId()); ?></p>
                                    <p class="card-text description-truncate"><?php echo nl2br(htmlspecialchars($dato->getDescripcion())); ?></p>
                                    <?php if(isset($_SESSION["rol"]) && $_SESSION["rol"] === "ADMIN") { ?>
                                        <div class="mt-3">
                                            <a href="form-editar-dato.php?id=<?php echo htmlspecialchars($dato->getId()); ?>" class="btn btn-sm btn-warning">Editar</a>
                                            <a href="../controllers/procesar_eliminar_dato.php?id=<?php echo htmlspecialchars($dato->getId()); ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este dato curioso?');">Eliminar</a>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
        <?php
            }
            echo '</div>'; 
        } else {
            echo '<div class="alert alert-info text-center" role="alert">No hay datos curiosos disponibles en este momento.</div>';
        }
        ?>
    </section>

    <?php include_once './partials/footer.php'; ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>