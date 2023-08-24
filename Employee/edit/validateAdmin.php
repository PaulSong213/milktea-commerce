 <?php
    function validateAdminPassword($adminPassword)
    {
        // Database connection settings
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "zaratehospital";

        try {
            // Create a new PDO instance
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // Set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Query to fetch admin password from the database (assuming you have a table named 'admin')
            $stmt = $conn->prepare("SELECT password FROM employee_tb where password = ");
            $stmt->execute();
            $result = $stmt->fetch();

            if (password_verify($adminPassword, $result['password'])) {
                return true; // Admin password is valid
            } else {
                return false; // Invalid admin password
            }
        } catch (PDOException $e) {
            return false; // Error occurred
        }

        $conn = null;
    }

    // Check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $adminPassword = $_POST["adminPassword"];

        if (validateAdminPassword($adminPassword)) {
            // Admin password is valid, perform further actions here
            session_start();
            $_SESSION["admin_access"] = true;
            header("Location: admin_dashboard.php");
            exit();
        } else {
            // Invalid admin password, redirect back with an error message
          
            exit();
        
        }
    }
    ?>

