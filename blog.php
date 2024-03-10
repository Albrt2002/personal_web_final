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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">

<title>Personal Website</title>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Select all elements with the class 'container'
        var containers = document.querySelectorAll(".container");

        // Loop through each container and add the 'show-container' class
        containers.forEach(function(container) {
            container.classList.add("show-container");
        });
    });
</script>



<style>

	.bg1 {
		background-color: #0d0c0b;
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
	.img {
		max-width: 100%;
		height: auto;
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
	.container {
		color: #DBDBDB;
	}
	p {
		font-size: 20px;
		font-family: 'Verdana';
	}
	h1 {
		font-size: 40px;
	}
	.btn {
		font-weight: bold;
	}
	.btn:hover {
		font-weight: bold;
		background-color: #1A0B30;
	}
	.bg2 {
		background-color: #1A0B30;
	}
	a:-webkit-any-link{
		text-decoration:none !important;
	}
	a {
		color: #DBDBDB;
	}
	a:hover {
		color: #DBDBDB;
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
	
	<section class="bg1 text-light p-1 text-center text-sm-start">
		<div class="container ani-up">
			<br>
			<br>
			<center><h1>TOPICS</h1></center>
			<br>
			<hr>
			<div class="card-group gap-5 animate__animated animate__fadeInLeft">
			  <div class="card bg-dark">
				<img src="playlist.png" class="card-img-top" alt="thumb1">
				<div class="card-body">
					<h6 class="card-subtitle mb-2 text-muted">Photo by <a target="_blank" href="https://www.perfectcorp.com/consumer/blog/author/team-youcam">Team YouCam</a></h6>
					<h3 class="card-title">Playlist Showcase</h3>
					<p class="card-text">Have you ever felt like listening to rap non-stop
					then just feel like you want to take a break and listen to something slow like jazz?<br>
					Here are some of the playlist that i made based on a specific mood.</p>
					<p class="card-text"><a class="btn btn-secondary" href="playlist.php">Select</a></p>
				</div>
			  </div>
			  <div class="card bg-dark">
				<img src="studio.jpg" class="card-img-top" alt="thumb2">
				<div class="card-body">
					<h6 class="card-subtitle mb-2 text-muted">Photo by <a target="_blank" href="https://unsplash.com/@caught_in_joy?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Caught In Joy</a></h6>
					<h3 class="card-title">Mixing and Recording Tips</h3>
					<p class="card-text">I have been mixing and mastering my bandmates' covers and my own covers.<br>
					Here are some tips and tricks which i have learned throughout my journey and made me better at creating and mixing songs.</p>
					<p class="card-text"><a class="btn btn-secondary" href="mix.php">Select</a></p>
				</div>
			  </div>
			  <div class="card bg-dark">
				<img src="soundwave.png" class="card-img-top" alt="thumb3">
				<div class="card-body">
					<h6 class="card-subtitle mb-2 text-muted">Photo by <a target="_blank" href="https://www.vecteezy.com/video/2015670-audio-spectrum-line-animation">Vecteezy</a></h6>
					<h3 class="card-title">Artist Recommendation</h3>
					<p class="card-text">Every artists has their own signature sound. These artists are ones i recommend checking out if you plan on adding new songs to your playlist or 
					if you want to explore new genres.<br></p>
					<p class="card-text"><a class="btn btn-secondary" href="song.php">Select</a></p>
				</div>
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

	<footer class="p-4 bg1 text-white text-center position-relative">
		
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