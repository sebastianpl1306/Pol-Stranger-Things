<?php
session_start();

// Verificar si el usuario es administrador
if (!isset($_SESSION["rol"]) || $_SESSION["rol"] != "ADMIN") {
    header("Location: ../index.php");
    exit();
}

require_once '../class/ReporteAdmin.php';

$reporte = new ReporteAdmin();

$totalUsuarios = $reporte->obtener_total_usuarios();
$totalPersonajes = $reporte->obtener_total_personajes();
$totalMonstruos = $reporte->obtener_total_monstruos();
$totalTemporadas = $reporte->obtener_total_temporadas();
$totalFavoritos = $reporte->obtener_total_favoritos();
$monstruosPopulares = $reporte->obtener_monstruos_mas_populares();
$personajesPopulares = $reporte->obtener_personajes_mas_populares();
$temporadasPopulares = $reporte->obtener_temporadas_mas_populares();

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
        <h2 class="font-titulos text-red">Reportes</h2>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../index.php">Inicio</a></li>
          <li class="breadcrumb-item active" aria-current="page">Reportes</li>
        </ol>
      </nav>
    </div>

    <section class="container bg-black p-4 text-white">
        <div class="section-title">
            <h3 class="text-white">Resumen General</h3>
        </div>
        <div class="row g-4 mb-4">
            <div class="col-md-4">
                <div class="card bg-dark text-white admin-card">
                    <div class="card-body">
                        <h5 class="card-title">Usuarios</h5>
                        <p class="card-text display-6"><?= $totalUsuarios ?? '0' ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-dark text-white admin-card">
                    <div class="card-body">
                        <h5 class="card-title">Personajes</h5>
                        <p class="card-text display-6"><?= $totalPersonajes ?? '0' ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-dark text-white admin-card">
                    <div class="card-body">
                        <h5 class="card-title">Monstruos</h5>
                        <p class="card-text display-6"><?= $totalMonstruos ?? '0' ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-dark text-white admin-card">
                    <div class="card-body">
                        <h5 class="card-title">Temporadas</h5>
                        <p class="card-text display-6"><?= $totalTemporadas ?? '0' ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-title">
            <h3 class="text-white">Estadísticas de Popularidad</h3>
        </div>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card bg-dark text-white admin-card">
                    <div class="card-body">
                        <h5 class="card-title">Personajes más populares</h5>
                        <ul class="list-group list-group-flush bg-dark">
                            <?php foreach ($personajesPopulares ?? [] as $personaje): ?>
                                <li class="list-group-item bg-dark text-white d-flex justify-content-between">
                                    <?= htmlspecialchars($personaje['nombre']) ?>
                                    <span class="badge bg-danger"><?= $personaje['visitas'] ?> visitas</span>
                                </li>
                            <?php endforeach; ?>
                            <?php if (empty($personajesPopulares)): ?>
                                <li class="list-group-item bg-dark text-white">No hay datos disponibles.</li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card bg-dark text-white admin-card">
                    <div class="card-body">
                        <h5 class="card-title">Monstruos más populares</h5>
                        <ul class="list-group list-group-flush bg-dark">
                            <?php foreach ($monstruosPopulares ?? [] as $monstruo): ?>
                                <li class="list-group-item bg-dark text-white d-flex justify-content-between">
                                    <?= htmlspecialchars($monstruo['nombre']) ?>
                                    <span class="badge bg-danger"><?= $monstruo['visitas'] ?> visitas</span>
                                </li>
                            <?php endforeach; ?>
                            <?php if (empty($monstruosPopulares)): ?>
                                <li class="list-group-item bg-dark text-white">No hay datos disponibles.</li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mt-4">
            <div class="col-md-6">
                <div class="card bg-dark text-white admin-card p-3">
                    <h5 class="card-title">Gráfico: Personajes más populares</h5>
                    <canvas id="chartPersonajes"></canvas>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card bg-dark text-white admin-card p-3">
                    <h5 class="card-title">Gráfico: Monstruos más populares</h5>
                    <canvas id="chartMonstruos"></canvas>
                </div>
            </div>
        </div>

        <div class="section-title mt-5">
            <h3 class="text-white">Actividad del Blog</h3>
        </div>
        <div class="row g-4 mb-4">
            <div class="col-md-6">
                <div class="card bg-dark text-white admin-card">
                    <div class="card-body">
                        <h5 class="card-title">Favoritos Totales</h5>
                        <p class="card-text display-6"><?= $totalFavoritos ?? '0' ?></p>
                    </div>
                </div>
            </div>
            <!-- Agrega más estadísticas aquí si lo necesitas -->
        </div>
    </section>

    <?php include_once './partials/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Scripts adicionales para funcionalidad del panel
        $(document).ready(function() {
            // Aquí puedes añadir interacciones con jQuery
        });
    </script>
    <script>
        // Pasar datos PHP a JS
        const personajesLabels = <?= json_encode(array_column($personajesPopulares ?? [], 'nombre')) ?>;
        const personajesData = <?= json_encode(array_column($personajesPopulares ?? [], 'visitas')) ?>;

        const monstruosLabels = <?= json_encode(array_column($monstruosPopulares ?? [], 'nombre')) ?>;
        const monstruosData = <?= json_encode(array_column($monstruosPopulares ?? [], 'visitas')) ?>;

        // Gráfico de personajes populares
        new Chart(document.getElementById('chartPersonajes'), {
            type: 'bar',
            data: {
                labels: personajesLabels,
                datasets: [{
                    label: 'Visitas',
                    data: personajesData,
                    backgroundColor: 'rgba(220, 53, 69, 0.7)',
                    borderColor: 'rgba(220, 53, 69, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y',
                scales: {
                    x: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Gráfico de monstruos populares
        new Chart(document.getElementById('chartMonstruos'), {
            type: 'bar',
            data: {
                labels: monstruosLabels,
                datasets: [{
                    label: 'Visitas',
                    data: monstruosData,
                    backgroundColor: 'rgba(255, 193, 7, 0.7)',
                    borderColor: 'rgba(255, 193, 7, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y',
                scales: {
                    x: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>