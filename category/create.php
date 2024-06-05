<?php
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header('Location: ../login.php');
    exit;
}

$c_name = "";

$errorMessage = "";
$successMessage = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $c_name = $_POST["category_name"];

    do{
        if(empty($c_name)){
            $errorMessage = "All the fields are required";
            break;
        }

        include '../db.php';

        $sql = "INSERT INTO categories (name)
        VALUES ('$c_name')";

        $result = $conn->query($sql);

        if(!$result){
            $errorMessage = "Invalid Query: " . $conn->error;
            break;
        }

        $c_name = "";

        $successMessage = "Category Added Successfully";

        header("location: ../categories.php");
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
    <title>PMS | Add Category</title>
</head>
<body>
    <div class="container my-5">
        <h2>Add Category</h2>
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
            <div class="row mb-3">
                <label for="category_name" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" name="category_name" id="category_name" class="form-control" value="<?php echo $c_name; ?>">
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
                    <a href="../categories.php" class="btn btn-outline-primary" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>