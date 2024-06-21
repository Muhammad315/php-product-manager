# PHP Product Manager

PHP Product Manager is a web application designed to manage user profiles, products, and categories using PHP and MySQL. It provides functionalities for user registration, login, product management, category management, and admin dashboard features.

## Table of Contents

- [File Structure](#file-structure)
- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)

## File Structure

```structure
php-product-manager/
│
├── assets/
│   ├── images/
│   │   └── login-background.jpg
│   ├── css/
│   │   └── general.css
│   └── js/
│       └── script.js
│
├── components/
│   ├── user/
│   │   ├── create.php
│   │   ├── delete.php
│   │   ├── edit.php
│   │
│   ├── product/
│   │   ├── create.php
│   │   ├── delete.php
│   │   ├── edit.php
│   │
│   ├── category/
│   │   ├── create.php
│   │   ├── delete.php
│   │   ├── edit.php
│
├── database/
│   └── pms_db_php
│
├── includes/
│   ├── db.php
│   ├── fetch_products.php
│   └── header.php
│
├── index.php
├── login.php
├── logout.php
├── signup.php
├── users.php
├── products.php
├── categories.php
├── view.php
├── dashboard.php
│
├── LICENSE
└── README.md
```

### Features

- **User Authentication and Authorization:**
  - Secure user sign-up and login with role-based access (admin and user roles).

- **User Management:**
  - User registration and login (`signup.php`, `login.php`).
  - Admin dashboard for managing users (`users.php`).
  - CRUD operations for users by admin only (`components/user/create.php`, `components/user/edit.php`, `components/user/delete.php`).
  - Users listing and viewing by admin only (`users.php`).

- **Product Management:**
  - CRUD operations for products (`components/product/create.php`, `components/product/edit.php`, `components/product/delete.php`).
  - Product listing and viewing (`products.php`).

- **Category Management:**
  - CRUD operations for categories (`components/category/create.php`, `components/category/edit.php`, `components/category/delete.php`).
  - Category listing and management (`categories.php`).

- **Dashboard:**
  - User dashboard displaying categorized products (`view.php`).
  - Admin dashboard (`dashboard.php`) with overview and management features.

- **Styling and Assets:**
  - Static assets like images (`assets/images/login-background.jpg`).
  - Styling with CSS (`assets/css/general.css`).
  - JavaScript for client-side interactions (`assets/js/script.js`).

## Installation

1. **Clone the Repository**

    ```bash
    git clone https://github.com/muhammadmuzzamilkhan/php-product-manager.git
    cd php-product-manager
    ```

2. **Set up the database**

    Import the database file `database/pms_db_php.sql` to your local MySQL database:

    - Open your preferred MySQL database management tool (e.g., phpMyAdmin, MySQL Workbench).
    - Create a new database, e.g., `pms_db_php`.
    - Import the `pms_db_php.sql` file into the newly created database.

    Alternatively, you can use the command line:

    ```bash
    mysql -u yourusername -p pms_db_php < path/to/pms_db_php.sql
    ```

3. **Configure the database connection**

    Update the database connection details in `includes/db.php`:

    ```php
    <?php
    $host = 'localhost';
    $dbname = 'pms_db_php';
    $username = 'yourusername';
    $password = 'yourpassword';
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
    ?>
    ```

    **Note:** Replace `yourusername` and `yourpassword` with your actual MySQL credentials.

4. **Start the local server**

    If you're using XAMPP, MAMP, or WAMP, place the project folder in the `htdocs` or `www` directory and start the Apache server. Then, open your browser and navigate to `http://localhost/php-product-manager`.

3. **Start the Application**

    - Configure your web server (e.g., Apache) to serve the PHP files.
    - Open your browser and navigate to `http://localhost/php-product-manager`.

## Usage

- **User Registration and Login:**
  - Register a new user account using `signup.php`.
  - Log in with registered credentials using `login.php`.

- **Product Management:**
  - Add, edit, and delete products via `products.php`.
  - Manage categories for products through `categories.php`.

- **Dashboard Views:**
  - View categorized products as a user in `view.php`.
  - Access admin dashboard features in `dashboard.php` for comprehensive management.

## Contributing

1. **Clone the Repository**

    ```bash
    git clone https://github.com/muhammadmuzzamilkhan/php-product-manager.git
    cd php-product-manager
    ```

2. **Create a New Branch**

    ```bash
    git checkout -b feature-name
    ```

3. **Make Changes and Test**

    - Implement your changes and ensure functionality.
    - Test thoroughly to validate updates.

4. **Submit a Pull Request**

    - Push your branch: `git push origin feature-name`.
    - Go to GitHub and create a pull request for review.

## Credits

Created by [Muhammad Muzzamil Khan].

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

---

Explore and contribute to PHP Product Manager to enhance its functionality. If you have questions or suggestions, please open an issue or contact [khanmuhammadmuzzamil500@gmail.com].
