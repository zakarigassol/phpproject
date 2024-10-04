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

        <li><a href="listpackage.php">Back</a></li>

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
  <div>
    <center>
      <h2>Create New Package</h2>
    </center>
    <form style="margin: auto; width: 220px;" method="Post" action="addplan.php">
      Plan<br><input type="text" name="Plans" /><br><br>
      Description<br><textArea cols="22" rows="2" name="Types"></textArea><br> <br>
      Price<br><input type="text" name="price" /><br><br>
      Details<br><textArea cols="22" rows="5" name="Details"></textArea><br><br>
      <input type="submit" name="submit" value="Submit" />
    </form>
  </div>


  <script>
    let subMenu = document.getElementById('subMenu');

    function toggleMenu() {
      subMenu.classList.toggle("open-menu");
    }
  </script>
  <?php

  if (isset($_POST['submit'])) {
    $localhost = 'localhost';

    $dbuser = 'phpuser';

    $dbpass = 'phppwd';

    $horse = 'phpclub';


    $cnn = @mysqli_connect($localhost, $dbuser, $dbpass, $horse) or exit('Connection failed.' . mysqli_connect_errno());

    $query1 = "insert into memberplans (Plans,Types,Details,Price) values(?,?,?,?)";
    $stmt1 = mysqli_stmt_init($cnn);

    extract($_POST);

    mysqli_stmt_prepare($stmt1, $query1) or exit('Query Error.' . mysqli_stmt_errno($stmt1));

    @mysqli_stmt_bind_param($stmt1, 'ssss',  $Plans, $Types, $Details, $price) or exit('Bind Param Error.'); // if "or part" & "@" omitted error will be displayed

    mysqli_stmt_execute($stmt1) or exit('Query Execution failed.' . mysqli_stmt_errno($stmt1));


    if (mysqli_stmt_affected_rows($stmt1) > 0) {
      echo "Record Saved.";
  }



    mysqli_stmt_close($stmt1);

    mysqli_close($cnn);
  }
  ?>

</body>

</html>