<?php
$name = "";
$email = "";
$password = "";
$companyName = "";
$phone = "";
$country = "";
$companyType = "";
$paymentMethod = [];

$errorMessage = "";
$successMessage = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $companyName = $_POST["companyName"];
    $phone = $_POST["phone"];
    $country = $_POST["countries"];
    $companyType = $_POST["companyType"];
    $paymentMethod = implode(", ", $_POST["paymentMethod"]);

    do{
        if(empty($name) || empty($email) || empty($password) || empty($companyName) || empty($phone) || empty($country) || empty($companyType) || empty($paymentMethod)){
            $errorMessage = "All the fields are required";
            break;
        }

        include 'db.php';

        $sql = "INSERT INTO users (name, email, password, companyName, phone, country, companyType, paymentMethod, role)
        VALUES ('$name', '$email', '$password', '$companyName', '$phone', '$country', '$companyType', '$paymentMethod', 'user')";

        $result = $conn->query($sql);

        if(!$result){
            $errorMessage = "Invalid Query: " . $conn->error;
            break;
        }

        $name = "";
        $email = "";
        $password = "";
        $companyName = "";
        $phone = "";
        $country = "";
        $companyType = "";
        $paymentMethod = [];

        $successMessage = "Registered Successfully";

        header("location: login.php");
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
    <link rel="stylesheet" href="general.css">
    <title>PMS | Sign Up</title>
</head>
<body>
    <div class="container my-5">
        <h2>Sign Up</h2>
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
                <label for="name" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" name="name" id="name" class="form-control" value="<?php echo $name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="email" name="email" id="email" class="form-control" value="<?php echo $email; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="password" class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-6">
                    <input type="password" name="password" id="password" class="form-control" value="<?php echo $password; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="companyName" class="col-sm-3 col-form-label">Company Name</label>
                <div class="col-sm-6">
                    <input type="text" name="companyName" id="companyName" class="form-control" value="<?php echo $companyName; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                <div class="col-sm-6">
                    <input type="tel" name="phone" id="phone" class="form-control" value="<?php echo $phone; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="countries" class="col-sm-3 col-form-label">Country</label>
                <div class="col-sm-6">
                    <select name="countries" id="countries" class="form-control">
                        <option value="" disabled selected>Select Country</option>
                        <?php
                            $countries = ['China', 'India', 'Japan', 'South Korea', 'Indonesia', 'Pakistan', 'Bangladesh', 'Vietnam', 'Philippines', 'Thailand', 'Turkey', 'Iran', 'Iraq', 'Saudi Arabia', 'Malaysia'];
                            foreach ($countries as $countryOption) {
                                echo "<option value='$countryOption' " . ($country === $countryOption ? 'selected' : '') . ">$countryOption</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="companyType" class="col-sm-3 col-form-label">Company Type</label>
                <div class="col-sm-6">
                    <div class="form-check">
                        <input type="radio" name="companyType" id="hospitality" class="form-check-input" value="hospitality" <?php echo ($companyType === 'hospitality') ? 'checked' : ''; ?>>
                        <label for="hospitality" class="form-check-label">Hospitality</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="companyType" id="retail" class="form-check-input" value="retail" <?php echo ($companyType === 'retail') ? 'checked' : ''; ?>>
                        <label for="retail" class="form-check-label">Retail</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="companyType" id="service-based" class="form-check-input" value="service-based" <?php echo ($companyType === 'service-based') ? 'checked' : ''; ?>>
                        <label for="service-based" class="form-check-label">Service</label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="paymentMethod" class="col-sm-3 col-form-label">Payment Method</label>
                <div class="col-sm-6">
                    <div class="form-check">
                        <input type="checkbox" name="paymentMethod[]" id="cash" class="form-check-input" value="cash" <?php echo (in_array('cash', $paymentMethod)) ? 'checked' : ''; ?>>
                        <label for="cash" class="form-check-label">Cash</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="paymentMethod[]" id="cheque" class="form-check-input" value="cheque" <?php echo (in_array('cheque', $paymentMethod)) ? 'checked' : ''; ?>>
                        <label for="cheque" class="form-check-label">Cheque</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="paymentMethod[]" id="credit-card" class="form-check-input" value="credit-card" <?php echo (in_array('credit-card', $paymentMethod)) ? 'checked' : ''; ?>>
                        <label for="credit-card" class="form-check-label">Credit Card</label>
                    </div>
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
                    <a href="index.php" class="btn btn-outline-primary" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
