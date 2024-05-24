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
    <title>Admin Login</title>
</head>

<body>
    <div class="card">
        <h2 class="text-center text-white">Admin Login</h2>
        <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                include 'db.php';
                $username = $_POST['username'];
                $password = $_POST['password'];

                $sql = "SELECT * FROM users WHERE name = '$username' AND password = '$password' LIMIT 1";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    header("Location: dashboard.php");
                    exit();
                } else {
                    echo "<div class='alert alert-danger'>Invalid credentials</div>";
                }
            }
        ?>
        <form method="post" action="">
            <div class="mb-3">
                <label for="username" class="form-label text-white">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label text-white">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</body>

</html>
