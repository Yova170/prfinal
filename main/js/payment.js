// payment.js

// Esta función se encarga de actualizar los montos mostrados en la página
function actualizarMontos(subtotal, iva, total) {
    document.getElementById('subtotalAmount').textContent = subtotal.toFixed(2);
    document.getElementById('ivaAmount').textContent = iva.toFixed(2);
    document.getElementById('totalAmount').textContent = total.toFixed(2);
    document.getElementById('totalAmountDisplay').textContent = 'Total: $' + total.toFixed(2);
}

// Esta función se llama cuando se hace clic en el botón de pago
function realizarPago() {

    alert('Pago realizado con éxito. ¡Gracias por su compra!');
    
    // Redireccionar a la página de factura
    window.location.href = 'factura.php'; // Ajusta la URL según tu estructura de archivos
}

// Esta función se llama cuando se carga la página
$(document).ready(function() {
    // Aquí puedes agregar cualquier lógica adicional que necesites al cargar la página

    // Ejemplo: Obtener los detalles de la compra desde PHP
    var detallesCompra = json_encode($detallesCompra); 
    
    // Actualizar montos en la página
    actualizarMontos(detallesCompra.subtotal, detallesCompra.iva, detallesCompra.total);
});
