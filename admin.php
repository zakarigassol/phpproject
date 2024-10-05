
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
        <li><a href="./waitingusers.php">Waiting Users</a></li>
        <li><a href="./listusers.php">Users</a></li>
        <li><a href="./listpackage.php">Membership plans</a></li>
        
        
        <?php
        if (!isset($_SESSION['username'])) {
        ?>
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
</body>
</html>







