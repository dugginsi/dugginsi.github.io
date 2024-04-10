<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>dugginsi logout page</title>
      <link rel="stylesheet" href="style.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>
      <div class="wrapper">
      <?php
        session_start();
        session_destroy();
        ?>
        <p>You are logged out!</p>
        <a href="form.php">Login Again</a>
      </div>
   </body>
</html>