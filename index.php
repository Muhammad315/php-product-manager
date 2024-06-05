<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: url('login-background.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        .card {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 2rem;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
    <title>PMS</title>
</head>

<body>
    <div class="card p-4">
        <h2 class="text-center text-white mb-4">Product Management System</h2>
        <div class="d-flex justify-content-between">
            <a href="/php-product-manager/signup.php" class="btn btn-primary w-45">Sign Up</a>
            <a href="/php-product-manager/login.php" class="btn btn-primary w-45">Login</a>
        </div>
    </div>
</body>

</html>