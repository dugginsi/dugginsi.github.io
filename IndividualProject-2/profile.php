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
$username = $_REQUEST["newusername"];
$email = $_REQUEST["newemail"];

if (isset($username) && isset($email)) {

    if (editprofile($username, $email)) {
        echo "<br>Profile has been edited.";
    } else {
        echo "<br>Edit Profile change failed";
    }
} else {
    echo "<br>Both username and email must be provided";
}

function editprofile($new_username, $new_email)
{
    $mysqli = new mysqli('localhost', 'dugginsi', '12345', 'Pa$$w0rd');
    if ($mysqli->connect_error) {
        printf("Database connection failed: %s\n", $mysqli->connect_error);
        return FALSE;
    }
    $current_username = $_SESSION["username"];
    $prepared_sql = "UPDATE users SET username = ?, email = ? WHERE username = ?;";
    $stmt = $mysqli->prepare($prepared_sql);
    if (!$stmt) {
        printf("SQL error: %s\n", $mysqli->error);
        return FALSE;
    }
    $stmt->bind_param("sss", $new_username, $new_email, $current_username);
    if ($stmt->execute())
                return TRUE;
            return FALSE;
}
?>
    </div>
    </body>
    </html>