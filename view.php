<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'user') {
    header('Location: login.php');
    exit;
}

include 'db.php';

$categoriesSql = "SELECT * FROM categories";
$categoriesResult = $conn->query($categoriesSql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="general.css">
    <title>PMS | Home</title>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Product Management System</h2>
        <p>Welcome, <?php echo $_SESSION['username']; ?>!</p>
        <a href="logout.php" class="btn btn-danger mb-4">Logout</a>
        <div class="row mt-4">
            <div class="col-md-4">
                <h4>Categories</h4>
                <ul class="list-group">
                    <?php while ($category = $categoriesResult->fetch_assoc()) { ?>
                        <li class="list-group-item">
                            <a href="#" class="category-link" data-id="<?php echo $category['id']; ?>">
                                <?php echo $category['name']; ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-md-8">
                <h4>Products</h4>
                <div id="products">
                    <p>Select a category to view products.</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.category-link').click(function(event) {
                event.preventDefault();
                var categoryId = $(this).data('id');

                $.ajax({
                    url: 'fetch_products.php',
                    method: 'GET',
                    data: { category_id: categoryId },
                    success: function(data) {
                        $('#products').html(data);
                    }
                });
            });
        });
    </script>
</body>
</html>

<?php $conn->close(); ?>
