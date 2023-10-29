<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../../assets/css/styles.css">
</head>

<body>

    <h1>Products</h1>

    <ul class="list">
        <?php
        require_once('../../class/autoload.php');
        $db = new Database();
        $product = new Products($db);
        $products = $product->selectAll();
        var_dump($products);

        foreach ($products as $product) {
            echo "<li>{$product['name']} - Category: {$product['category_name']} - Price: {$product['price']}</li>";
        }
        ?>
    </ul>

    <div class="buttons">
        <a href="products.html" class="add-button">Add Product</a>
    </div>

    <p class="centered">Created and designed by: Marcelo Dueñas</p>
</body>

</html>