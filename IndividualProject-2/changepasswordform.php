<?php
require "session_auth.php";
$rand = bin2hex(openssl_random_pseudo_bytes(16));
$_SESSION["nocsrftoken"] = $rand;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>dugginsi login page</title>
      <link rel="stylesheet" href="style.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>
      <div class="wrapper">
         <div class="title-text">
            <div class="title login">
               Change Password
            </div>
         </div>

            <div class="form-inner">
               <form action="index.php" method="POST" class="login">
                  <div class="field">
                     <h2>Welcome</h2>
                     <?php echo htmlentities($_SESSION["username"]); ?>!<br>
                     <!-- Hidden input for CSRF token -->
                     <input type="hidden" name="nocsrftoken" value="<?php echo $rand; ?>">
                  </div>
                  <div class="field">
                     <input type="password" placeholder="New Password" required name="newpassword">
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" value="Change Password">
                  </div>
               </form>
            </div>
      </div>
   </body>
</html>