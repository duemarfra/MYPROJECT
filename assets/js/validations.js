$(document).ready(function () {
    $('#saveButtonCategory').on('click', function (e) {
        e.preventDefault();
        var categoryName = $('#categoryName').val();

        if (categoryName.trim() === '') {
            alert('The category field cannot be empty.');
        } else {
            $('form').submit();
        }
    });

    $('#saveButtonProduct').on('click', function (e) {
        e.preventDefault();
        var productName = $('#productName').val();
        var productPrice = $('#productPrice').val();

        if (productName.trim() === '') {
            alert('The product field cannot be empty.');
        } else {
            if (isNaN(productPrice) || productPrice <= 0) {
                alert('Please enter a valid and positive product price.');
            } else {
                $('form').submit();
            }
        }
    });
});
