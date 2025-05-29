function validar(formulario) {
    formulario.addEventListener("submit", function (e) {
      const nombre = document.getElementById("nombre").value.trim();
      const apellido = document.getElementById("apellido").value.trim();
      const correo = document.getElementById("correo").value.trim();
      const clave = document.getElementById("clave").value;
      const confirmar = document.getElementById("confirmar").value;

      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      const soloLetrasRegex = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/;

      let errores = [];

      // Validaciones
      if (nombre === "") {
        errores.push("El nombre es obligatorio.");
      } else if (!soloLetrasRegex.test(nombre)) {
        errores.push("El nombre no debe contener números ni caracteres especiales.");
      }

      if (apellido === "") {
        errores.push("El apellido es obligatorio.");
      } else if (!soloLetrasRegex.test(apellido)) {
        errores.push("El apellido no debe contener números ni caracteres especiales.");
      }

      if (correo === "") {
        errores.push("El correo es obligatorio.");
      } else if (!emailRegex.test(correo)) {
        errores.push("El correo no es válido.");
      }

      if (clave.length < 6) {
        errores.push("La contraseña debe tener al menos 6 caracteres.");
      }

      if (clave !== confirmar) {
        errores.push("Las contraseñas no coinciden.");
      }

      if (errores.length > 0) {
        e.preventDefault();
        alert(errores.join("\n"));
      }
    });
}