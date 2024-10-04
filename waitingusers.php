
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
table{
  border-collapse: collapse;
}

</style>
<body background="11.jpg">
<div class="hero">
    <nav>
      
      <div class="logo"></div>
      <ul>
        <li><a href="./listpackage.php">Membership plans</a></li>
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

 $query="select * from waitingusers";

 $stmt=mysqli_stmt_init($cnn);



 mysqli_stmt_prepare($stmt,$query) or exit('Query Error.'. mysqli_stmt_errno($stmt));



 mysqli_stmt_execute($stmt) or exit('Query Execution failed.'. mysqli_stmt_errno($stmt));



 mysqli_stmt_bind_result($stmt,$username,$password,$name,$surname,$dob,$email,$gender,$phone,$plan) or exit('Result storage failed.'. mysqli_stmt_errno($stmt));;

 
 echo '<table border="1"><tr><th>usernames</th><th>passwords</th><th>names</th><th>surnames</th><th>dob</th><th>emails</th><th>gender</th><th>phones</th><th>plan</th></tr>';



 while(mysqli_stmt_fetch($stmt)){

 echo '<tr>';

 echo "<td>$username</td>";

 echo "<td>$password</td>";

 echo "<td>$name</td>";

 echo "<td>$surname</td>";
 echo "<td>$dob</td>";
 echo "<td>$email</td>";
 echo "<td>$gender</td>";
 echo "<td>$phone</td>";
 echo "<td>$plan</td>";


 echo "<td><a style='color:black' href='./deleteuser.php?username=".$username."' >Reject User</a></td>";
 echo "<td><a style='color:black' href='./adduser.php?username=".$username."'>Approve user</a></td>";
 echo '</tr>';

 }

 echo '</table><br/>';

  echo mysqli_stmt_num_rows($stmt).' records found<br/>';



 mysqli_stmt_free_result($stmt);

 mysqli_stmt_close($stmt);





 mysqli_close($cnn);
 ?>
 

              </div>
              
            </div>
            
            
          </div>

          
           
    </body>
</html>





