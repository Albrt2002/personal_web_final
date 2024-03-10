<?php

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $mysqli = require __DIR__ . "/database.php";

        $sql = sprintf("SELECT * FROM user
                        WHERE email = '%s'",
                        $mysqli->real_escape_string($_POST["email"]));

        $result = $mysqli->query($sql);

        $user = $result->fetch_assoc();

        if ($user) {
            if(password_verify($_POST["password"], $user["Password"])) { //$user["column name sa database table"]

                session_start();

                $_SESSION["user_id"] = $user["ID"]; //set the user_id session varable to the ID column in database to ensure logged in

                header("Location: index.php");
                exit;

            }
        }
        $is_invalid = true;
    }

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
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
    crossorigin="anonymous">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="loginstyle.css">
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
        <br>
        <div class="container d-flex justify-content-center">
            <div class="row">
                <div class="col-md rad">
                    <?php
                    $errors = array();

                    if(isset ($_POST["login"])){
                        $email = $_POST["email"];
                        $password = $_POST["password"];
                            require_once "database.php";
                            $sql = "SELECT * FROM user WHERE email = '$email'";
                            $result = mysqli_query($mysqli, $sql);
                            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                            if ($user) {
                                if(password_verify($password, $user["Password"])) { //$user["column name sa table"]
                                    $_SESSION["user"] = "yes";
                                    header("Location: login.php");
                                    die();
                                
                                } else {
                                    array_push($errors, "Password does not match");
                                }
                            } else {
                                array_push($errors, "Email does not match");
                            }
                        }    
                    
                    ?>
                    
                    <form action="login.php" class="wrapper" method="post">
                        <h2> Login </h2><br>
                        <p class="p1">Enter to gain access to website functionalities.</p>
                        <br><br>

                        <div class="input-box">
                            <h1>Email</h1>
                            <input type="email" name="email" placeholder="Enter your mail address" required>
                            <?php
                                if (in_array("Email does not match", $errors)) echo "<br><span class='error-message'>Email does not exist</span>";
                            ?>
                            <br>
                            <br>
                        </div>

                        <div class="input-box">
                            <h1>Password</h1>
                            <input type="password" name="password" id="password" placeholder="Enter password" required>
                            <?php
                                if (in_array("Password does not match", $errors)) echo "<br><span class='error-message'>Password does not match</span>";
                            ?>
                        </div>
                        <br>
                        <button type="submit" name="login" class="btn btn-dark btn-login mt-3">Login</button>
                        <br>
                        <br>

                        <div style="width: 100%; height: 13px; border-bottom: 1px solid black; text-align: center">
                        <span style="font-size: 15px; background-color: #FFFFFF; padding: 20px;">
                            Don't have an account?
                        </span>
                        </div>
                        <br>
                        <a href="registration.php" name="register" class="btn btn-secondary mt-3">Register Now</a>
                        <br><br><br>

                    </form>
                </div>

                <div class="col-md">
                    <img class="object-cover w-full h-full mx-auto d-none d-md-block" src="blackandwhiteswirl.png" alt="img" />
                </div>

            </div>
        </div>
    <br><br><br><br><br>
    </section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
crossorigin="anonymous"></script>
</body>
</html>