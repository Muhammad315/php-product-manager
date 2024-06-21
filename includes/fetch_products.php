<?php
include 'db.php';

if (isset($_GET['category_id'])) {
    $categoryId = $_GET['category_id'];
    $productsSql = "SELECT name, price FROM products WHERE category_id = $categoryId";
    $productsResult = $conn->query($productsSql);

    if ($productsResult->num_rows > 0) {
        echo '<ul class="list-group">';
        while ($product = $productsResult->fetch_assoc()) {
            echo '<li class="list-group-item">';
            echo '<strong>' . $product['name'] . '</strong>';
            echo '<span class="float-right">PKR ' . number_format($product['price'], 2) . '</span>';
            echo '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p>No products found for this category.</p>';
    }
}
?>
