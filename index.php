<?php
session_start();
if (isset($_SESSION['login'])) {
  header('Location: ./views/home.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio</title>
  <link rel="stylesheet" href="./css/main.css">
</head>

<body>
  <?php include_once "login.php" ?>
</body>

</html>
