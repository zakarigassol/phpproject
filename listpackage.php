
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
<?php
    $localhost = 'localhost';

    $dbuser = 'phpuser';

    $dbpass = 'phppwd';

    $horse = 'phpclub';

    $cnn = @mysqli_connect($localhost, $dbuser, $dbpass, $horse) or exit('Connection failed.' . mysqli_connect_errno());






    $query = "select * from memberplans";



    $stmt = mysqli_stmt_init($cnn);



    mysqli_stmt_prepare($stmt, $query) or exit('Query Error.' . mysqli_stmt_errno($stmt));



    mysqli_stmt_execute($stmt) or exit('Query Execution failed.' . mysqli_stmt_errno($stmt));



    mysqli_stmt_bind_result($stmt, $id, $Plans, $Types, $Details, $price) or exit('Result storage failed.' . mysqli_stmt_errno($stmt));;


    echo '<th scope="col"><a style="color:black" href="./addplan.php">Add Package</a></th>';
    echo '<table class="table table-striped table-hover" border="1"><tr><th>id</th><th>Plans</th><th>Types</th><th>Details</th><th>price</th><th>delete</th></tr>';



    while (mysqli_stmt_fetch($stmt)) {


      echo '<tr>';

      echo '<th scope="col">' . $id . '</th>';

      echo '<th scope="col">' . $Plans . '</th>';

      echo '<th scope="col">' . $Types . '</th>';

      echo '<th scope="col">' . $Details . '</th>';
      echo '<th scope="col">' . $price . '</th>';


      echo "<th scope='col'><a style='color:black' href='./deleteplan.php?id=$id'>Delete</a></th>";

      echo '</tr>';
    }

    echo '</table><br/>';

    echo mysqli_stmt_num_rows($stmt) . ' records found<br/>';



    mysqli_stmt_free_result($stmt);

    mysqli_stmt_close($stmt);





    mysqli_close($cnn);
    ?>






