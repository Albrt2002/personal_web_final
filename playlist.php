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
		<div class="container">
			<br>
			<br>
			<a href="blog.php">
			<span style='font-size:30px;'>&#11164; Back</span></a>
			<center><h1>JAZZ</h1>
			<br>
			<iframe style="border-radius:12px" src="https://open.spotify.com/embed/playlist/5h24z7N34VkabXzyF668Ve?utm_source=generator" 
			width="50%" height="500" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
			<p>
		</div>
		<div class="container">
			<br>
			<br>
			<center><h1>CLASSICAL</h1>
			<br>
			<iframe style="border-radius:12px" src="https://open.spotify.com/embed/playlist/4mFS3ihtzTnau6FaHB5gZz?utm_source=generator" 
			width="50%" height="500" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
			<p>
		</div>
		<div class="container">
			<br>
			<br>
			<center><h1>KRNB</h1>
			<br>
			<iframe style="border-radius:12px" src="https://open.spotify.com/embed/playlist/5fJ2bRoDt0x7ZM502kYqE4?utm_source=generator"
			width="50%" height="500" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
			<p>
		</div>
		<div class="container">
			<br>
			<br>
			<center><h1>INDIE/SLOW</h1>
			<br>
			<iframe style="border-radius:12px" src="https://open.spotify.com/embed/playlist/4fggVC57ZMSEcZjqCySTbd?utm_source=generator"
			width="50%" height="500" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
			<p>
		</div>
		<div class="container">
			<br>
			<br>
			<center><h1>ENERGIZER</h1>
			<br>
			<iframe style="border-radius:12px" src="https://open.spotify.com/embed/playlist/7v5lNpJRTldOtQb57wdVcK?utm_source=generator"
			width="50%" height="500" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
			<p>
		</div>
		
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