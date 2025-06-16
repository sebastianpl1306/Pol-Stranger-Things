<?php
// Debe estar al principio del archivo, antes de cualquier output

define('BASE_URL', '/Pol-Stranger-Things/');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>
<body>
<header class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="font-size: 1.8rem; font-family: 'Bebas Neue', 'Arial Narrow', sans-serif; letter-spacing: 1px;">
                <span class="text-light">FAN </span><span class="text-danger">THINGS</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo BASE_URL; ?>">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo BASE_URL; ?>views/personajes.php">Personajes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo BASE_URL; ?>views/monstruos.php">Monstruos</a>
                    </li>
                    <?php if(isset($_SESSION["rol"]) && ($_SESSION["rol"] == "VISITANT" || $_SESSION["rol"] == "ADMIN")): ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo BASE_URL; ?>views/temporadas.php">Temporadas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo BASE_URL; ?>views/datos-curiosos.php">Curiosidades</a>
                    </li>
                    <?php endif; ?>
                </ul>
                <div class="d-flex align-items-center">
                    <?php if(isset($_SESSION["rol"]) && ($_SESSION["rol"] == "VISITANT" || $_SESSION["rol"] == "ADMIN")): ?>
                        <span class="text-light me-3"><?php echo htmlspecialchars($_SESSION["nombre"]); ?></span>
                        
                        <div class="dropdown">
                            <button class="btn btn-outline-light dropdown-toggle" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo ($_SESSION["rol"] == "ADMIN") ? 'Administrador' : 'Perfil'; ?>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end bg-dark" aria-labelledby="profileDropdown">
                            <?php if ($_SESSION["rol"] == "ADMIN"): ?>
                                <li><a class="dropdown-item text-light bg-dark" href="<?php echo BASE_URL; ?>views/panel-administrador.php">Panel de Administración</a></li>
                                <li><a class="dropdown-item text-light bg-dark" href="<?php echo BASE_URL; ?>views/reportes.php">Panel de Reportes</a></li>
                                <li><hr class="dropdown-divider bg-secondary"></li>
                                    <?php endif; ?>
                                    <li><a class="dropdown-item text-light bg-dark" href="<?php echo BASE_URL; ?>views/perfil.php">Ver Perfil</a></li>
                                    <li><a class="dropdown-item text-light bg-dark" href="<?php echo BASE_URL; ?>views/editar_perfil.php">Editar Perfil</a></li>
                                    <li><a class="dropdown-item text-light bg-dark" href="<?php echo BASE_URL; ?>views/cambiar_password.php">Cambiar Contraseña</a></li>
                                    <li><hr class="dropdown-divider bg-secondary"></li>
                                    <li><a class="dropdown-item text-light bg-dark" href="<?php echo BASE_URL; ?>controllers/cerrar_sesion.php?SID=<?php echo $_SESSION["idSession"]; ?>">Cerrar Sesión</a></li>
                            </ul>
                        </div>
                        <div>
                        <?php else: ?>
                            <a class="btn btn-outline-light me-2" href="<?php echo BASE_URL; ?>views/form-inicio-sesion.php">Iniciar Sesión</a>
                            <a class="btn btn-danger" href="<?php echo BASE_URL; ?>views/form-registro.php">Registrarme</a>
                        <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
</header>