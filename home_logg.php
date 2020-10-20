<?php 
	session_start();

    $session_user =$_SESSION['email'];

	if (isset($_GET['logout'])) {
		session_unset();
		session_destroy();
		header("Location: ./home.php");
	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title> mytry</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./navbar.css">
	<link rel="stylesheet" type="text/css" href="./front.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="homepage">
	<div class="topnav">
	  <a class="active" href="./home_logg.php">Home</a>
	  <a href="./profile.php">Profile</a>
	  <a href="./client.php">Client</a>
	  <a href="./contact.php">Contact</a>

			<label id="user_name">
				<?php echo "Welcome  $session_user"; ?>
			</label>
	  	<button class="open-button" type="button" id="loggoff" name="logout" onclick="logout()">Log off</button>
	</div>

	<div class="single category">
		<h3 class="side-title">Category</h3>
		<ul class="list-unstyled">
			<li><a href="" title="">Business <span class="pull-right">13</span></a></li>
			<li><a href="" title="">Technology <span class="pull-right">13</span></a></li>
			<li><a href="" title="">Sports <span class="pull-right">13</span></a></li>
			<li><a href="" title="">Clothes <span class="pull-right">13</span></a></li>
			<li><a href="" title="">smartphones <span class="pull-right">13</span></a></li>
			<li><a href="" title="">Games & Consoles <span class="pull-right">13</span></a></li>
			<li><a href="" title="">House equipment <span class="pull-right">13</span></a></li>
		</ul>
   </div>

	<div class="preview-page" id="front-style">
		
		<h2><strong>Trending</strong></h2>
		<table>
			<tr id="cat-img">
				<td><img id="ps5" src="./images/ps5.jpg" alt="ps5" width="100%" height="200px"></td>
				<td><img id="polotshirt" src="./images/polo.jpg" alt="polo" width="100%" height="200px"></td>
				<td><img id="i11" src="./images/iphone.jpg" alt="iphone" width="100%" height="200px"></td>
				<td><img id="mic" src="./images/microwave.jpg" alt="microwave" width="100%" height="200px"></td>
			</tr>
			<tr id="cat-list">
				<td >Play Station 5</td>
				<td >Polo tshirt</td>
				<td >Iphone 11 pro</td>
				<td >Microwave</td>
			</tr>
		</table>
		<h2><strong>Category</strong></h2>
		<table>		
			<div id="twiti"></div>
			<tr id="cat-ver">
				<td><button class="btn-default" type="button" id="cat-but"><a href="" title="">Business</a></button></td>
				<td><button class="btn-default" type="button" id="cat-but"><a href="" title="">Technology</a></button></td>
				<td><button class="btn-default" type="button" id="cat-but"><a href="" title="">Sports</a></button></td>
				<td><button class="btn-default" type="button" id="cat-but"><a href="" title="">Clothes</a></button></td>
				<td><button class="btn-default" type="button" id="cat-but"><a href="" title="">smartphones</a></button></td>
				<td><button class="btn-default" type="button" id="cat-but"><a href="" title="">Games & Consoles</a></button></td>
				<td><button class="btn-default" type="button" id="cat-but"><a href="" title="">House equipment</a></button></td>
			</tr>
		</table>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript">
			$("#ps5").on("click", function(){
				$("#ps5").attr("src", "./images/f.jpg");
			})
			$("#polotshirt").on("click", function(){
				$("#polotshirt").attr("src", "./images/f.jpg");
			})
			$("#i11").on("click", function(){
				$("#i11").attr("src", "./images/f.jpg");
			})
			$("#mic").on("click", function(){
				$("#mic").attr("src", "./images/f.jpg");
			})
			$("#cat-list").on("click", function(){
				var newim = $("<img>").attr("src", "./images/f.jpg");
				newim.css("width", "250px")
				newim.insertAfter("#twiti")
			});
			function logout() {
				var verif = confirm ("Do you want to disconnect ?");
				if (verif) {
					document.location.href='?logout=true';
				}
			}

	</script>
</body>
<footer>
	<h6>On social media</h6>
	<a href="https://www.facebook.com/"><img src="./images/facebook.png" alt="fb" width="30px"></a>
	<a href="https://www.instagram.com/"><img src="./images/instagram.jpg" alt="inst" width="30px"></a>
	<a href="https://www.youtube.com/"><img src="./images/youtube.png" alt="yout" width="30px"></a>
</footer>
</html>