<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $adminPassword = $_POST["adminPassword"];

    // Database connection settings
    $servername = "your_servername";
    $username = "your_username";
    $password = "your_password";
    $dbname = "your_database";

    try {
        // Create a new PDO instance
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Query to fetch admin password from the database (assuming you have a table named 'admin')
        $stmt = $conn->prepare("SELECT password FROM employee_tb");
        $stmt->execute();
        $result = $stmt->fetch();

        if (password_verify($adminPassword, $result['password'])) {
            // Admin password is valid, you can perform further actions here
            session_start();
            $_SESSION["admin_access"] = true;
      
            exit();
        } else {
           
            header("Location: index.php?error=1");
            exit();
        }
        "../index.php"
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
}
