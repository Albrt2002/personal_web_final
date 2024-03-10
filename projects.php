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
		var containers3 = document.querySelectorAll(".ani-up");

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
			containers3.forEach(function(container) {
            container.classList.add("show-container");
        });
        }

        // Attach the handleScroll function to the scroll event
        window.addEventListener("scroll", handleScroll);

        // Trigger the handleScroll function once on page load
        handleScroll();
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
	h1{
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
	span {
		color: #DBDBDB;
	}
	span:visited {
		color: #DBDBDB;
	}
	a:-webkit-any-link{
		text-decoration:none !important;
	}
	.video-container {
        position: relative;
        overflow: hidden;
        padding-bottom: 56.25%; /* 16:9 aspect ratio */
    }
    .video-container video {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
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
	
	<section id="skills" class="bg1 text-dark p-2">
		<div class="container ani-up">
			<br>
			<br>
			<center><h1>COVERS</h1></center>
			<br>
			<div class="row align-items-center justify-content-between">
				
				<div class="col-md">
					<div class="video-container">
						<video width="100%" height="auto" controls>
							<source src="hotel.mp4" type="video/mp4">
							Your browser does not support the video tag.
						</video>
					</div>
				</div>
				
				<div class="col-md p-5">
					<h1>Hotel California</h1>
					<hr>
					<p>This guitar solo was one of the first few covers that i recorded after getting a sound card.
					A pandemic just happened and because of the lockdown, i was stuck at home. With nothing better to do,
					i decided to finally learn this solo and record it just to because i was bored.
					</p>
				
				</div>
				
				
			</div>

		</div>
		<br><br><br><br><br><br>
	</section>

	<section class="bg1 text-light p-2 text-center text-sm-start">
		
		<div class="container ani-right">
			<div class="d-sm-flex align-items-center justify-content-between">
			<!--flex is used to divide the text to the image-->
			
				<div class="row align-items-center justify-content-between">
					
					<div class="col-md">
						<h1 align="right">Arandano</h1>
						<hr>
						<p align="right">This one was requested by one of my friends and i decided to give it a try since
						i found the song challenging and fun to learn. I mostly play by ear, and learning this song
						took hours but i found it to be one of the things that improved my listening skills more.</p>

					</div>
					
					<div class="col-md">
						<div class="video-container">
							<video width="100%" height="auto" controls>
								<source src="gtrjrock.mp4" type="video/mp4">
								Your browser does not support the video tag.
							</video>
						</div>
					</div>
				
					
				</div>

			</div>

		</div>
		<br><br><br><br><br><br>
	</section>
	
	<section id="skills" class="bg1 text-dark p-2">
	
		<div class="container ani">

			<div class="row align-items-center justify-content-between">
				
				<div class="col-md">
					<div class="video-container">
						<video width="100%" height="auto" controls>
							<source src="merrygo.mp4" type="video/mp4">
							Your browser does not support the video tag.
						</video>
					</div>
				</div>
				
				
				<div class="col-md p-5">
					<h1>Merry Go Round of Life</h1>
					<hr>
					<p>This one is a soundtrack from one of my favorite animated movies which is Howl's Moving Castle
					I think this one was one of the first few songs that i learned on the piano and at this point, i
					enjoyed recording songs while trying to better my mixing skills in the process.
					</p>
				
				</div>
				
				
			</div>

		</div>
		<br><br><br><br><br><br>
	</section>
	
	<section class="bg1 text-light p-2 text-center text-sm-start">
		
		<div class="container ani-right">
			<div class="d-sm-flex align-items-center justify-content-between">
			<!--flex is used to divide the text to the image-->
			
				<div class="row align-items-center justify-content-between">
					
					<div class="col-md">
						<h1 align="right">Littleroot Town</h1>
						<hr>
						<p align="right">This one was one of my first few covers utilizing MIDI. I used a software called
						Ample Guitars which turns your piano notes into guitar sounds. I found this software fun and i wanted to 
						use this in a cover. So after searching for songs online, i found a Pokemon theme song called littleroot town
						and so i decided to cover it.</p>

					</div>
				

					<div class="col-md">
						<div class="video-container">
							<video width="100%" height="auto" controls>
								<source src="little.mp4" type="video/mp4">
								Your browser does not support the video tag.
							</video>
						</div>
					</div>
					
				</div>

			</div>

		</div>
		<br><br><br><br>
	</section>
	
		
	<section class="bg1 text-light p-5 text-center text-sm-start">
		
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