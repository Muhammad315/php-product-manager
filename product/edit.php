<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header('Location: ../login.php');
    exit;
}

$p_id =  "";
$p_name = "";
$p_price = "";
$p_category = "";

$errorMessage = "";
$successMessage= "";

include '../db.php';

if($_SERVER['REQUEST_METHOD'] == 'GET'){

    if(!isset($_GET['id'])){
        header("location: ../dashboard.php");
        exit;
    }

    $p_id = $_GET['id'];


    $sql = "SELECT * FROM products WHERE id = $p_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if(!$row){
        header("location: ../dashboard.php");
        exit;
    }

    $p_name = $row['name'];
    $p_price = $row['price'];
    $p_category = $row['category_id'];


}else{

    $p_id = $_POST['product_id'];
    $p_name = $_POST['product_name'];
    $p_price = $_POST['product_price'];
    $p_category = $_POST['categories'];

    do{
        if(empty($p_name) || empty($p_price) || empty($p_category)){
            $errorMessage = "All the fields are required";
            break;
        }

        $sql = "UPDATE products SET name = '$p_name', price = '$p_price', category_id = '$p_category' WHERE id = $p_id";

        $result = $conn->query($sql);

        if(!$result){
            $errorMessage = "Invalid query: " . $conn->error;
        }

        $successMessage = "Product Updated Successfully";

        header("location: ../products.php");
        exit;

    }while(false);
        
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../general.css">
    <title>PMS | Update Product</title>
</head>
<body>
    <div class="container my-5">
        <h2>Update Prodeuct</h2>
        <?php
        if(!empty($errorMessage)){
            echo "
                        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                            <strong>$errorMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
            ";
        }
        ?>

        <form method="post">
            <input type="hidden" name="product_id" value="<?php echo $p_id; ?>">
            <div class="row mb-3">
                <label for="product_name" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" name="product_name" id="product_name" class="form-control" value="<?php echo $p_name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="product_price" class="col-sm-3 col-form-label">Price</label>
                <div class="col-sm-6">
                    <input type="number" name="product_price" id="product_price" class="form-control" min=0 value="<?php echo $p_price; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="product_category" class="col-sm-3 col-form-label">Category</label>
                <div class="col-sm-6">
                    <select name="categories" id="categories" class="form-control">
                        <option value="<?php echo $p_category; ?>" selected>Select Category</option>
                        <?php
                            include '../db.php';

                            $sql = "SELECT * FROM categories";
                            $result = $conn->query($sql);
                            if(!$result){
                                die("Invalid Query: " . $$conn->error);
                            }
                            if($result->num_rows > 0){
                                while($row = $result->fetch_assoc()){
                                    echo "<option value=$row[id]>$row[name]</option>";
                                }
                            } else {
                                echo "<option value=''>No categories found</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>

            <?php
            if(!empty($successMessage)){
                echo "
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    </div>
                </div>
                ";
            }
            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a href="../products.php" class="btn btn-outline-primary" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>