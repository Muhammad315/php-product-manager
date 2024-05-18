<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>PMS | Admin Dashboard</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="container my-5">
        <a href="/php-product-manager/category/create.php" class="btn btn-primary">Add Category</a><br>
        <h2>List of Categories</h2>
        <table class="table table-responsive table-info table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include 'db.php';
                    
                    $sql="SELECT * FROM categories";
                    $result=$conn->query($sql);

                    if(!$result){
                        die("Invalid Query: " . $$conn->error);
                    }

                    while($row = $result->fetch_assoc()){
                        echo "
                        <tr>
                            <td>$row[id]</td>
                            <td>$row[name]</td>
                            <td>
                                <a class='btn btn-primary btn-sm' href='/php-product-manager/category/edit.php?id=$row[id]'>Edit</a>
                                <a class='btn btn-primary btn-sm' href='/php-product-manager/category/delete.php?id=$row[id]'>Delete</a>
                            </td>
                        </tr>
                        ";
                    }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>