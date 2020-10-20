<?php 
	session_start();

    $session_user =$_SESSION['email'];

	if (isset($_GET['logout'])) {
		session_unset();
		session_destroy();
		header("Location: ./home.php");
	}

	if (isset($_POST['save_butt'])) {

		$first_name = $_POST['fname'];
		$midle_name = $_POST['mname'];
		$last_name = $_POST['lname'];
		$date_of_Birth = $_POST['age'];
		$gender = $_POST['gender'];
		$education = $_POST['education'];
		$telephone = $_POST['tel'];
		$email = $_POST['email'];
		$password = $_POST['pwd'];
		$image = $_POST['img'];
		
		include 'includes/connect.php';
		/*$modsql = "INSERT into profile(ID, First_name, Middle_name, Last_name, Date_of_Birth, Gender, Education, Telephone, Email, Password, Image) values (null, '$first_name', '$midle_name', '$last_name', '$date_of_Birth', '$gender', '$education', '$telephone','$email', '$password', '$image') WHERE Email='$session_user'";*/
		$modsql="UPDATE profile SET ID = NULL , First_name = '$first_name' , Middle_name='$midle_name' , Last_name = '$last_name' , Date_of_Birth = '$date_of_Birth' , Gender ='$gender' , Education='$education' , Telephone='$telephone' , Email='$email' , Password='$password',Image='$image' WHERE Email='$session_user'";
		
		$result=mysqli_query($conn,$modsql);
		include 'includes/disconnect.php';
		if ($result) {
			echo "<script>
			alert('User modified successfully');
			document.location.href='profile.php';
			</script>";
		}
		else {
			echo "<script>
			alert('Problem with modification');
			document.location.href='contact.php?';
			</script>";
		}
		mysqli_close($conn);
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
	  <a class="active" href="./profile.php">Profile</a>
	  <a href="./client.php">Client</a>
	  <a href="./contact.php">Contact</a>
			<label id="user_name">
				<?php echo "Welcome  $session_user"; ?>
			</label>
	  	<button class="open-button" type="button" id="loggoff" name="logout" onclick="logout()">Log off</button>

	</div>

<div style="float: left; width: 100%;" id="suprise">
	<img id="imagehere" src="./images/here.png" alt="here">
	<form class="form-group" id="thformpro" action="profile.php" method="post">
		<?php 
			include 'includes/connect.php';
			$sql="SELECT * FROM profile WHERE Email='$session_user'";
			$resultat = mysqli_query($conn, $sql);
			include 'includes/disconnect.php';
			foreach ($resultat as $m) {}
		?>
  <label >First name:  </label>
  <input type="text" name="fname" value="<?php  echo($m['First_name'])?>" required><br>
  <label >Middle name:</label>
  <input type="text" name="mname" value="<?php  echo($m['Middle_name'])?>"><br>
  <label >Last name:</label>
  <input type="text" name="lname" value="<?php  echo($m['Last_name'])?>" required><br>
  <label >Date of Birth</label>
  <input type="Date" name="age" value="<?php  echo($m['Date_of_Birth'])?>" required><br>
  <label>Gender</label>
    <select id="edu" name="gender" style="color: black;" value="<?php  echo($gender)?>" required>
    <?php 
      include 'includes/connect.php';
        $sql = "SELECT Gender FROM profile WHERE Email='$session_user'";
        $resultat = mysqli_query($conn,$sql);
      include 'includes/disconnect.php';
      foreach ($resultat as $mat) {
        $gender=$mat['Gender'];
        echo "<option value='$gender'>$gender</option>";
      }
     ?>
    </select><br>
  <label >Education</label>
    <select id="edu" name="education" style="color: black;" value="<?php  echo($education)?>" required>
    <?php 
      include 'includes/connect.php';
        $sql = "SELECT Education FROM profile WHERE Email='$session_user'";
        $resultat = mysqli_query($conn,$sql);
      include 'includes/disconnect.php';
      foreach ($resultat as $mat) {
        $education=$mat['Education'];
        echo "<option value='$education'>$education</option>";
      }
     ?>
    </select><br>
  <label >Telephone</label>
  <input type="number" name="tel" maxlength="8" size="8" value="<?php  echo($m['Telephone'])?>" required><br>
  <label >Email</label>
  <input type="email" name="email" value="<?php  echo($m['Email'])?>" required><br>
  <label >Password</label>
  <input type="password" name="pwd" value="<?php  echo($m['Password'])?>" required><br>
  <label >Image</label>
  <input type="file" name="img"><br> 
  <input type="submit" name="save_butt"value="Modified" id="subbutt"><br>
</form>
	</div>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript">
		/*$(document).ready(function(){
    		$("#subbutt").click(function(){        
        	$("#thformpro").submit(); 
    	});*/
		$("#imagehere").on("click", function(){
			$("#imagehere").attr("src", "./images/finger.gif");
		});
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