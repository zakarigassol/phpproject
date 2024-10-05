<html>

<head>

    <title>Image Gallery</title>
    <link rel="stylesheet" href="navbar.css">
    <style>
        .gallery {

            display: grid;

            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));

            grid-gap: 10px;

        }



        .gallery img {

            width: 100%;

            height: auto;

            cursor: pointer;

            transition: transform 0.3s;

        }



        .gallery img:hover {

            transform: scale(1.2);

        }



        .modal {

            display: none;

            position: fixed;

            z-index: 999;

            top: 0;

            left: 0;

            width: 100%;

            height: 100%;

            background-color: rgba(0, 0, 0, 0.8);

        }



        .modal img {

            position: absolute;

            top: 50%;

            left: 50%;

            transform: translate(-50%, -50%);

            max-width: 90%;

            max-height: 90%;

        }



        .modal.active {

            display: block;

        }
    </style>

</head>

<body bgcolor="black">
    <div class="hero">
        <nav>
            <!-- <img height="50px" width="auto" src="" class="logo" alt=""> -->
            <div class="logo"></div>
            <ul>
                <li><a href="Gallery.php">Gallery</a></li>
                <li><a href="home2.php">Home</a></li>
                <li><a href="Plans.php">Plans</a></li>
                <?php
                @session_start();
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
                            <h3><?php echo $_SESSION['username'] ?></h3>
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
    
    <div class="gallery">

        <img src="1.jpg" alt="Image 1" onclick="openModal('1.jpg')">

        <img src="2.jpg" alt="Image 2" onclick="openModal('2.jpg')">

        <img src="3.jpg" alt="Image 3" onclick="openModal('3.jpg')">
        
    </div>


    <div class="gallery">

        <img src="4.jpg" alt="Image 4" onclick="openModal('4.jpg')">

        <img src="5.jpg" alt="Image 5" onclick="openModal('5.jpg')">
        <img src="6.jpg" alt="Image 6" onclick="openModal('6.jpg')">
        



        

    </div>




    <div id="modal" class="modal"></div>




    <script>
        function openModal(imageSrc) {

            const modal = document.getElementById('modal');

            modal.innerHTML = `<img src="${imageSrc}" alt="Zoomed Image" onclick="closeModal()">`;

            modal.classList.add('active');

        }



        function closeModal() {

            const modal = document.getElementById('modal');

            modal.innerHTML = '';

            modal.classList.remove('active');

        }
    </script>

</body>