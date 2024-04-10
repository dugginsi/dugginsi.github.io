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
        require "session_auth.php";
        $token = $_POST["nocsrftoken"];
        if (!isset($token) or ($token !== $_SESSION["nocsrftoken"])) {
            echo "CSRF Attack is detected";
            die();
        }
        $username = $_SESSION["username"];
        $password = $_REQUEST["newpassword"];
        if (isset($username) and isset($password)) {
            if (changepassword($username, $password)) {
                echo "<br>Password has been changed. Please <a href='logout.php'>logout</a> and login again to change your password.";
            } else {
                echo "<br>Password change failed";
            }
        } else {
            echo "<br>No username/password provided";
        }

        function changepassword($username, $password)
        {
            $mysqli = new mysqli('localhost', 'dugginsi' /Database username/ , '12345' /Database password/ , 'Pa$$w0rd' /Database name/);
            if ($mysqli->connect_error) {
                printf('Database connection failed: %s\n', $mysqli->connect_error);
                return FALSE;
            }

            $prepared_sql = "UPDATE users SET password = md5(?) WHERE username=?;";
            $stmt = $mysqli->prepare($prepared_sql);
            $stmt->bind_param("ss", $password, $username);
            if ($stmt->execute())
                return TRUE;
            return FALSE;
        }
        ?>
    </div>
</body>
</html>