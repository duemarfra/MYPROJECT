<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('../class/autoload.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['productName']) && isset($_POST['productCategory']) && isset($_POST['productPrice'])) {
        $db = new Database();
        $product_name = $_POST['productName'];
        $product_category = $_POST['productCategory'];
        $product_price = $_POST['productPrice'];

        $category = new Categories($db);
        $category_id = $category->findOrCreate($product_category);

        $product = new Products($db);
        $result = $product->insert($product_name, $product_price, $category_id);

        if ($result) {
            echo "Successfully created product.";
        } else {
            echo "Error creating product.";
        }
    }
}
