<?php


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <link rel="stylesheet" href="navbar.css">
</head>

<body>
    <div class="hero">
        <nav>
            <!-- <img height="50px" width="auto" src="" class="logo" alt=""> -->
            <div class="logo"></div>
            <ul>
                <li><a href="Gallery.php">Gallery</a></li>
                <li><a href="home2.php">Home</a></li>
                <li><a href="Plans.php">Plans</a></li>
            </ul>
            <img  width="auto" src="user.png" class="user-pic" alt="" onclick="toggleMenu()">
            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <img height="auto" width="auto" src="user.png" >
                        <h3>User Name</h3>
                    </div>
                    <hr>
                    <a href="view_profile.php" class="sub-menu-link">
                      
                        <p>View Profile</p>
                        <span>></span>
                    </a>
                    <hr>
                    <a href="logout.php" class="sub-menu-link">
                      
                        <p>Logout</p>
                        <span>></span>
                    </a>
                </div>
            </div>
        </nav>
    </div>

    <div>
        <h1>Hello world</h1>
    </div>


    <script>
        let subMenu = document.getElementById('subMenu');

        function toggleMenu(){
            subMenu.classList.toggle("open-menu");
        }
    </script>
</body>

</html>