<?php
echo "
<nav class='navbar bg-primary' data-bs-theme='dark'>
        <div class='container-fluid'>
            <a class='navbar-brand' href='#'>PMS</a>
            <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
            </button>
            <div class='collapse navbar-collapse' id='navbarNav'>
                <ul class='navbar-nav'>
                    <li class='nav-item'>
                        <a class='nav-link' aria-current='page' href='/php-product-manager/dashboard.php'>Dashboard</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='/php-product-manager/users.php'>Users</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='/php-product-manager/products.php'>Products</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='/php-product-manager/categories.php'>Categories</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
";
?>