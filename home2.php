<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>home</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" a href="style.css" />
  <link rel="stylesheet" href="navbar.css">
  <style>
    body {
      background-image: url('9.jpg');
      background-size: cover;
      background-repeat: no-repeat;
    }
    .big-colored {
        font-size: 30px;
        color: white;
        text-align: center;

    }
  </style>
</head>

<body>
  <div class="hero">
    <nav>
      
      <div class="logo"></div>
      <ul>
        <li><a href="Gallery.php">Gallery</a></li>
        <li><a href="home.php">Home</a></li>
        <li><a href="Plans.php">Plans</a></li>
        <?php
        if (!isset($_SESSION['username'])) {
        ?>
          <li><a href="login.php">Log in</a></li>
          <li><a target="_self" href="Signup.php" >Register</a></li>
        <?php
        }
        ?>
      </ul>
      <?php
      if (isset($_SESSION['username'])) {
      ?>
        <img width="auto" src="user.png" class="user-pic" alt="" onclick="toggleMenu()">
        <div class="sub-menu-wrap" id="subMenu">
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
 
             
              
                
              
                <p class="big-colored"><br><br><br><br><br><br><br><br><br><br><br>Riding a horse is the closest you can get to flying without leaving the ground.
                   Join our horse riding club and become a part-time superhero!</p>

</body>

</html>