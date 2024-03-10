
<?php
	session_start();

	if (isset($_SESSION["user_id"])) {

		$mysqli = require __DIR__ . "/database.php";
	
		$sql = "SELECT * FROM user
				WHERE ID = {$_SESSION["user_id"]}";
	
		$result = $mysqli->query($sql);
	
		$user = $result->fetch_assoc();
	
	}

?>


<!DOCTYPE html>
<html>
<!--browse by room and contact sales nalang missing pieces, then after non, add nalang ng mga extra shiz-->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
crossorigin="anonymous">
<link rel="stylesheet" href="style.css">


<title>Personal Website</title>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Select all elements with the class 'container'
        var containers = document.querySelectorAll(".ani");
		var containers2 = document.querySelectorAll(".ani-right");

        // Function to check if an element is in the viewport
        function isInViewport(element) {
            var rect = element.getBoundingClientRect();
            return (
                rect.top >= 0 &&
                rect.left >= 0 &&
                rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                rect.right <= (window.innerWidth || document.documentElement.clientWidth)
            );
        }

        // Function to handle scroll events
        function handleScroll() {
            containers.forEach(function(container) {
                if (isInViewport(container)) {
                    container.classList.add("show-container");
                }
            });
			containers2.forEach(function(container) {
                if (isInViewport(container)) {
                    container.classList.add("show-container");
                }
            });
        }

        // Attach the handleScroll function to the scroll event
        window.addEventListener("scroll", handleScroll);

        // Trigger the handleScroll function once on page load
        handleScroll();
    });
</script>




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

					<?php if(isset($_SESSION["user_id"])) : ?>
						<!-- User is logged in, show their name -->

						<div class="dropdown navparagraph">
							<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Welcome, <?= $user["First_Name"]; ?>!</a>
							<div class="dropdown-menu">
								<a href="logout.php" class="dropdown-item btn btn-dark btn-logout">Logout</a>
							</div>
						</div>


					<?php else : ?>
						<!-- User is not logged in, show login button -->
						<a href="login.php" class="btn btn-dark mt-3 login-btn"> 
						Log In </a>
						
					</a>
					<?php endif; ?>

				</ul>
			</div>
		</div>
	</nav>

	<!--main-->
	
	<section class="bg1 text-light p-5 text-center">
		<div class="container">
		<br>
			<img src="Logo.png" width="1000px" height="300px" alt="logo" class="img"></img>
		<br>
		<br>
		<br>
		<br>
		</div> 
	
	</section>
	
	<section class="bg1 text-light p-3">
		<div class="container">
			<div class="row">
			
				<div class="col" id="intro">
					<h1 class="p-4">About Me</h1>
				</div>
				
				<div class="col">
					<p class="p-4">Music, for me, is a universal language that connects with people when words fail.
					Its not just an experience, but a journey for discovering oneself. <br><br>This website focuses
					on sharing my own personal music journey, sharing tips and tricks, and offering musical
					related services. <br><br>This website isn't just about me; its about us - a community of music
					lovers and creators.</p>
				</div>
				
				<div class="col">
					<p class="p-4">Beyond expressing through music,
					I am also a craftsman behind the scenes; specializing in
					mixing, instrumental creation/recreation, tuning, fixing recording problems, and
					many more. <br><br>My purpose is not only to create, but also to help you gain ideas, get motivated,
					and craft your own musical narrative.<br><br>
					</p>
				</div>

			</div>

		</div>
	<br>
	<br>
	<br>

	</section>
	
	<section id="skills" class="bg1 text-dark p-5">
	<br>

		<div class="container ani">
			
			<div class="row align-items-center justify-content-between">
				
				<div class="col-md">
					<img src="mixer.png" class="img-fluid" alt="Photo by Benjamin Lehman">
				</div>
				
				<div class="col-md p-5">
				<!--adding padding to text element-->
					<h2>Get Started</h2><hr>
					<p>From mixing songs, and creating instrumentals, we aim to help fellow musicians reach their musical goals.<br>
					Check out our projects by clicking on the button below.
					</p>
					<a href="projects.php" class="btn btn-dark mt-3"> 
						<i class="bi bi-chevron-right"></i>Browse Projects
					</a>
				
				</div>
				
				
			</div>

		</div>
		
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	</section>
	
	<section class="bg1 text-light p-5 text-center text-sm-start">
		
		<div class="container ani-right">
			<div class="d-sm-flex align-items-center justify-content-between">
			<!--flex is used to divide the text to the image-->
			
				<div>
					<h2>Experience the Adventure</h2><hr>
					<p>Embark on a Sonic Journey: Discover Musician Tips, and Personalized Lists.<br>Check out the blog by clicking on the button below.</p>
					

					<a href="blog.php" class="btn btn-dark mt-3"> 
						<i class="bi bi-chevron-right"></i>Read Blog
					</a>
				</div>
				
				<img class="img-fluid w-50" src="album.png" 	alt="Photo by Esranur Kalay">
				<!--kung gusto ko i-retain yung image pag small screen, remove d-none and d-sm-block sa img class-->

			</div>

		</div>
		
	<br>
	<br>
	<br>
	<br>
	</section>

	<footer class="p-4 bg1 text-white text-center position-relative">
		<a class="topbtn" href="#top">
			<p>Go back to Top</p>
		</a>
	
		<div class="container"><hr>
			<p class="lead">&copy; Albert Bernardo<br>WEBPROG IT225</p>
			<a href="datapriv.html">
            <p>Privacy Policy</p>
        	</a>
		</div>
		
	</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
crossorigin="anonymous"></script>
</body>
</html>