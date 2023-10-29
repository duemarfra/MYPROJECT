<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('../class/autoload.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['categoryName'])) {
        $db = new Database();
        $category_name = $_POST['categoryName'];

        $category = new Categories($db);
        $result = $category->insert($category_name);

        if ($result) {
            echo "Successfully created category.";
        } else {
            echo "Error creating category.";
        }
    }
}
