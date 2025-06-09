<footer class="bg-dark text-light pt-4 pb-2 mt-5">
    <div class="container">
    <div class="row">
        <!-- Sección del blog -->
        <div class="col-md-4">
        <h5 class="text-danger">Stranger Blog</h5>
        <p>Un espacio dedicado a teorías, personajes y misterios del universo de Stranger Things.</p>
        </div>

        <!-- Enlaces útiles -->
        <div class="col-md-4">
        <h5 class="text-danger">Enlaces</h5>
        <ul class="list-unstyled">
            <li><a href="<?php echo BASE_URL; ?>" class="text-light text-decoration-none">Inicio</a></li>
            <li><a href="<?php echo BASE_URL; ?>views/personajes.php" class="text-light text-decoration-none">Personajes</a></li>
            <li><a href="<?php echo BASE_URL; ?>views/monstruos.php" class="text-light text-decoration-none">Monstruos</a></li>
            <li><a href="<?php echo BASE_URL; ?>views/temporadas.php" class="text-light text-decoration-none">Temporadas</a></li>
        </ul>
        </div>

        <!-- Redes sociales -->
        <div class="col-md-4">
        <h5 class="text-danger">Desarrolladores</h5>
            <a href="https://github.com/sebastianpl1306/Pol-Stranger-Things" class="text-light me-2" target="_blank"><i class="bi bi-facebook"></i> Proyecto Github</a><br>
            <a href="<?php echo BASE_URL; ?>views/creditos.php" class="text-light me-2"><i class="bi bi-facebook"></i> Créditos</a><br>
        </div>
    </div>

    <!-- Línea separadora -->
    <hr class="border-light">

    <!-- Créditos -->
    <div class="text-center">
        <p class="mb-0">&copy; <?php echo date('Y'); ?> Stranger Blog. Proyecto estudiantil.</p>
    </div>
    </div>
</footer>