$(document).ready(function () {
    function calcularTotal() {
        // Obtener el subtotal desde algún lugar (por ejemplo, un carrito de compras)
        var subtotal = 732.50; // Cambia esto según tus necesidades

        // Obtener el valor del IVA desde la base de datos mediante una solicitud AJAX
        $.ajax({
            url: '../config/obtener_iva.php', // Crea este archivo para obtener el valor del IVA
            type: 'GET',
            success: function (data) {
                var iva = subtotal * (parseFloat(data) / 100);

                // Calcular el total
                var total = subtotal + iva;

                // Mostrar los resultados en los campos de texto
                document.getElementById('subtotal').innerHTML = '$' + subtotal.toFixed(2);
                document.getElementById('iva').innerHTML = '$' + iva.toFixed(2);
                document.getElementById('total').innerHTML = '$' + total.toFixed(2);
            },
            error: function () {
                console.log('Error al obtener el valor del IVA.');
            }
        });
    }

    // Llama a la función calcularTotal cuando se cargue la página
    calcularTotal();
});
