<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="navbar.css">
    <title>Document</title>
</head>
<style>
  .back {
  background-color: burlywood;
  color: white;
}

</style>
<body background="11.jpg">
<div class="hero">
    <nav>
      
      <div class="logo"></div>
      <ul>
  
        <li><a href="waitingusers.php">Back</a></li>
        
        <?php
        if (!isset($_SESSION['username'])) {
        ?>
          <li><a href="Signup.php">Register</a></li>
          <li><a href="login.php">Log in</a></li>
        <?php
        }
        ?>
      </ul>
      <?php
      if (isset($_SESSION['username'])) {
      ?>
        <img width="auto" src="user.png" class="user-pic" alt="" onclick="toggleMenu()">
        <div class="sub-menu-wrap" id="subMenu"  >
          <div class="sub-menu">
            <div class="user-info">
              <img height="auto" width="auto" src="user.png">
              <h3><?php echo $_SESSION['username'] ?></h3>
            </div>
            <hr>
            <a href="view_profile.php" class="sub-menu-link">

              <p>View Profile</p>
              <span></span>
            </a>

            <hr>
            <a href="logout.php" class="sub-menu-link">
              <p>Logout</p>
              <span></span>
            </a>
          </div>
        </div>
      <?php
      }

      ?>

    </nav>
  </div>

  <script>
    let subMenu = document.getElementById('subMenu');

    function toggleMenu() {
      subMenu.classList.toggle("open-menu");
    }
  </script>

<?php

if (isset($_GET['username'])) {
  $localhost = 'localhost';

  $dbuser = 'phpuser';

  $dbpass = 'phppwd';

  $horse = 'phpclub';

  $cnn = @mysqli_connect($localhost, $dbuser, $dbpass, $horse) or exit('Connection failed.' . mysqli_connect_errno());

  $username = $_GET['username'];

  $query = "delete from waitingusers where username = '$username'";
 


  if (mysqli_query($cnn, $query)) {
    echo "<h1>$username has been deleted successfully</h1>";
  } else {
    echo "Error deleting record: " . mysqli_error($cnn);
  }

  mysqli_close($cnn);
}
?>

</body>
</html>