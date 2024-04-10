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
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    if ((isset($username) or isset($email)) and isset($password)) {
    
        if (addnewuser($username, $email, $password)) {
            echo "Registration Successfull!";
        } else {
            echo "Registration Failed!";
        }
    } else {
        echo "No username/password provided";
    }

    function addnewuser($username, $email, $password)
    {
        $mysqli = new mysqli('localhost', 'dugginsi' /Database username/ , '12345' /Database password/ , 'Pa$$w0rd' /Database name/);
        if ($mysqli->connect_error) {
            printf('Database connection failed: %s\n', $mysqli->connect_error);
            return FALSE;
        }

        $prepared_sql = "INSERT INTO users (username, email, password) VALUES (?,?,md5(?));";
        $stmt = $mysqli->prepare($prepared_sql);
        $stmt->bind_param("sss", $username, $email, $password);
        if ($stmt->execute())
            return TRUE;
        return FALSE;
    }
    ?>
    </div>
    </body>
    </html>