<?php
session_start();
include 'connect.php';

if (isset($_POST['login'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or password is invalid";
    } else {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "login";
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = mysqli_query($conn, "SELECT * FROM users WHERE password='$password' AND username='$username'");
        $rows = mysqli_num_rows($query);

        if ($rows == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            header('Location: index.php');
        } else {
            $error = "Invalid username or password";
        }
        mysqli_close($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Log in Form</title>
    <form action="login.php" method="post">
    <link rel="stylesheet" href="Main222.css">
</head>
<body>
<div class="container<?php if (isset($_POST['login'])) { echo " shake"; } ?>">
		<img src="bmabng.png" alt="Logo" class="logo">
		<form method="post" action="login.php">
			<label for="username">Username</label>
			<input type="text" id="username" name="username" required autocomplete="off">
			<label for="password">Password</label>
			<input type="password" id="password" name="password" required>
			<button type="submit" name="login">Login</button>
		</form>
		<?php
	    if (isset($_POST['login'])) {
	        $error = "Invalid username or password.";
	        echo "<p class='error-message'>$error</p>";
	    }
	    ?>
	</div>
    <script>
        const container = document.querySelector('.container');
        container.addEventListener('animationend', function() {
            container.classList.remove('shake');
        });
    </script>
</body>
</html>
