<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <title>User Page</title>
  <link rel="stylesheet" href="navbar.css">
  <style>
    body {
      background-image: url('6.jpg');
      background-size: cover;
      background-repeat: no-repeat;
    }

    /* 
    #profile-icon {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      background-color: #fff;
      position: absolute;
      top: 10px;
      right: 10px;
      cursor: pointer;
    }

    #profile-info {
      display: none;
      position: absolute;
      top: 80px;
      right: 10px;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
    } */

    #navbar {
      background-color: #333;
      /* overflow: visible; */
      overflow: hidden;
    }

    #navbar a {
      float: left;
      color: #fff;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }

    #navbar a:hover {
      background-color: #ddd;
      color: black;
    }

    /*  */

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    /* body {
	 background-color: #fff;
	 font-family: sans-serif;
} */
    ul {
      list-style: none;
    }

    .user-menu-wrap {
      position: relative;
      width: 36px;
      margin: 0px auto;
    }

    .menu-container {
      visibility: hidden;
      opacity: 0;
    }

    .menu-container.active {
      visibility: visible;
      opacity: 1;
      transition: all 0.2s ease-in-out;
    }

    .user-menu {
      position: absolute;
      right: -22px;
      background-color: #fff;
      width: 256px;
      border-radius: 2px;
      border: 1px solid rgba(0, 0, 0, 0.15);
      padding-top: 5px;
      padding-bottom: 5px;
      margin-top: 20px;
    }

    .user-menu .profile-highlight {
      display: flex;
      border-bottom: 1px solid #e0e0e0;
      padding: 12px 16px;
      margin-bottom: 6px;
    }

    .user-menu .profile-highlight img {
      width: 48px;
      height: 48px;
      border-radius: 25px;
      object-fit: cover;
    }

    .user-menu .profile-highlight .details {
      display: flex;
      flex-direction: column;
      margin: auto 12px;
    }

    .user-menu .profile-highlight .details #profile-name {
      font-weight: 600;
      font-size: 16px;
    }

    .user-menu .profile-highlight .details #profile-footer {
      font-weight: 300;
      font-size: 14px;
      margin-top: 4px;
    }

    .user-menu .footer {
      border-top: 1px solid #e0e0e0;
      padding-top: 6px;
      margin-top: 6px;
    }

    .user-menu .footer .user-menu-link {
      font-size: 13px;
    }

    .user-menu .user-menu-link {
      display: flex;
      text-decoration: none;
      color: #333;
      font-weight: 400;
      font-size: 14px;
      padding: 12px 16px;
    }

    .user-menu .user-menu-link div {
      margin: auto 10px;
    }

    .user-menu .user-menu-link:hover {
      background-color: #f5f5f5;
      color: #333;
    }

    .user-menu:before {
      position: absolute;
      top: -16px;
      left: 120px;
      display: inline-block;
      content: "";
      border: 8px solid transparent;
      border-bottom-color: #e0e0e0;
    }

    .user-menu:after {
      position: absolute;
      top: -14px;
      left: 121px;
      display: inline-block;
      content: "";
      border: 7px solid transparent;
      border-bottom-color: #fff;
    }
  </style>
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
        <div class="sub-menu-wrap" id="subMenu">
          <div class="sub-menu">
            <div class="user-info">
              <img height="auto" width="auto" src="user.png">
              <h3><?php  echo $_SESSION['username'] ?></h3>
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
  <!-- <div classname="user"></div>
  <div id="navbar">
    <a href="gallery.php">Gallery</a>
    <a href="home2.php">Home</a>
    <a href="plans.php">Plans</a>
    
  </div> -->

  <!-- <div id="profile-icon" onclick="showUserProfile()"></div>

  <div id="profile-info">
    <h2>User Information</h2>
    <p><strong>Username:</strong> <span id="username"></span></p>
    <p><strong>Name:</strong> <span id="name"></span></p>
    <p><strong>Surname:</strong> <span id="surname"></span></p>
    <p><strong>Date of Birth:</strong> <span id="dob"></span></p>
    <p><strong>Email:</strong> <span id="email"></span></p>
    <p><strong>Gender:</strong> <span id="gender"></span></p>
    <p><strong>Phone Number:</strong> <span id="phone"></span></p>
    <p><strong>Plan:</strong> <span id="plan"></span></p>
  </div>

  <script>
    // Function to retrieve user information from the database and display it
    function showUserProfile() {
      fetch('getUserProfile.php')
        .then(response => response.json())
        .then(data => {
          document.getElementById('username').textContent = data.username;
          document.getElementById('name').textContent = data.name;
          document.getElementById('surname').textContent = data.surname;
          document.getElementById('dob').textContent = data.dob;
          document.getElementById('email').textContent = data.email;
          document.getElementById('gender').textContent = data.gender;
          document.getElementById('phone').textContent = data.phone;
          document.getElementById('plan').textContent = data.plan;
          document.getElementById('profile-info').style.display = 'block';
        })
        .catch(error => {
          console.error('Error:', error);
        });
    }
  </script> -->

  <script>
    document.querySelector('.mini-photo-wrapper').addEventListener('click', function() {
      document.querySelector('.menu-container').classList.toggle('active');
    });
  </script>
</body>

</html>