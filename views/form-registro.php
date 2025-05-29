<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>StrangerThings</title>
</head>
<body>
    <?php include_once './partials/header.php'; ?>
    <section class="text-light py-2 container-auth">
        
        <div class="container-form">
          <h2 class="mb-4">Registro</h2>
          <?php if (isset($_GET['mensaje'])) { ?>
            <div class="w-100 border border border-danger rounded p-3 mb-2 text-red"><?php echo $_GET['mensaje']?></div>
          <?php } ?>
          <form action="../controllers/procesar_registro.php" class="row g-3" method="POST">
              <div class="col-md-6">
                  <label for="nombre" class="form-label">Nombres:</label>
                  <input type="text" class="form-control" id="nombre" name="nombre">
              </div>
              <div class="col-md-6">
                  <label for="apellido" class="form-label">Apellidos:</label>
                  <input type="text" class="form-control" id="apellido" name="apellido">
              </div>
              <div class="col-12">
                  <label for="correo" class="form-label">Correo</label>
                  <input type="email" class="form-control" id="correo" name="correo">
              </div>
              <div class="col-md-6">
                  <label for="clave" class="form-label">Contraseña:</label>
                  <input type="password" class="form-control" id="clave" name="clave">
              </div>
              <div class="col-md-6">
                  <label for="confirmar" class="form-label">Confirmar Contraseña:</label>
                  <input type="password" class="form-control" id="confirmar" name="confirmar">
              </div>
              <div class="col-12 d-flex justify-content-center flex-column">
                  <button type="submit" class="btn btn-success" onclick="return validar(this.form)">Registrarme</button>
                  <a href="form-inicio-sesion.php" class="text-center mt-4">Ya tienes una cuenta?</a>
              </div>
          </form>
        </div>
    </section>
    <footer class="container-fluid text-light bg-dark py-2 fixed-bottom">
        <div class="row">
            <p class="col-12 text-center">desarrollado por: Sebastian Pabon Lopez</p>
        </div>
    </footer>
    <script src="../assets/js/validarRegistro.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>