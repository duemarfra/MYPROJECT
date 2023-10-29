<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../../assets/css/styles.css">
</head>

<body>

    <h1>Categories</h1>

    <ul class="list">
        <?php
        require_once('../../class/autoload.php');
        $db = new Database();
        $category = new Categories($db);
        $categories = $category->selectAll();
        var_dump($categories);

        foreach ($categories as $category) {
            echo "<li>{$category['name']}</li>";
        }
        ?>
    </ul>

    <div class="buttons">
        <a href="categories.html" class="add-button">Add Category</a>
    </div>

    <p class="centered">Created and designed by: Marcelo Dueñas</p>
</body>

</html>