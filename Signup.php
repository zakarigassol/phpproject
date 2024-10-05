<!DOCTYPE html>
<html lang="en">

<head>
    <title>home</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" a href="style.css" />
</head>

<body>


</body>

</html>


<?php






$localhost = 'localhost';

$dbuser = 'phpuser';

$dbpass = 'phppwd';

$horse = 'phpclub';















if (isset($_POST['register'])) {
    $cnn = @mysqli_connect($localhost, $dbuser, $dbpass, $horse) or exit('Connection failed.' . mysqli_connect_errno());
    $username = filter_input(INPUT_POST, 'username');

    $password = filter_input(INPUT_POST, 'password');

    $name = filter_input(INPUT_POST, 'name');

    $surname = filter_input(INPUT_POST, 'surname');

    $dob = filter_input(INPUT_POST, 'dob');
    $gender = filter_input(INPUT_POST, 'gender');
    $email = filter_input(INPUT_POST, 'email');
    $phone = filter_input(INPUT_POST, 'phone');
    $plan = $_POST['plan'];

    $dobPattern = "/^\d{4}-\d{2}-\d{2}$/";
    if (preg_match($dobPattern, $dob)) {
        // Calculate the age based on the date of birth
        $dobTimestamp = strtotime($dob);
        $age = date("Y") - date("Y", $dobTimestamp);

        // Check if the user is above 18 years old
        if ($age >= 18) {
            $query = "insert into waitingusers(username,password,name,surname,dob,email,gender,phone, plan) values(?,?,?,?,?,?,?,?,?)";
            $stmt = mysqli_stmt_init($cnn);

            mysqli_stmt_prepare($stmt, $query) or exit('Query Error.' . mysqli_stmt_errno($stmt));

            @mysqli_stmt_bind_param($stmt, 'sssssssss', $username, $password, $name, $surname, $dob, $email, $gender, $phone, $plan) or exit('Bind Param Error.'); // if "or part" & "@" omitted error will be displayed

            mysqli_stmt_execute($stmt) or exit('Query Execution failed.' . mysqli_stmt_errno($stmt));

            if (mysqli_stmt_affected_rows($stmt) > 0) {
                echo "Record Saved.";
            }

            mysqli_stmt_close($stmt);
        } else {
            echo "You must be 18 years or older to proceed.";
        }
    };







    mysqli_close($cnn);
};




?>













<!DOCTYPE html>

<html lang="en">




<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="navbar.css">
    <title>Sign up</title>

</head>




<body>
    <div class="back-img">
    <div class="hero">
    <nav>
      
      <div class="logo"></div>
      <ul>
        <li><a href="Gallery.php">Gallery</a></li>
        <li><a href="home2.php">Home</a></li>
        <li><a href="Plans.php">Plans</a></li>
      </ul>

    </nav>
  </div>
      
        <div class="container bg-opaque text-dark min-vh-100 d-flex justify-content-center align-items-center">
            <form action="" method="POST">
                <div class="d-grid gap-2 col-6 mx-auto">
                    


                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
                    <input type="text" class="form-control" name="name" id="name" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Surname</span>
                    <input type="text" class="form-control" name="surname" id="surname" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Date of Birth</span>
                    <input type="date" class="form-control" name="dob" id="dob" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
                    <input type="email" class="form-control" name="email" id="email" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Phone number</span>
                    <input type="text" class="form-control" name="phone" id="phone" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Username</span>
                    <input type="text" class="form-control" name="username" id="username" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                </div>
                <div class="input-group mb-3">
                    <select class="form-select" name="plan" id="plan" aria-label="Default select example">
                        <option value="0" selected>Select Memebership Plan</option>
                        <?php
                        $cnn = @mysqli_connect($localhost, $dbuser, $dbpass, $horse) or exit('Connection failed.' . mysqli_connect_errno());

                        $query = "Select * from memberplans";

                        $stmt = mysqli_stmt_init($cnn);
                        mysqli_stmt_prepare($stmt, $query) or exit('Query Error.' . mysqli_stmt_errno($stmt));
                        mysqli_stmt_execute($stmt) or exit('Query Execution failed.' . mysqli_stmt_errno($stmt));
                        mysqli_stmt_bind_result($stmt, $id, $Plans, $Types, $Details, $price) or exit('Result storage failed.' . mysqli_stmt_errno($stmt));;

                        while (mysqli_stmt_fetch($stmt)) {
                        ?>
                            <option value="<?php echo $id; ?>"><?php echo $Plans; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>


                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Password</span>
                    <input type="password" class="form-control" name="password" id="password" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Retype Password</span>
                    <input type="password" class="form-control" name="repassword" id="repassword" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                </div>

                <label class="col-sm-2 col-form-label">Gender: </label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="Male">
                    <label class="form-check-label" for="male">
                        Male
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="Female" checked>
                    <label class="form-check-label" for="female">
                        Female
                    </label>
                </div>
                <div class="d-grid gap-2 col-6 mx-auto">

                    <button type="submit" name="register" class="btn btn-outline-dark">Sign up</button>
                </div>





            </form>
        </div>




        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </div>

</body>




</html>