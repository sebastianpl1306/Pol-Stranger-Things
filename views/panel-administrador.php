<?php
session_start();

// Verificar si el usuario es administrador
if (!isset($_SESSION["rol"]) || $_SESSION["rol"] != "ADMIN") {
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Panel de Administración - StrangerThings</title>
    <style>
        .admin-card {
            transition: transform 0.3s;
            height: 100%;
        }
        .admin-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }
        .section-title {
            border-left: 5px solid #dc3545;
            padding-left: 10px;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <?php include_once './partials/header.php'; ?>
    
    <div class="shadow-sm py-2 mb-4 bg-black">
      <nav class="container" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <h2 class="font-titulos text-red">Panel de Administración</h2>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../index.php">Inicio</a></li>
          <li class="breadcrumb-item active" aria-current="page">Administración</li>
        </ol>
      </nav>
    </div>

    <section class="container bg-black p-4">
        <!-- Sección de Gestión de Usuarios -->
        <h3 class="text-light section-title">1. Gestión de Usuarios</h3>
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="card admin-card bg-dark text-light">
                    <div class="card-body">
                        <h5 class="card-title">Listado de Usuarios</h5>
                        
                        <!-- Filtros -->
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <select class="form-select bg-secondary text-light">
                                    <option selected>Filtrar por rol</option>
                                    <option value="ADMIN">Administradores</option>
                                    <option value="VISITANT">Visitantes</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control bg-secondary text-light" placeholder="Buscar usuario...">
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-danger w-100">Filtrar</button>
                            </div>
                        </div>
                        
                        <!-- Tabla de usuarios -->
                        <div class="table-responsive">
                            <table class="table table-dark table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Correo</th>
                                        <th>Rol</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <?php
                                include_once __DIR__.'/../controllers/main.php';
                                $controller = new Controller();

                                foreach($controller->mostrar_usuarios() as $usuario){
                                ?>
                                    <tbody>
                                        <!-- Ejemplo de fila - esto debería generarse dinámicamente con PHP -->
                                        <tr>
                                            <td><?php echo $usuario->get_id()?></td>
                                            <td><?php echo $usuario->get_nombre()?></td>
                                            <td><?php echo $usuario->get_apellido()?></td>
                                            <td><?php echo $usuario->get_correo()?></td>
                                            <td><?php echo $usuario->get_rol()?></td>
                                            <td><?php echo $usuario->get_estado()?></td>
                                            <td>
                                                <form action="../controllers/procesar-cambio-estado-usuario.php" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas <?php echo $usuario->get_estado() === 'activo' ? 'desactivar' : 'activar'; ?> este usuario?');">
                                                    <input type="hidden" name="id" value="<?php echo $usuario->get_id(); ?>">
                                                    <input type="hidden" name="estado" value="<?php echo $usuario->get_estado() === 'activo' ? 'inactivo' : 'activo'; ?>">
                                                    <button type="submit" class="btn <?php echo $usuario->get_estado() === 'activo' ? 'btn-warning' : 'btn-success'; ?>"><?php echo $usuario->get_estado() === 'activo' ? 'Desactivar' : 'Activar'; ?></button>
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sección de Gestión de Contenido -->
        <h3 class="text-light section-title">2. Gestión de Contenido</h3>
        <div class="row">
            <!-- Personajes -->
            <div class="col-md-4 mb-4">
                <div class="card admin-card bg-dark text-light">
                    <div class="card-body">
                        <h5 class="card-title">Personajes</h5>
                        <p class="card-text">Administra los personajes de Stranger Things</p>
                        <div class="d-grid gap-2">
                            <a href="personajes.php" class="btn btn-outline-light">Ver todos</a>
                            <a href="form-agregar-personaje.php" class="btn btn-danger">Agregar nuevo</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Monstruos -->
            <div class="col-md-4 mb-4">
                <div class="card admin-card bg-dark text-light">
                    <div class="card-body">
                        <h5 class="card-title">Monstruos</h5>
                        <p class="card-text">Administra los monstruos de la serie</p>
                        <div class="d-grid gap-2">
                            <a href="monstruos.php" class="btn btn-outline-light">Ver todos</a>
                            <a href="form-agregar-monstruo.php" class="btn btn-danger">Agregar nuevo</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Temporadas -->
            <div class="col-md-4 mb-4">
                <div class="card admin-card bg-dark text-light">
                    <div class="card-body">
                        <h5 class="card-title">Temporadas</h5>
                        <p class="card-text">Administra las temporadas y episodios</p>
                        <div class="d-grid gap-2">
                            <a href="temporadas.php" class="btn btn-outline-light">Ver todas</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include_once './partials/footer.php'; ?>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Scripts adicionales para funcionalidad del panel
        $(document).ready(function() {
            // Aquí puedes añadir interacciones con jQuery
        });
    </script>
</body>
</html>