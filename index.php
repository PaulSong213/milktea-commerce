<!DOCTYPE html>
<html>
<?php
if (isset($_SESSION['username'])) {
	header("Location: ./billing_slip/index.php");
}
?>

<head>
	<title>Login Page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<style type="text/css">
		body {
			margin: 0;
			padding: 0;
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
			background-image: url(img/loginbg.jpg), linear-gradient(to bottom, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.4));
			/* Background image and black gradient */
			background-size: cover, cover;
			background-blend-mode: multiply;
			backdrop-filter: blur(5px);
		}

		.login-container {
			position: relative;
			width: 320px;
			padding: 40px;
			border-radius: 15px;
			box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.3);
			background-color: rgba(255, 255, 255, 0.9);
			text-align: center;
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
			font-size: 24px;
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
	<div class="login-container">
		<img src="img/logo.png" alt="Logo" class="logo">
		<?php
		session_start(); // Start or resume the session
		// check if login post is set

		if (isset($_POST['login-submit'])) {
			$mailuid = $_POST['mailuid'];
			$password = $_POST['pwd'];

			// Include database connection
			require_once('./php/connect.php'); // Adjust the path if needed
			$conn = connect(); // Assuming this function establishes the database connection

			$sql = "SELECT * FROM employee_tb WHERE userName='$mailuid';";
			$result = mysqli_query($conn, $sql);

			if ($result) { // Check if query was successful
				$checkRow = mysqli_num_rows($result);

				if ($checkRow > 0) {
					$val = mysqli_fetch_assoc($result);

					if (password_verify($password, $val["password"])) {
						$_SESSION["user"] = json_encode($val);
						header("Location: ./billing_slip/index.php");
						exit(); // Use exit() instead of die() to terminate the script
					} else {
						echo "<p style='color:red'>Wrong Password</p>";
					}
				} else {
					echo "<p style='color:red'>User not found</p>";
				}
			} else {
				echo "<p style='color:red'>Database query error</p>";
			}

			mysqli_close($conn); // Close the database connection
		}

		?>

		<form class="" action="" method="post">
			<h2>LOGIN FORM</h2>
			<label for="exampleInputEmail1">Email address</label>
			<input type="text" class="form-control" id="exampleInputEmail1" name="mailuid" placeholder="Username/Email..." required>
			<label for="exampleInputPassword1">Password</label>
			<input type="password" class="form-control" id="exampleInputPassword1" name="pwd" placeholder="Password..." required>
			<input type="hidden" name="depart" class="form-control" id="department"></input>
			<button type="submit" class="btn btn-primary" name="login-submit">Login</button>

		</form>
	</div>
</body>

</html>