<?php
    session_start();
    if (isset($_SESSION["user_id"])){
        header("Location: index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
    crossorigin="anonymous">
    <!-- Include jQuery 1.8.0 from a CDN -->
    <script src="https://code.jquery.com/jquery-1.8.0.min.js" integrity="sha256-sal7UwPbfD8w3Ucxj9qc9viJsRwAKD3iq/A5Pd/WyW4=" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .wrapper {
            width: 80%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        img{
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }
        .input-box input {
            width: 100%;
            height: 20px;
            background:  #fbf8f6;
            border: none;
            outline: none;
            border: 2px solid rgba(53, 44, 44, 0.2);
            border-radius: 40px;
            font-size: 16px;
            color: #000000;
            padding: 20px;
        }
        .btn-login{
            width: 100%;
            border-radius: 40px;
        }
        .btn-regis{
            width: 100%;
            border-radius: 40px;
        }
        .btn-secondary{
            width: 100%;
            border-radius: 40px;
        }
        .col-md{
            padding: 0 !important;
            margin: 0 !important;
        }
        h2{

            font-weight: bold;
            font-size: 70px;
            align-content: left;
        }
        h1{
            font-weight: bold;
            color: #000;
        }
        .p1{
            color: #808080;
        }
        .p2{
            color: #808080;
            font-size: 15px;
        }
        section {
            font-family: 'lato';
        }
        .rad{
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }
        .bg1 {
            background-color: #0d0c0b;
        }
        .navkular {
            color: #DBDBDB;
        }
        .navkular:hover {
            color: #DBDBDB;
        }
        .navkular:link {
            color: #DBDBDB;
        }
        .nav-item-color {
            font-weight: bold;
            color: #DBDBDB;
        }
        .nav-font-bold {
            font-weight: bold;
        }
        .custom-navbar2 {
            background-color: #0d0c0b;
        }
        .bg-img {
            /* The image used */
            background-image: url("bg2.jpg");
        
            /* Center and scale the image nicely */
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }
        @media (max-width: 600px) {
            .wrapper {
                width: 90%;
            }

            h2 {
                font-size: 50px; /* Adjust font size for smaller screens */
                word-wrap: break-word; /* Allow words to break into the next line if needed */
            }
        }
        h2{
            color: #000;
        }
        span{
            color: #000;
        }
    </style>
</head>

<body>
    <!--For the Navigation bar-->
	<nav id="top" class="navbar navbar-expand-lg bg1 navbar-dark">
    <div class="container-fluid">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navigationbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center p-4" id="navigationbar">
            <ul class="navbar-nav nav-font-bold">
                
                <li	class="nav-item px-5">
                    <a href="index.php" class="nav-link navkular">Home</a>
                </li>
                
                <li	class="nav-item px-5">
                    <a href="projects.php" class="nav-link navkular">Projects</a>
                </li>
                
                <li	class="nav-item px-5">
                    <a href="blog.php" class="nav-link navkular">Blog</a>
                </li>
                
                <li	class="nav-item px-5">
                    <a href="contact.php" class="nav-link navkular">Contact Information</a>
                </li>
            </ul>
        </div>
    </div>
    </nav>

    <section class="bg1 text-light p-5">

        <div class="container bg-img">
            <br>
            <?php
                $errors = array();

                if (isset($_POST["submit"])) {
                    $LastName = $_POST["LastName"];
                    $FirstName = $_POST["FirstName"];
                    $email = $_POST["Email"];
                    $password = $_POST["password"];
                    $lotblk = $_POST["LotBlk"];
                    $street = $_POST["Street"];
                    $subdiv = $_POST["PhaseSubdivision"];
                    $barangay = $_POST["Barangay"];
                    $region = $_POST["Region"];
                    $province = $_POST["Province"];
                    $city = $_POST["City"];
                    $country = $_POST["Country"];
                    $contact = $_POST["Contact"];    
                    $RepeatPassword = $_POST["repeat_password"];

                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

                    if (empty($LastName) OR empty($FirstName) OR empty($email) OR empty($password) OR empty($RepeatPassword) OR empty($lotblk) OR empty($street)
                    OR empty($subdiv) OR empty($barangay) OR empty($city) OR empty($province) OR empty($province) OR empty($country) OR empty($contact) OR empty($region)) {
                        array_push($errors, "All fields are required");
                    }
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        array_push($errors, "Email is not valid");
                    }
                    if (strlen($password) < 8) {
                        array_push($errors, "Password must be at least 8 characters long");
                    }
                    if ($password != $RepeatPassword) {
                        array_push($errors, "Password does not match");
                    }
                    if (!empty($contact)) {
                        // Check if the contact number starts with "63"
                        if (substr($contact, 0, 2) !== "63") {
                            array_push($errors, "Contact number must start with '63'");
                        }
                        // You can add additional validation for the contact number format or length if needed
                    }

                    require_once "database.php";
                    $sql = "SELECT * FROM user WHERE Email = '$email'";
                    $result = mysqli_query($mysqli, $sql);
                    $rowCount = mysqli_num_rows($result);

                    if ($rowCount > 0) {
                        array_push($errors, "Email Already Exist!");
                    }

                    if (count($errors) == 0) {
                        $sql = "INSERT INTO user (Last_Name, First_Name, Email, Password, Lot_Blk, Street, Phase_Subdivision, Barangay, City_Municipality, Province, Country, Contact_Num, Region) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                        $stmt = mysqli_stmt_init($mysqli);
                        $preparestmt = mysqli_stmt_prepare($stmt, $sql);

                        if ($preparestmt) {
                            mysqli_stmt_bind_param($stmt, "sssssssssssss", $LastName, $FirstName, $email, $passwordHash, $lotblk, $street, $subdiv, $barangay, $city, $province, $country, $contact, $region);

                            mysqli_stmt_execute($stmt);
                            echo "<div class='alert alert-success'> You are Registered Successfully! </div>";
                        } else {
                            die("Something went wrong");
                        }
                    }
                }
            ?>
              
            <form action="registration.php" class="wrapper" method="post">
                <center>
                        <h2> Registration </h2><br>
                        <p class="p1">Create an Account!</p>
                        <br><br>
                </center>

                        <div class="input-box">
                        <h1>Last Name</h1>
                            <input type="text" name="LastName" placeholder="Enter your Last Name" value="<?= htmlspecialchars($_POST["LastName"] ?? "") ?>" required>
                            <?php 
                                if (in_array("All fields are required", $errors)) echo "<span class='error-message'>All fields are required</span>";
                            ?>
                            <br>
                            <br>
                        </div>

                        <div class="input-box">
                        <h1>First Name</h1>
                            <input type="text" name="FirstName" placeholder="Enter your First Name" value="<?= htmlspecialchars($_POST["FirstName"] ?? "") ?>" required>
                            <?php 
                                if (in_array("All fields are required", $errors)) echo "<span class='error-message'>All fields are required</span>";
                            ?>
                            <br>
                            <br>
                        </div>

                        <div class="form-group">
                            <label for="countrySelect"><h1>Select a Country</h1></label>
                            <select class="form-control" id="countrySelect" name="Country" required>
                            <option value="" selected disabled>Select a Country</option>
                            </select>
                            <?php 
                                if (in_array("All fields are required", $errors)) echo "<span class='error-message'>All fields are required</span>";
                            ?>
                        </div>

                        <div id="regionContainer" style="display:none;">
                            <br>
                            <div class="form-group">
                            <label for="regionSelect"><h1>Select a Region</h1></label>
                            <select class="form-control" id="regionSelect" name="Region" required>
                                <option value="" selected disabled>Select a Region</option>
                            </select>
                            <?php 
                                if (in_array("All fields are required", $errors)) echo "<span class='error-message'>All fields are required</span>";
                            ?>
                            </div>
                            <br>
                            <div id="provinceContainer" style="display:none;">
                            <div class="form-group">
                                <label for="provinceSelect"><h1>Select a Province</h1></label>
                                <select class="form-control" id="provinceSelect" name="Province" required>
                                <option value="" selected disabled>Select a Province</option>
                                </select>
                                <?php 
                                if (in_array("All fields are required", $errors)) echo "<span class='error-message'>All fields are required</span>";
                                ?>
                            </div>
                            <br>
                            <div id="cityContainer" style="display:none;">
                                <div class="form-group">
                                <label for="citySelect"><h1>Select a City</h1></label>
                                <select class="form-control" id="citySelect" name="City" required>
                                <option value="" selected disabled>Select a City</option>
                                </select>
                                <?php 
                                if (in_array("All fields are required", $errors)) echo "<span class='error-message'>All fields are required</span>";
                                ?>
                                </div>
                                <br>
                                <div id="barangayContainer" style="display:none;">
                                <div class="form-group">
                                    <label for="barangaySelect"><h1>Select a Barangay</h1></label>
                                    <select class="form-control" id="barangaySelect" name="Barangay" required>
                                    <option value="" selected disabled>Select a Barangay</option>
                                    </select>
                                    <?php 
                                    if (in_array("All fields are required", $errors)) echo "<span class='error-message'>All fields are required</span>";
                                    ?>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <br>

                        <div class="input-box">
                        <h1>Lot/Blk</h1>
                            <input type="text" name="LotBlk" placeholder="Enter your Lot/Blk" value="<?= htmlspecialchars($_POST["LotBlk"] ?? "") ?>" required>
                            <?php 
                                if (in_array("All fields are required", $errors)) echo "<span class='error-message'>All fields are required</span>";
                            ?>
                            <br>
                            <br>
                        </div>

                        <div class="input-box">
                        <h1>Street</h1>
                            <input type="text" name="Street" placeholder="Enter your Street" value="<?= htmlspecialchars($_POST["Street"] ?? "") ?>" required>
                            <?php 
                                if (in_array("All fields are required", $errors)) echo "<span class='error-message'>All fields are required</span>";
                            ?>
                            <br>
                            <br>
                        </div>

                        <div class="input-box">
                        <h1>Phase/Subdivision</h1>
                            <input type="text" name="PhaseSubdivision" placeholder="Enter your Subdivision" value="<?= htmlspecialchars($_POST["PhaseSubdivision"] ?? "") ?>" required>
                            <?php 
                                if (in_array("All fields are required", $errors)) echo "<span class='error-message'>All fields are required</span>";
                            ?>
                            <br>
                            <br>
                        </div>

                        <div class="input-box">
                        <h1>Contact Number</h1>
                            <input type="tel" name="Contact" id="typePhone" class="form-control" placeholder="e.g., 639123456789" />
                            <?php 
                                if (in_array("Contact number must start with '63'", $errors)) echo "<span class='error-message'>Contact number must start with '63'</span>";
                            ?>
                            <br>
                        </div>

                        <div class="input-box">
                        <h1>Email</h1>
                            <input type="email" name="Email" placeholder="Enter your Email Address" value="<?= htmlspecialchars($_POST["Email"] ?? "") ?>" required>
                            <?php 
                                if (in_array("Email is not valid", $errors)) echo "<span class='error-message'>Email is not valid</span>";
                                if (in_array("Email Already Exist!", $errors)) echo "<span class='error-message'>Email Already Exist!</span>"; 
                            ?>
                            <br>
                            <br>
                        </div>

                        <div class="input-box">
                        <h1>Password</h1>
                            <input type="password" name="password" id="password" placeholder="Choose a strong Password" required>
                            <?php 
                                if (in_array("Password must be at least 8 characters long", $errors)) echo "<span class='error-message'>Password must be at least 8 characters long</span>"; 
                            ?>
                            <br>
                            <br>
                        </div>

                        <div class="input-box">
                        <h1>Repeat Password</h1>
                            <input type="password" name="repeat_password" placeholder="Repeat Password" required>
                            <?php 
                                if (in_array("Password does not match", $errors)) echo "<span class='error-message'>Password does not match</span>"; 
                            ?>
                            <br>
                            <br>
                        </div>

                        <button type="submit" name="submit" value="Register" class="btn btn-dark btn-regis mt-3"> Register</button>

                        <div class="Register-link">
                            <br>
                            <div style="width: 100%; height: 13px; border-bottom: 1px solid black; text-align: center">
                            <span style="font-size: 15px; background-color: #FFFFFF; padding: 20px;">
                                Already have an account?
                            </span>
                            </div>
                            <br>
                            <a href="login.php" name="register" class="btn btn-secondary mt-3">Login Now</a>
                            <br><br><br>
                        </div>
                    
            </form>
            <br>
        </div>
    </section>

<script src="regisdropdown.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
crossorigin="anonymous"></script>

</body>
</html>