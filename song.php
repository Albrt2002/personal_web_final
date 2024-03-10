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
	
	<section class="bg1 text-light p-5 text-center text-sm-start">
	<br>
	<br>
		<div class="container">
			<a href="blog.php">
			<span style='font-size:30px;'>&#11164; Back</span></a>
			<center><h1>ARTISTS</h1>
			<br>
			<br>
			<div class="card-group gap-3 text-center">
			  <div class="card bg-dark">
				<img src="hybs.jpg" class="card-img-top" alt="faq1">
				<div class="card-body">
				  <h5 class="card-title">HYBS</h5>
				  <p class="card-text">HYBS (ไฮบ์ส) was a male project duo under JUICEY. They debuted on October 8, 2021 with the English digital single "Ride". Their music invokes a feeling of nostalgic feel-good vibes 
				  that is just hard to hate. <br>As of now, they have disbanded as a group to focus on their individual music career- but nonetheless, their music is something to check out if you haven't already.<p>
				  <p class="card-text"><a target="_blank" class="btn btn-secondary" href="https://open.spotify.com/artist/4mr4X9nJC8DPlNukWbgAaI?si=NKlm76qqS-ee82KlU1Li8w">Spotify</a></p>
				</div>
			  </div>
			  <div class="card bg-dark">
				<img src="paul.jpg" class="card-img-top" alt="faq2">
				<div class="card-body">
				  <h5 class="card-title">Paul Partohap</h5>
				  <p class="card-text">Paul Partohap is a music artist whose music genre is more on pop and indie pop. He has released several albums and singles that have been well-received by listeners all over the world. 
				  I specially like his song titled "THANK YOU 4 LOVIN' ME", where it showcases his amazing voicing and chord choices which compliments the theme of the song.</p>
				  <p class="card-text"><a target="_blank" class="btn btn-secondary" href="https://open.spotify.com/artist/7JUNqSO2J7JcC76ShZ9DI9?si=kOU52PUcQsWCe3JY8e2uSA">Spotify</a></p>
				</div>
			  </div>
			  <div class="card bg-dark">
				<img src="mac.jpg" class="card-img-top" alt="faq3">
				<div class="card-body">
				  <h5 class="card-title">Mac Ayres</h5>
				  <p class="card-text">Mac Ayres, is an American R&B singer-songwriter, producer, and multi-instrumentalist. This artist is one who i keep recommending people check out specially if they like slow, chill, and RnB. 
				  Mac Ayres is an underrated artist that deserves more popularity because of his great talent. All of his songs invoke a very relaxing and chill vibe which people will love.</p>
				  <p class="card-text"><a target="_blank" class="btn btn-secondary" href="https://open.spotify.com/artist/0fTav4sBLmYOAzKuJw0grL?si=kXwpr3EiTaCshVb1yjfDDA">Spotify</a></p>
				</div>
			  </div>
			  <div class="card bg-dark">
				<img src="paolo.png" class="card-img-top" alt="faq4">
				<div class="card-body">
				  <h5 class="card-title">Siopaolo</h5>
				  <p class="card-text">Siopaolo, otherwise known as Paolo, is a Filipino American singer-songwriter and producer, based in Las Vegas. A still upcoming artist taht deserves more streams. His songs are melodic and enjoyable
				  to listen to. His new song titled "the space between us" is similar to other artist in the RnB genre like Jeff Bernat. So if you like those types of song, check siopaolo out.</p>
				  <p class="card-text"><a target="_blank" class="btn btn-secondary" href="https://open.spotify.com/artist/4dXBBVDuriULFiOyu5E8Kf?si=Mn4Mt6vbRUa8U7Nz-m-IPw">Spotify</a></p>
				</div>
			  </div>
			</div>
			
		</div>
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