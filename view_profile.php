<?php
session_start();
?>
<?php

$localhost = 'localhost';

$dbuser = 'phpuser';

$dbpass = 'phppwd';

$horse = 'phpclub';

$cnn = @mysqli_connect($localhost, $dbuser, $dbpass, $horse) or exit('Connection failed.' . mysqli_connect_errno());

$username = $_SESSION['username'];

$query = "SELECT * FROM users WHERE username = '$username'";;


$result = mysqli_query($cnn, $query);





if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    // Retrieve user information from $row
}







mysqli_close($cnn);
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
        <li><a href="Gallery.php">Gallery</a></li>
        <li><a href="home2.php">Home</a></li>
        
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

<h1>User Information</h1>
<p>Username: <?php echo $row['username']; ?></p>
<p>Name: <?php echo $row['name']; ?></p>
<p>Surname: <?php echo $row['surname']; ?></p>
<p>Date of Birth: <?php echo $row['dob']; ?></p>
<p>Email: <?php echo $row['email']; ?></p>
<p>Gender: <?php echo $row['gender']; ?></p>
<p>Phone: <?php echo $row['phone']; ?></p>
<p>Plan: <?php echo $row['plan']; ?></p>
</body>
</html>


