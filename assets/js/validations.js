$(document).ready(function () {
    $('#saveButton').on('click', function (e) {
        e.preventDefault(); // Prevenir el envío del formulario

        // Obtener el valor del campo de nombre del producto o categoría
        var fieldValue = '';

        if ($('#productName').length) {
            fieldValue = $('#productName').val(); // Para productos
        } else if ($('#categoryName').length) {
            fieldValue = $('#categoryName').val(); // Para categorías
        }

        // Realizar la validación
        if (fieldValue.trim() === '') {
            alert('El campo no puede estar vacío. Por favor, completa el campo.');
        } else {
            // Enviar el formulario si todas las validaciones pasan
            $('form').submit();
        }
    });
});
