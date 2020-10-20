<?php 
  session_start();
  
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
  $sql = "INSERT into profile(ID, First_name, Middle_name, Last_name, Date_of_Birth, Gender, Education, Telephone, Email, Password, Image) values (null, '$first_name', '$midle_name', '$last_name', '$date_of_Birth', '$gender', '$education', '$telephone','$email', '$password', '$image')";
  $resultat=mysqli_query($conn, $sql);
  
  if($resultat){
    echo "added successfully";
    } else{
        echo "ERROR: Could not add";
    }
  include 'includes/disconnect.php';
  }
 ?>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="./navbar.css">
  <link rel="stylesheet" type="text/css" href="./front.css">
<div style="float: left; width: 100%;" id="suprise">
<form class="form-group" id="thformcreat" action="creat_profil.php" method="post">
  <label >First name:</label>
  <input type="text" name="fname"  required><br>
  <label >Middle name:</label>
  <input type="text" name="mname" ><br>
  <label >Last name:</label>
  <input type="text" name="lname" required><br>
  <label >Date of Birth</label>
  <input type="Date" name="age" ><br>
  <label>Gender</label>
    <select id="edu" name="gender" style="color: black;" value="<?php  echo($gender)?>" required>
    <?php 
      include 'includes/connect.php';
        $sql = "SELECT Gender FROM profile";
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
        $sql = "SELECT Education FROM profile";
        $resultat = mysqli_query($conn,$sql);
      include 'includes/disconnect.php';
      foreach ($resultat as $mat) {
        $education=$mat['Education'];
        echo "<option value='$education'>$education</option>";
      }
     ?>
    </select><br>
  <label >Telephone</label>
  <input type="number" name="tel" maxlength="8" size="8" required><br>
  <label >Email</label>
  <input type="email" name="email" required><br>
  <label >Password</label>
  <input type="password" name="pwd"  required><br>
  <label >Image</label>
  <input type="file" name="img"  ><br>
  <input type="submit" value="Save" id="creat-butt" name="save_butt">
</form>

</div>