<?php 
	session_start();

    $session_user =$_SESSION['email'];

	if (isset($_GET['logout'])) {
		session_unset();
		session_destroy();
		header("Location: ./home.php");
	}

	if (isset($_POST['submit-req'])) {

	$email = $_POST['email'];
	$telephone = $_POST['telephone'];
	$request = $_POST['request'];
	include 'includes/connect.php';
	$sql = "INSERT into contact (id, email, telephone, request) values (null,'$email','$telephone', '$request')";
	$resultat=mysqli_query($conn, $sql);
	
	if($resultat){
		echo "Thank you for your request";
		} else{
		    echo "ERROR: Could not send your request";
		}
	include 'includes/disconnect.php';
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
</head>
<body>
	<div class="topnav">
	  <a href="./home_logg.php">Home</a>
	  <a href="./profile.php">Profile</a>
	  <a href="./client.php">Client</a>
	  <a class="active" href="./contact.php">Contact</a>
			<label id="user_name">
				<?php echo "Welcome  $session_user"; ?>
			</label>
	  	<button class="open-button" type="button" id="loggoff" name="logout" onclick="logout()">Log off</button>

	</div>

		<?php 
			include 'includes/connect.php';
			$sql="SELECT request FROM contact";
			$resultat = mysqli_query($conn, $sql);
			include 'includes/disconnect.php';
		?>
		<label id="clients_req" style="color: white;">		
	 	<?php 
	 			foreach ($resultat as $m) {
	 			echo "<p>".$m['request']."</p>";
	 		}
	 	?>
	 	</label>		
	<div id="thform">
		<P>
			Thank you for your request, you have to enter your email address
		</P><br>
		<form action="./contact.php" method="post">
		<LABEL for="email">
			<span>Your email here</span>
			<input type="email" size="20" name="email" id="in-req" required>
		</LABEL><br>
		<LABEL for="tel" id="lab-req">
			<span>Your phone number here</span>
			<input type="number" maxlength="8" size="8" name="telephone" id="in-req">
		</LABEL><br>
		<LABEL for="txt">
			<span>Your request here</span>
			<input id="txt" type="text" size="1000" name="request" required>
			<input type="submit" value="Send" name="submit-req" id="but-req">
		</LABEL>
		
		
		</form>
	</div>
	

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript">
			$(".create-button").on("click", function(){
				window.open("./creat_profil.php","winName","toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, copyhistory=no,width=650,height=510,left=400,top=150").blur();
			});
			function openForm() {
			  document.getElementById("myForm").style.display = "block";
			}

			function closeForm() {
			  document.getElementById("myForm").style.display = "none";
			}
			function logout() {
				var verif = confirm ("Do you want to disconnect ?");
				if (verif) {
					document.location.href='?logout=true';
				}
			}

	</script>
</body>
<footer style="color: white;">
	<h6>On social media</h6>
	<a href="https://www.facebook.com/"><img src="./images/facebook.png" alt="fb" width="30px"></a>
	<a href="https://www.instagram.com/"><img src="./images/instagram.jpg" alt="inst" width="30px"></a>
	<a href="https://www.youtube.com/"><img src="./images/youtube.png" alt="yout" width="30px"></a>
</footer>
</html>