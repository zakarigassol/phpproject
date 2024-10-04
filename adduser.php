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
  <?php

  if (isset($_GET['username'])) {
    $localhost = 'localhost';

    $dbuser = 'phpuser';

    $dbpass = 'phppwd';

    $horse = 'phpclub';


    $cnn = @mysqli_connect($localhost, $dbuser, $dbpass, $horse) or exit('Connection failed.' . mysqli_connect_errno());

    $username = $_GET['username'];

    $query = "select * from waitingusers where username='$username'";



    $stmt = mysqli_stmt_init($cnn);



    mysqli_stmt_prepare($stmt, $query) or exit('Query Error.' . mysqli_stmt_errno($stmt));



    mysqli_stmt_execute($stmt) or exit('Query Execution failed.' . mysqli_stmt_errno($stmt));
    $new_username = '';

    $new_password = '';

    $new_name = '';

    $new_surname = '';
    $new_dob = '';
    $new_email = '';
    $new_gender = '';
    $new_phone = '';
    $new_plan = '';


    mysqli_stmt_bind_result($stmt, $username, $password, $name, $surname, $dob, $email, $gender, $phone, $plan) or exit('Result storage failed.' . mysqli_stmt_errno($stmt));;

    while (mysqli_stmt_fetch($stmt)) {
      $new_username = $username;

      $new_password = $password;

      $new_name = $name;

      $new_surname = $surname;
      $new_dob = $dob;
      $new_email = $email;
      $new_gender = $gender;
      $new_phone = $phone;
      $new_plan = $plan;
    }

    echo $new_password;






    $query1 = "insert into users(username,password,name,surname,dob,email,gender,phone, plan) values(?,?,?,?,?,?,?,?,?)";
    $stmt1 = mysqli_stmt_init($cnn);

    mysqli_stmt_prepare($stmt1, $query1) or exit('Query Error.' . mysqli_stmt_errno($stmt1));

    @mysqli_stmt_bind_param($stmt1, 'sssssssss', $new_username, $new_password, $new_name, $new_surname, $new_dob, $new_email, $new_gender, $new_phone, $new_plan) or exit('Bind Param Error.'); // if "or part" & "@" omitted error will be displayed

    mysqli_stmt_execute($stmt1) or exit('Query Execution failed.' . mysqli_stmt_errno($stmt1));

    if (mysqli_stmt_affected_rows($stmt1) > 0) {
      $query = "delete from waitingusers where username = '$username'";

      if (mysqli_query($cnn, $query)) {
        echo "Record Saved.";
      } else {
        echo "Error deleting record: " . mysqli_error($cnn);
      }
    }

    mysqli_stmt_close($stmt1);






    mysqli_close($cnn);
  }







  ?>

</body>

</html>