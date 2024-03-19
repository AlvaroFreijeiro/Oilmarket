$(document).ready(function() {
    // Hacer una solicitud AJAX para obtener los productos
    $.ajax({
        url: 'php/productos.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            // Verificar si se recibieron datos correctamente
            if (data.error) {
                // Si hay un error, mostrar el mensaje de error en la consola
                console.error(data.error);
            } else {
                // Si se recibieron los datos correctamente, actualizar la tabla de productos
                var tablaProductos = $('#tabla-productos tbody');

                // Limpiar la tabla 
                tablaProductos.empty();

                // Iterar sobre los datos recibidos y agregarlos a la tabla
                $.each(data, function(index, producto) {
                    tablaProductos.append(
                        '<tr>' +
                            '<th scope="row">' + producto.id_producto + '</th>' +
                            '<td>' + producto.nombre + '</td>' +
                            '<td>' + producto.descripcion + '</td>' +
                            '<td>' + producto.precio + '&euro;</td>' +
                            '<td>' + producto.stock + '</td>' +
                            '<td>' + producto.nombre_proveedor + '</td>' +
                        '</tr>'
                    );
                });
            }
        },
        error: function(xhr, status, error) {
            // Manejar errores de la solicitud AJAX
            console.error('Error al cargar los productos:', error);
        }
    });
});
