<!DOCTYPE html>
<html>

<?php
session_start();

if (isset($_SESSION['user'])) {
    $userData = json_decode($_SESSION['user'], true);
    $userName = $userData['DatabaseID'];
    $nname = $userData['nickName'];
} else {
    // Redirect back to the login page or handle the user not being logged in
    header("Location: ./index.php");
    exit();
}

?>

<head>
    <title>Setting Up New Password</title>
    <link rel="icon" href="./img/logo.png" type="image/png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style type="text/css">
        body {
            margin: 0;
            background-image: url(img/loginbg.jpg), linear-gradient(to bottom, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.4));
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-size: cover, cover;
            background-blend-mode: multiply;
            backdrop-filter: blur(5px);
        }

        .login-container {
            position: relative;
            width: 380px;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.3);
            background-color: rgba(255, 255, 255, 0.9);
            text-align: center;
            opacity: 0;
            /* Set initial opacity to 0 */
            transform: translateY(20px);
            /* Move the container down by 20 pixels */
            transition: opacity 0.5s ease, transform 0.5s ease;
            /* Add a transition effect */
        }

        .login-container.loaded {
            opacity: 1;
            /* Set opacity to 1 for the final state */
            transform: translateY(0);
            /* Reset the position */
        }

        .logo {
            margin-top: -100px;
            margin-bottom: 20px;
            width: 140px;
            height: 140px;
            background-image: url(img/logo.png);
            /* Replace with your logo URL */
            background-size: cover;
            border-radius: 50%;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
        }

        .login-container h2 {
            font-size: 20px;
            margin-bottom: 20px;
            color: #333;
        }

        .login-container label {
            color: #666;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .login-container button[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #3498db;
            border: none;
            border-radius: 5px;
            color: white;
            font-weight: bold;
            position: relative;
            overflow: hidden;
            cursor: pointer;
            transform: translateZ(0);
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .login-container button[type="submit"]:hover {
            background-color: #2980b9;
            transform: translateY(-3px);
        }
    </style>
</head>

<body>
    <div class="login-container loaded">

        <form class="" action="" method="post">
            
            <h5>Welcome
                "<?php echo $nname ?>"!
            </h5>
            <h5>
                Set Your New Password
            </h5>
            <label for="exampleInputEmail1">New Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Set New password..." required>
            <label for="exampleInputPassword1">Confirm Password</label>
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm New Password..." required>
            <input type="hidden" name="DatabaseID" class="form-control" id="DatabaseID" value="<?php echo isset($_SESSION['user']) ? json_decode($_SESSION['user'], true)['DatabaseID'] : 'You are Logout'; ?>">
            <button type="submit" class="btn btn-primary" name="login-submit">Set New Password</button>
        </form>

        <?php
        require_once './php/connect.php';
        $conn = connect();

        if (isset($_POST['login-submit'])) {
            $password = $_POST['password'];
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $DatabaseID = $_POST['DatabaseID'];
            $isPasswordSet = 1;


            $sql = "UPDATE employee_tb
    SET
        password = '$hashedPassword',
        isPassSet = '$isPasswordSet'
        
        
    WHERE
        DatabaseID = '$DatabaseID';
    ";

            $result = mysqli_query($conn, $sql);
            if ($result) {
                // success
                $_SESSION["alert_message"] = " Password Successfully Change";
                $_SESSION["alert_message_success"] = true;
            } else {
                $_SESSION["alert_message"] = "Failed to Change Password. Error Details: " . mysqli_error($conn);
                $_SESSION["alert_message_error"] = true;
            }

            header("Location: ./index.php");
            die();
        }

        // Close the database connection
        $conn->close();

        ?>

    </div>
    <script>
        function validatePassword() {
            var password = document.getElementById("password").value;
            var cPassword = document.getElementById("confirmPassword").value;

            if (password !== cPassword) {
                alert("Passwords do not match. Please re-enter.");
                return false;
            }

            return true;
        }

        document.addEventListener("DOMContentLoaded", function() {
            const passwordInput = document.getElementById("password");
            const cPasswordInput = document.getElementById("confirmPassword");

            cPasswordInput.addEventListener("input", function() {
                if (passwordInput.value !== cPasswordInput.value) {
                    cPasswordInput.setCustomValidity("Passwords do not match.");
                } else {
                    cPasswordInput.setCustomValidity("");
                }
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Delay the animation slightly to ensure it runs after other page resources load
            setTimeout(function() {
                const loginContainer = document.querySelector(".login-container");
                loginContainer.classList.add("loaded");
            }, 100);
        });
    </script>
</body>

</html>