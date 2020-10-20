<?php 
	session_start();
	//logg out
	$session_user =$_SESSION['email'];

	if (isset($_GET['logout'])) {
		session_unset();
		session_destroy();
		header("Location: ./home.php");
	}

	//get-update table

	//delete
	if (isset($_GET['delete'])) 
	{
		$myid=$_GET['delete'];	
		include 'includes/connect.php';
		$sql="DELETE FROM profile where id=$myid";
		$resultat=mysqli_query($conn, $sql);
		include 'includes/disconnect.php';
		if ($resultat){
			$msg="<div class='delet-acc'>User deleted</div>";
		}
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
	  <a class="active" href="./client.php">Client</a>
	  <a href="./contact.php">Contact</a>
			<label id="user_name">
				<?php echo "Welcome  $session_user"; ?>
			</label>
	  	<button class="open-button" type="button" id="loggoff" name="logout" onclick="logout()">Log off</button>
	</div>

	<div>
		<?php 
			include 'includes/connect.php';
			$sql="SELECT * FROM profile";
			$resultat = mysqli_query($conn, $sql);
			include 'includes/disconnect.php';
		?>
			<table class="table" id="table-client">
		 		<tr>
					<th id="wid-id">id</th>
					<th id="wid-name">Name</th>
					<th id="wid-name">Education</th>
					<th id="wid-age">Age</th>
					<th id="wid-tel">Tel</th>
					<th id="delet-acc">Delete</th>
		 		</tr>

	 		<?php 
	 			foreach ($resultat as $m) {
	 			echo "<tr>";
	 				$id=$m['ID'];
	 				echo "<td>".$m['ID']."</td>";
	 				echo "<td>".$m['First_name']." ".$m['Middle_name']." ".$m['Last_name']."</td>";
	 				echo "<td>".$m['Education']."</td>";
	 				echo "<td>".$m['Date_of_Birth']."</td>";
	 				echo "<td>".$m['Telephone']."</td>";
		 			echo "<td> 
	 					<button name='$id' class='btn btn-danger' onclick='supprimer(this.name)'>X</button>
	 				</td>";
	 			echo "</tr>";
	 			}
	 		?>
			</table>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript">
		function logout() {
			var verif = confirm ("Do you want to disconnect ?");
			if (verif) {
				document.location.href='?logout=true';
			}
		}
		function supprimer(id) {
			var verif = confirm ("Voulez vous supprimer enseignant ?");
			if (verif) {
				document.location.href='?delete='+id;
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