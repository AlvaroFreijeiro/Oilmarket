// Realizar una solicitud AJAX para obtener el mensaje de inicio de sesión
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("mensajeSesion").innerHTML = this.responseText;
    }
};
xhttp.open("GET", "php/verificar_sesion.php", true);
xhttp.send();
