<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Include stylesheets -->
        <link rel="stylesheet" href="assets/css/styles.css">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
 </head>
<style>
  .menu-link > a {
    color: #fff;
    font-weight: 500;
    padding-left: 20px;
  }

  .menu-bar {
    background-color: grey;
  }

  .navbar-nav li:hover .dropdown-menu {
    display: block;
  }
</style>

 <?php
 
 include("pdo_object.php");
 // Include controller files 
 include("controllers/membercontroller.php");
 include("controllers/coursecontroller.php");
 include("controllers/plancontroller.php");

 // Include model files 
 include("models/model.php");
 include("models/membermodel.php");
 include("models/coursemodel.php");
 include("models/planmodel.php");

 // Display navbar
 include("views/layouts/navigation.html");

 // Include routes
 include("routes.php");
 ?>

 </div>

</body>
</html>