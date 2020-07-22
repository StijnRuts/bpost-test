<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>bpost test - Success</title>
  </head>
  <body>
  <h1>Success</h1>
  <?php
    // start a new session
    session_regenerate_id();
    session_destroy();
  ?>
  <hr>
  <p><a href="./index.php">Start over</a></p>
  </body>
</html>
