<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>dugginsi login page</title>
      <link rel="stylesheet" href="style.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>
   <div class="form-container">
    <?php
		session_set_cookie_params(15 * 60, "/", "dugginsi.waph.io", TRUE, TRUE);
		session_start();
		if (isset($_POST["username"]) and isset($_POST["password"])) {
			if (checklogin_mysql($_POST["username"], $_POST["password"])) {
				$_SESSION["authenticated"] = TRUE;
				$_SESSION["username"] = $_POST["username"];
				$_SESSION["browser"] = $_SERVER["HTTP_USER_AGENT"];
			} else {
				session_destroy();
				echo "<script>alert('Invalid username/password');window.location='form.php';</script>";
				die();
			}
		}
		if (!isset($_SESSION["authenticated"]) or $_SESSION["authenticated"] != TRUE) {
			session_destroy();
			echo "<script>alert('You have not login, Please login first!');</script>";
			header("Refresh: 0; url=form.php");
			die();
		}
		if ($_SESSION["browser"] != $_SERVER["HTTP_USER_AGENT"]) {
			session_destroy();
			echo "<script>alert('Session hijacking attack is detected! ');</script>";
			header("Refresh: 0; url=form.php");
			die();
		}
		function checklogin_mysql($username, $password)
		{
			$mysqli = new mysqli('localhost', 'dugginsi' /Database username/ , '12345' /Database password/ , 'waph' /Database name/);
			if ($mysqli->connect_error) {
				printf('Database connection failed: %s\n', $mysqli->connect_error);
				exit();
			}
			$sql = "SELECT * FROM users WHERE username='" . $username . "' ";
			$sql = $sql . " AND password = md5('" . $password . "')";
			$prepared_sql = "SELECT * FROM users WHERE (username = ? OR email = ?) AND password = md5(?)";
			$stmt = $mysqli->prepare($prepared_sql);
			$stmt->bind_param("sss", $username, $username, $password);
			$stmt->execute();
			$result = $stmt->get_result();
			if ($result->num_rows == 1)
				return TRUE;
			return FALSE;
		}
		?>
		<h2> Welcome
			<?php echo htmlentities($_SESSION['username']); ?> !
		</h2>
		<a href="changepasswordform.php">Change Password</a> | <a href="profile_form.php">Edit Profile</a> | <a
			href="logout.php">Logout</a>
    </div>
    </body>
    </html>