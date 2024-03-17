function validarInicioSesion() {
    // Obtener valores del formulario
    var usuario = document.getElementById("usuario").value;
    var contrasena = document.getElementById("contrasena").value;

    // Validar que los campos no estén vacíos
    if (usuario.trim() === "" || contrasena.trim() === "") {
        alert("Por favor, completa todos los campos.");
        return;
    }

    // Enviar el formulario si pasa la validación
    document.getElementById("loginForm").submit();
    // Realizar una solicitud AJAX para validar las credenciales en el servidor
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Respuesta del servidor
            if (xhr.responseText === "OK") {
                // Inicio de sesión exitoso, redirigir al índice
                window.location.href = "../index.html";
            } else {
                // Credenciales incorrectas, mostrar mensaje de error
                alert("Credenciales incorrectas. Inténtalo de nuevo.");
            }
        }
    };

    // Configurar y enviar la solicitud AJAX al servidor
    xhr.open("POST", "../php/login.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("usuario=" + usuario + "&contrasena=" + contrasena);
}

