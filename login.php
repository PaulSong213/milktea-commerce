<?php
require_once('./php/connect.php');
session_start();
if (isset($_SESSION['user'])) {
    header("Location: /milktea-commerce/redirect-account.php");
}
?>

<!DOCTYPE html>

<html>

<head>
    <title>Admin | Log In</title>
    <link rel="icon" href="images/newlogo.jpg" type="jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style type="text/css">
    * {
        padding: 0;
        margin: 0;
    }

    body {
        background-color: #DEDCE0;
        background-attachment: fixed;
        display: flex;
        height: 100vh;
        justify-content: center;
        align-items: center;
    }

    table tr td {
        width: 300px;
        background-color: white;
        border-radius: 10px;
    }

    table tr td:nth-child(2) {

        border-radius: 0px 10px 10px 0px;
    }


    .container1 img {
        width: 400px;
        height: 400px;
        border-radius: 20px 0px 0px 20px;
    }

    .container2 {
        width: 200px;
        margin: auto;
    }

    .container2 input {
        height: 30px;
        width: 200px;
        border: none;
        border-bottom: 2px solid black;
        background-color: rgba(0, 0, 0, 0);
    }

    .container2 h1 {
        letter-spacing: 3px;
    }

    .container2 .login {
        height: 40px;
        width: 200px;
        background-color: black;
        color: white;
        border-radius: 10px;
    }

    .login:hover {
        transform: scale(1.1);
        transition: 0.5s ease;
    }

    a {
        text-decoration: none;
        color: black;
        font-size: 13px;
        display: flex;
        margin-top: 5px;
        justify-content: center;
    }

    fieldset {
        height: 100%;
        max-height: 400px;
        background-color: white;
        border-radius: 10px;
        border: none;
    }

    fieldset legend {
        text-align: center;
        display: none;
    }

    fieldset legend img {
        height: 80px;
        width: 80px;
        border-radius: 50%;
    }

    @media screen and (min-width: 320px) and (max-width: 767px) {
        table tr td {
            background-color: rgba(0, 0, 0, 0);
        }

        fieldset legend {
            display: block;

        }

        td:nth-child(1) {
            display: none;
        }

        .container1 img {
            position: absolute;
            width: 10rem;
            height: 10rem;
        }

        table {
            height: 50%;
        }

        form {

            margin-top: 20px;
            margin-bottom: 20px;
        }
    }
</style>

<body>

    <table>
        <tr>
            <td>
                <div class="container1">
                    <img src="./img/logo.png">
                </div>
            </td>

            <td>
                <fieldset>
                    <legend><img src="./img/logo.png"></legend>
                    <div class="container2">


                        <form class="" action="" method="post">

                            <h1>Log In</h1><br>
                            <label>Username:</label><br>
                            <input type="type" name="mailuid" required><br><br>
                            <label>Password:</label><br>
                            <input type="password" name="pwd" required><br><br><br>
                            <input type="submit" name="login-submit" value="LOG IN" class="login">
                            <?php include('./php/session-dialog.php') ?>
                        </form>

                    </div>
                </fieldset>
            </td>


        </tr>
    </table>

    <?php
    if (isset($_GET['login-submit'])) {
        $mailuid = $_GET['mailuid'];
        $password = $_GET['pwd'];


        $conn = connect();

        $sql = "SELECT * FROM employee_tb LEFT JOIN department_tb
			ON department_tb.departmentID = employee_tb.departmentID WHERE userName = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $mailuid);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result) {
            $val = mysqli_fetch_assoc($result);

            if ($val) {
                if (password_verify($password, $val["password"]) && $val["Status"] == 1) {
                    if ($val["isPassSet"] == 1) {
                        $_SESSION["user"] = json_encode($val);
                        $employee_id = $val["DatabaseID"];
                        $employeeName = $val["nickName"];
                        $action = "Log In";
                        $description = "User Log in";


                        $conn1 = connect();
                        $sql1 = "INSERT INTO backlog_tb (employeeID, action, description, timeStamp)
        						VALUES ('$employee_id', '$action', '$description', NOW())";

                        $result1 = mysqli_query($conn1, $sql1);
                        if ($result) {
                            header("Location: /milktea-commerce/redirect-account.php");
                        } else {
                            $_SESSION["alert_message"] = "Failed to Added an Employee. Error Details: " . mysqli_error($conn);
                            $_SESSION["alert_message_error"] = true;
                        }
                    } else if (password_verify($password, $val["password"]) && $val["Status"] == 0) {
                        echo "<p style='color:red'>Account currently disable</p>";
                        header("Location: ./index.php");
                    } else {
                        $_SESSION["user"] = json_encode($val);
                        header("Location: ./isSetPassword.php");
                        exit();
                    }
                } else {
                    $_SESSION["alert_message"] = "Invalid username or password" . mysqli_error($conn);
                    $_SESSION["alert_message_error"] = true;
                    header("Location: /milktea-commerce/costumer/login.php");
                    exit();
                }
            } else {
                $_SESSION["alert_message"] = "User Not Found" . mysqli_error($conn);
                $_SESSION["alert_message_error"] = true;
                header("Location: /milktea-commerce/costumer/login.php");
                exit();
            }
        } else {
            echo "<p style='color:red'>Database query error</p>";
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    ?>


</body>

</html>