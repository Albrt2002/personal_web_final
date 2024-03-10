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
		width: 50%;
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
	
	<section class="bg1 text-light p-1 text-center text-sm-start" >
		<div class="container">
			<br>
			<br>
			<a href="blog.php">
			<span style='font-size:30px;'>&#11164; Back</span></a>
			<center><h1>MIXING TIPS</h1>
			<br>
			<br>
			<h2>Start with a Clean Slate:</h2>
			<p>It is important to note that "mixing" is a part of the producing process where we balance and improve our recorded audios in a way that it sounds cohesive, inoffensive, and satisfying.
			To achieve this process, the raw audio should be sounding nice without the help of any effects. If it is not the case, then i suggest processing the audio first to fix any noise, harshness, or any
			problematic things before moving on to mixing.</p><br><br><br>

			<h2>Equalization (EQ):</h2>
			<p>Back when i was just starting to mix songs, i used to have a hard time with Equalization because i thought it was the most crucial effect in order to sound good. While the Equalization
			is important in the mixing process, it should only be used with a goal in mind and not because you "think" it needs to be there. If the audio already sounds good to you, you can probably skip
			Equalization. Other than that, you can use Equalization to make your audio sound clear in the mix.</p><br><br><br>

			<h2>Compression:</h2>
			<p>When mixing full on songs, people tend to underestimate how much compression should be used, especially in the vocals. I personally think that compression is the most important plugin 
			for the vocals to sound "professional", not the EQ. For compression, i suggest using the ears instead of the mind. Mixing tutorials on Youtube gives the people an idea which can limit your creativity.
			My suggestion is to ignore that thinking and use the ears instead. If the vocals sound good on 10-12db of compression then go for it. If it already sounds good on very little compression then stick with it.
			To improve mixing, you also need to experiment on things and to not be afraid of mistakes. There is no one way steps to processing because every mixer has their own way.</p><br><br><br>

			<h2>Reverb and Delay:</h2>
			<p>Use reverb and delay to create a sense of depth and space. For these effects, you can either put them straight into the audio tracks or use parallel processing depending on your desired sound. Additionally, 
			experiment with using phase inversion to make the reverb and delay a seperate entity from the main audio tracks.</p><br><br><br>

			<h2>Reference Tracks:</h2>
			<p>Referencing is your best friend in achieving your desired sound. A/B your mix with reference tracks from established artists similar to the genre of your song to gauge the tonal balance, dynamics, 
			and overall quality of your mix.</p><br><br><br>
			
			
			
			<h1>RECORDING TIPS</h1>
			<br>
			<br>
			<h2>Room Acoustics:<h2>
			<p>Ensure your recording space has proper acoustics. Use diffusers and absorbers to minimize reflections and unwanted room sound. When using a condenser mic, room acoustics is super important because 
			condenser microphones are super sensitive. If you're planning to get a condenser microphone, make sure that your room is well treated. If not, then i suggest a dynamic microphone instead for a professional sound.
			</p><br>

			<h2>Mic Placement:</h2>
			<p>Experiment with microphone placement to capture the best sound from each instrument. Small adjustments can make a significant difference.</p><br><br>

			<h2>Experiment with Microphone Types:</h2>
			<p>Different microphones have distinct characteristics and have their different usages . Experiment with various mics to find the best match for each instruments and vocals.</p><br>
			</center>
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